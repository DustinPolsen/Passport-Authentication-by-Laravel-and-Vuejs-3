<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'smg_manager_id',
        'zone_id',
        'name',
        'email',
        'phone',
        'address_line_1',
        'address_line_2',
        'image',
        'nid_image',
        'account_status',
        'password',
    ];
}