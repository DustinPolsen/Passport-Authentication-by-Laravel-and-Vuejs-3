<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesExecutive extends Model
{
    use HasFactory;

    protected $fillable = [
        'smg_menager_id',
        'name',
        'email',
        'phone',
        'nid_image',
        'image',
        'account_status',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}