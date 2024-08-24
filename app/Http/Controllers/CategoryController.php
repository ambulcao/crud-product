<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Request $request) {
        $fields = $request->validate([
            'nome' => 'required|max:255'
        ]);

        $category = Category::create($fields);

        return $category;
    }
}
