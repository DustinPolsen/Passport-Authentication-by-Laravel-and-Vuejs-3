<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketList extends Model
{
    use HasFactory;

    protected $fillable = [
        'smg_manager_id',
        'purchase_team_id',
        'name',
    ];
}