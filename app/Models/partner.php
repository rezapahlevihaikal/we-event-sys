<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    use HasFactory; 

    protected $table = 'partners';

    protected $fillable = 
    [
        'nama_partner',
        'type',
        'fee_marketing'
    ]; 
}
