<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Products extends Model
{
    use HasFactory;

    public function up() {
        Schema::create('products', function (Blueprint $table)) {
            
        }
    }
}
