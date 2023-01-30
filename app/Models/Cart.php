<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartDetail;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = 
    [
        'customer_name',
        'address',
        'email',
        'phone_number',
        'total_price',
        'active'
    ];

    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class);
    }
}
