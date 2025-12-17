<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminPetitionsController extends Controller
{

    public function index()
    {
        $petitions = Petition::all();
        return view('admin.home', compact('petitions'));
    }

    public function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view('admin.petitions.show', compact('petition'));
    }

    public function edit($id)
    {
        $petition = Petition::findOrFail($id);
        $categorias = Category::all();
        return view('admin.petitions.edit', compact('petition', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:pending,accepted',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $petition = Petition::findOrFail($id);

        $this->authorize('update', $petition);
        $petition->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'status'      => $request->input('status'),
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $petition->files()->first();

            if ($oldImage) {
                $oldPath = public_path('petitions/' . $oldImage->file_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
                $oldImage->delete();
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('petitions'), $filename);

            $petition->files()->create([
                'file_path' => $filename,
            ]);
        }

        return redirect()->route('admin.home')
            ->with('success', 'Petición actualizada correctamente.');
    }

    public function delete($id)
    {
        $petition = Petition::findOrFail($id);

        $petition->signers()->detach();

        $file = $petition->files()->first();
        if ($file) {
            $path = public_path('petitions/' . $file->file_path);
            if (file_exists($path)) {
                unlink($path);
            }
            $file->delete();
        }

        $petition->delete();

        return back()->with('success', 'Petición y sus firmas eliminadas correctamente.');
    }

    public function cambiarEstado($id)
    {
        $petition = Petition::findOrFail($id);

        if ($petition->status == 'pending') {
            $petition->status = 'accepted';
        } else {
            $petition->status = 'pending';
        }

        $petition->save();
        return back()->with('status', 'Estado actualizado.');
    }
}
