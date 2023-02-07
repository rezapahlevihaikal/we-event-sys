<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBudget extends Model
{
    use HasFactory;
    
    protected $table = 'event_budget';

    protected $fillable = [
        'event_id',
        'jenis_pengeluaran',
        'nominal'
    ];

    public function getEventId()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }
}
