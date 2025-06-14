<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::all();
        return view('maintenances.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maintenances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'aircraft_name' => 'required|string',
            'last_done' => 'required|date',
            'next_due' => 'required|date',
            'maintenance_task_ref' => 'required|string',
            'mfg_task_card_ref' => 'required|string',
            'description' => 'required|string',
            'threshold' => 'required|string',
            'interval' => 'required|string',
            'forecast' => 'required|string',
        ]);

        $maintenance = Maintenance::create($data);

        $message = "*🛠️ Jadwal Perawatan Baru!*\n=====================\n"
                 . "*Aircraft Name:* {$data['aircraft_name']}\n"
                 . "*Last Done:* {$data['last_done']}\n"
                 . "*Next Due:* {$data['next_due']}\n"
                 . "*Task Ref:* {$data['maintenance_task_ref']}\n"
                 . "*Card Ref:* {$data['mfg_task_card_ref']}\n"
                 . "*Threshold:* {$data['threshold']}\n"
                 . "*Interval:* {$data['interval']}\n"
                 . "*Forecast:* {$data['forecast']}\n"
                 . "*Deskripsi:*\n{$data['description']}";

        $this->sendTelegramNotification($message);

        return redirect()->route('maintenances.index');
    }

    private function sendTelegramNotification($message) {
        Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage", [
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('maintenances.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'aircraft_name' => 'required|string',
            'last_done' => 'required|date',
            'next_due' => 'required|date',
            'maintenance_task_ref' => 'required|string',
            'mfg_task_card_ref' => 'required|string',
            'description' => 'required|string',
            'threshold' => 'required|string',
            'interval' => 'required|string',
            'forecast' => 'required|string',
        ]);

        $maintenance->update($request->all());

        return redirect()->route('maintenances.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenances.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
