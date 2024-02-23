<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Products::class, 'tags_products', 'tags_id', 'products_id');
    }
}
