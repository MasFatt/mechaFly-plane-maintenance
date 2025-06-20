<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MaintenancesImport; // <--- UBAH INI! Import MaintenancesImport
use App\Models\Maintenance; // <--- Import model Maintenance (jika perlu untuk menampilkan)

class MaintenanceImportController extends Controller // <--- Ganti nama controller (opsional tapi disarankan)
{
    public function showForm()
    {
        return view('imports.maintenance'); // Asumsi view untuk form import maintenance
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);

        try {
            Excel::import(new MaintenancesImport, $request->file('file'));
            
            return redirect()->route('maintenance.index')->with('success', 'Data maintenance berhasil diimport!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimpor data maintenance: ' . $e->getMessage());
        }
    }
}
