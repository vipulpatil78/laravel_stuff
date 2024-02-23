<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'category_id'
    ];

    public function category() {
        return $this->hasMany(Product::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags', 'product_id', 'tag_id');
    }
}
