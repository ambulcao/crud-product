<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $category = Category::create($fields);

        return $category;
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }
        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $fields = $request->validate([
            'nome' => 'sometimes|string|max:255',
        ]);

        $category->update($fields);

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return [
            'message' => 'A Categoria foi excluída.'
        ];
        
    }

}
