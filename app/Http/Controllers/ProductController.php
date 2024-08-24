<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return $products;
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'data_de_validade' => 'required|date|after_or_equal:today',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'required|exists:categories,id',
        ]);

        // Upload da imagem (se existir)
        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('images', 'public'); 
            $fields['imagem'] = $imagePath;
        }

        $product = Product::create($fields);

        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $fields = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'sometimes|string|max:255',
            'preco' => 'sometimes|numeric',
            'data_de_validade' => 'sometimes|date|after_or_equal:today',
            'imagem' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'sometimes|exists:categories,id',
        ]);

        // Upload da nova imagem (se existir)
        if ($request->hasFile('imagem')) {
            // Exclui a imagem antiga (se existir)
            if ($product->imagem) {
                Storage::disk('public')->delete($product->imagem);
            }
            $imagePath = $request->file('imagem')->store('images', 'public'); 
            $fields['imagem'] = $imagePath;
        }

        $product->update($fields);

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        // Exclui a imagem antiga (se existir)
        if ($product->imagem) {
            Storage::disk('public')->delete($product->imagem);
        }

        $product->delete();
        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}