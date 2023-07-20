<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'status_id',
        'tipe_id',
        'partner_id',
        'tema',
        'product_id',
        'lokasi',
        'budget',
        'schedule',
        'on_event',
        'status_event',
        'file',
        'status',
        'prediksi_revenue'
    ];

    public function getTipe()
    {
        return $this->belongsTo('App\Models\TipeEvent', 'tipe_id','id');
    }

    public function getProduct()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function getPartner()
    {
        return $this->belongsTo('App\Models\Partner', 'partner_id', 'id');
    }
}
