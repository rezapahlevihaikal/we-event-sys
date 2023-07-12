<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    use HasFactory;

    protected $table = 'potensi_revenue';

    protected $fillable = [
        'status_id',
        'event_id',
        'company_id',
        'potensi',
        'aktual_potensi',
        'aktual_revenue',
    ];

    public function getEventId()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    public function getCompany()
    {
        return $this->belongsTo('App\Models\Companies', 'company_id', 'id');
    }
}