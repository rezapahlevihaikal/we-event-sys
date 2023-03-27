<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventWorkflow extends Model
{
    use HasFactory;

    protected $table = 'event_workflows';

    protected $fillable = [
        'status_id',
        'event_id',
        'workflow_id',
        'start_date',
        'end_date',
        'percentage',
        'desc'
    ];

    public function getEventId()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    public function getWorkflow()
    {
        return $this->belongsTo('App\Models\Workflow', 'workflow_id', 'id');
    }
}
