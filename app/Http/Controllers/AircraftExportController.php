<?php

namespace App\Http\Controllers;

use App\Exports\AircraftMaintenanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AircraftExportController extends Controller
{
    public function export()
    {
        return Excel::download(new AircraftMaintenanceExport, 'aircraft_maintenance.xlsx');
    }
}
