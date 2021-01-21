<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable= ['name', 'title', 'category_id', 'sales_price', 'cost_price', 'product_size', 'image', 'short_description', 'long_description' ];
    protected $fillable = [
        'name',
        'title',
        'category_id',
        'sales_price',
        'cost_price',
        'product_size',
        'short_description',
        'long_description'
    ];
}