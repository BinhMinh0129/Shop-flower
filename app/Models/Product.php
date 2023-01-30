<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'image',
        'description',
        'content',
        'price',
        'price_sale',
        'active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
