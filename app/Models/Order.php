<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['payment_status', 'totalPrice', 'user_id', 'products'];
    protected $casts = [
        'products' => 'array'
    ];
}
