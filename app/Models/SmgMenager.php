<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmgMenager extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
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