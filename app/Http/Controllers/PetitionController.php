<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Petition;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetitionController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('petitions.edit-add', compact('categories'));
    }

    public function index()
    {
        $petitions = Petition::all();
        return view('petitions.index', compact('petitions'));
    }

    public function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view('petitions.show', compact('petition'));
    }

    public function listMine(Request $request)
    {
        try {
            $user = Auth::user();
            $petitions = Petition::where('user_id', $user->id)->paginate(5);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return view('petitions.index', compact('petitions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'destinatary' => 'required',
            'category' => 'required',
            'file' => 'required',
        ]);

        $input = $request->all();
        try {
            $category = Category::findOrFail($input['category']);
            $user = Auth::user();
            $petition = new Petition($input);
            $petition->category()->associate($category);
            $petition->user()->associate($user);

            $petition->signeds = 0;
            $petition->status = 'pending';

            $res=$petition->save();
            if ($res) {
                $res_file = $this->fileUpload($request, $petition->id);
                if ($res_file) {
                    return redirect('/mypetitions');
                }
                return back()->withErrors('Error creando la petición')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function fileUpload(Request $req, $petition_id = null)
    {
        $file = $req->file('file');
        $fileModel = new File;
        $fileModel->petition_id = $petition_id;

        if ($req->file('file')) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('petitions', $filename);

            $fileModel->name = $filename;
            $fileModel->file_path = $filename;
            $res = $fileModel->save();

            return $fileModel;
        }
        return null;
    }
    public function sign(Request $request, $id)
    {
        try {

            if (!Auth::check()) {
                return redirect()->route('login')->withErrors('Debes iniciar sesión para firmar.');
            }

            $petition = Petition::findOrFail($id);
            $user = Auth::user();

            if ($petition->signers()->where('user_id', $user->id)->exists()) {
                return back()->with('error', "Ya has firmado esta petición.");
            }


            $petition->signers()->attach($user->id);

            $petition->increment('signeds');

            return redirect()->back()->with('success', '¡Gracias por firmar!');

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
    public function petitionsSigned(Request $request){
        $id = Auth::id();
        $user = User::findOrFail($id);
        $petitions = $user->signedPetitions;
        return view('petitions.index', compact('petitions'));
    }



    public function edit($id)
    {
        $petition = Petition::findOrFail($id);
        $this->authorize('update', $petition);
        $categories = Category::all();
        return view('petitions.edit-add', compact('petition', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $petition = Petition::findOrFail($id);
        $this->authorize('update', $petition);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'file' => 'nullable',
        ]);

        $petition->title = $request->title;
        $petition->description = $request->description;
        $petition->destinatary = $request->destinatary;

        $category = Category::findOrFail($request->category);
        $petition->category()->associate($category);

        if ($request->hasFile('file')) {
            $this->fileUpload($request, $petition->id);
        }

        $petition->save();

        return redirect()->route('petitions.show', $id)->with('success', 'Petición actualizada correctamente.');
    }

}
