<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'data_de_validade',
        'imagem',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class);
    }
}