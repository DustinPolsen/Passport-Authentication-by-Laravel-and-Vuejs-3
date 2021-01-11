<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccountLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'delivery_for_customer_id',
        'sales_executive_id',
        'payment',
        'payment_due',
    ];
}