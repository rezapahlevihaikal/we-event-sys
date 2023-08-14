<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectIncome extends Model
{
    use HasFactory;

    protected $table = 'project_income';

    protected $fillable = [
        'event_id',
        'income_we',
        'income_partner',
        'income_partner',
        'ppn_we',
        'ppn_partner',
        'pph_we',
        'pph_partner'
    ];
}
