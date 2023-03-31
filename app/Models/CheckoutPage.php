<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutPage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'order_total', 'payment_method'];
}
