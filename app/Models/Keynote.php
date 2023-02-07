<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keynote extends Model
{
    use HasFactory;

    protected $table = 'keynotes';

    protected $fillable = [
        'event_id',
        'narasumber',
        'tema'
    ];
}
