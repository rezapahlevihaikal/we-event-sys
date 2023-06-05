<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $table = 'audiences';

    protected $fillable = [
        'event_id',
        'jenis_peserta',
        'target_peserta',
        'aktual_peserta',
        'target_hybrid',
        'aktual_hybrid',
        'keterangan',
        'file'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }
}
