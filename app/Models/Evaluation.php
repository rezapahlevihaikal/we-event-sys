<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';

    protected $fillable = 
    [
        'status_id',
        'event_id',
        'parameter',
        'keterangan',
        'nilai',
        'username'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }
}
