<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function tags() {
        return $this->belongsToMany(Products::class, 'tags_products', 'products_id', 'tags_id');
    }
}
