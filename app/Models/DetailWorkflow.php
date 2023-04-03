<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWorkflow extends Model
{
    use HasFactory;

    protected $table = 'detail_workflows';
    protected $fillable = [
        'workflow_id',
        'detail',
        'bobot'
    ];

    public function getWorkflow()
    {
        return $this->belongsTo('App\Models\Workflow', 'workflow_id', 'id');
    }
}
