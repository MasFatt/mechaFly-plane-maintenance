<?php

namespace App\Exports;

use App\Models\AircraftMaintenance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AircraftMaintenanceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return AircraftMaintenance::select(
            'aircraft_name',        // kolom nama pesawat
            'last_done',     // deskripsi task
            'next_due',       // terakhir dilakukan
            'maintenance_task_ref',        // kapan due
            'mfg_task_card_ref',        // referensi task
            'description',         // referensi pabrikan
            'threshold',
            'interval',
            'forecast'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama Pesawat',
            'Last Done',
            'Next Due',
            'Task Ref',
            'MFG Ref',
            'Deskripsi',
            'Threshold',
            'Interval',
            'Forecast',
        ];
    }
}
