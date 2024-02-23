<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function tags() {
        return $this->belongsToMany(Tags::class, 'tags_products', 'tags_id', 'products_id');
    }
}
