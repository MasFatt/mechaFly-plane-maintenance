<?php

namespace App\Console\Commands;

use App\Models\Maintenance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendNotificationTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification-telegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $besok = now()->addDay()->format('Y-m-d');

        // Ambil data maintenance yang jatuh tempo besok
        $maintenances = Maintenance::whereDate('next_due', $besok)->get();

        if ($maintenances->isEmpty()) {
            \Log::info("Tidak ada maintenance yang due besok: {$besok}");
            $this->info('Tidak ada maintenance yang due besok.');
            return;
        }

        \Log::info("Mengirim notifikasi untuk " . $maintenances->count() . " maintenance yang due besok: {$besok}");

        foreach ($maintenances as $data) {
            $message = "*🛠️ Notifikasi Jadwal Perawatan!*\n"
                . "=====================\n"
                . "*Aircraft Name:* {$data->aircraft_name}\n"
                . "*Last Done:* {$data->last_done}\n"
                . "*Next Due:* {$data->next_due}\n"
                . "*Task Ref:* {$data->maintenance_task_ref}\n"
                . "*Card Ref:* {$data->mfg_task_card_ref}\n"
                . "*Threshold:* {$data->threshold}\n"
                . "*Interval:* {$data->interval}\n"
                . "*Forecast:* {$data->forecast}\n"
                . "*Deskripsi:*\n{$data->description}";

            $this->sendTelegramNotification($message);
        }
    }

    public function sendTelegramNotification($message)
    {
        $telegramToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        $url = "https://api.telegram.org/bot{$telegramToken}/sendMessage";

        $data = [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ];

        try {
        $response = Http::post($url, $data);
            if ($response->successful()) {
                \Log::info("Notifikasi Telegram berhasil dikirim." . $response->body());
            } else {
                \Log::error("Gagal mengirim notifikasi Telegram: " . $response->body());
            }
            \Log::info("URL: {$url}");

        } catch (\Exception $e) {
            \Log::error("Gagal mengirim notifikasi Telegram: " . $e->getMessage());
        }
    }
}
