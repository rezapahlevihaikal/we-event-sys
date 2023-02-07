<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    use HasFactory;

    protected $table = 'daily_tasks';

    protected $fillable = [
        'event_id',
        'tanggal',
        'pic',
        'kegiatan',
        'status'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }
}
