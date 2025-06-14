<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'aircraft_name', 'last_done', 'next_due',
        'maintenance_task_ref', 'mfg_task_card_ref',
        'description', 'threshold', 'interval', 'forecast'
    ];

}
