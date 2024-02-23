<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'categories_id',
        'price'
    ];

    public function tags() {
        return $this->belongsToMany(Tags::class, 'products_tags', 'products_id', 'tags_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function categories()
    {
        return $this->hasMany(Categories::class);
    }
}
