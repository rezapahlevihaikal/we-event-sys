<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeEvent extends Model
{
    use HasFactory;

    protected $table = 'tipe_events';

    protected $fillable = [
        'name'
    ];
}
