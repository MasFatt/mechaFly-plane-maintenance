<?php

namespace App\Imports;

use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaintenancesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Maintenance([
            'aircraft_name'        => $row['nama_pesawat'],   // disesuaikan!
            'last_done'            => $row['last_done'],
            'next_due'             => $row['next_due'],
            'maintenance_task_ref' => $row['task_ref'],
            'mfg_task_card_ref'    => $row['mfg_ref'],
            'description'          => $row['deskripsi'],
            'threshold'            => $row['threshold'],
            'interval'             => $row['interval'],
            'forecast'             => $row['forecast'],
        ]);
    }
}

