<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    use HasFactory;

    protected $table = 'daily_tasks';

    protected $fillable = [
        'status_id',
        'workflow_id',
        'detail_id',
        'event_id',
        'tanggal',
        'pic',
        'kegiatan',
        'status',
        'file'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    public function getWorkflow()
    {
        return $this->belongsTo('App\Models\Workflow', 'workflow_id', 'id');
    }
}
