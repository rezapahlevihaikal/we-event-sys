<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'documentation';

    protected $fillable = [
        'status_id',
        'event_id',
        'title',
        'keterangan',
        'file'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }
}
