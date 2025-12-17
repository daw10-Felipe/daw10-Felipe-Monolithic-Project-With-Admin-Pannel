<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Petition;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.home', compact('categories'));
    }

    public function create()
    {
        // Pasamos una instancia vacía para no romper el formulario compartido
        $category = new Category();
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        // COMPROBACIÓN DE SEGURIDAD
        // Si hay alguna petición usando esta categoría, impedimos el borrado.
        if (Petition::where('category_id', $id)->exists()) {
            return back()->with('error', 'No puedes eliminar esta categoría porque hay peticiones asociadas a ella. Por favor, borra las peticiones o cambia de categoría esas peticiones antes reyyy 😝.');
        }

        $category->delete();

        return back()->with('success', 'Categoría eliminada correctamente.');
    }
}
