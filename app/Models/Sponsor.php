<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsors';

    protected $fillable = [
        'event_id',
        'company_id',
        'nominal',
        'benefit_sponsor'
    ];

    public function getEvent()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    public function getCompany()
    {
        return $this->belongsTo('App\Models\Companies', 'company_id', 'id');
    }

}
