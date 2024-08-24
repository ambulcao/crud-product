<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function product(Request $request)
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

    public function index()
    {
        return Product::all();
    }
}