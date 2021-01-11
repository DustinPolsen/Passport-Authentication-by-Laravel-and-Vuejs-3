<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_executive_id',
        'zone_id',
        'name',
        'email',
        'phone',
        'area',
        'city',
        'account_balance',
        'account_due',
        'address_line_1',
        'address_line_2',
        'image',
        'nid_image',
        'account_status',
    ];
}