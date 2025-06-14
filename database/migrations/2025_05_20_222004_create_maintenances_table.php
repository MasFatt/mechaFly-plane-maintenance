<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('aircraft_name');
            $table->date('last_done'); // format: YYYY-MM-DD
            $table->date('next_due'); // format: YYYY-MM-DD

            $table->string('maintenance_task_ref');
            $table->string('mfg_task_card_ref');

            $table->text('description');

            $table->string('threshold'); // mungkin sebaiknya integer jika hanya angka
            $table->string('interval');  // bisa jadi lebih baik pakai integer atau interval tipe custom

            // forecast disimpan sebagai string, bukan date
            // jika hanya angka (misalnya "3"), pastikan ini string atau integer
            $table->string('forecast');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
