<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $fillable = 
    [
        'cart_id',
        'product_id',
        'amount',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
