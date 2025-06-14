<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AircraftMaintenance extends Model
{
    protected $table = 'maintenances'; // pastikan nama ini sesuai dengan tabel di database

    // Jika tidak menggunakan timestamps:
    public $timestamps = false;
}
