<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Jadwal Perawatan
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('maintenances.update', (isset($maintenance) && is_object($maintenance) ? $maintenance->id : null)) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium mb-1">Nama Pesawat</label>
                    <input type="text" name="aircraft_name" value="{{ old('aircraft_name', (isset($maintenance) && is_object($maintenance) ? $maintenance->aircraft_name : '') ) }}"
                           class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Last Done</label>
                        <input type="date" name="last_done" value="{{ old('last_done', $maintenance->last_done) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Next Due</label>
                        <input type="date" name="next_due" value="{{ old('next_due', $maintenance->next_due) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Maintenance Task Reference</label>
                        <input type="text" name="maintenance_task_ref" value="{{ old('maintenance_task_ref', $maintenance->maintenance_task_ref) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">MFG Task Card Reference</label>
                        <input type="text" name="mfg_task_card_ref" value="{{ old('mfg_task_card_ref', $maintenance->mfg_task_card_ref) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="description" rows="3"
                              class="w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $maintenance->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Threshold</label>
                        <input type="text" name="threshold" value="{{ old('threshold', $maintenance->threshold) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Interval</label>
                        <input type="text" name="interval" value="{{ old('interval', $maintenance->interval) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Forecast</label>
                        <input type="text" name="forecast" value="{{ old('forecast', $maintenance->forecast) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>

                <div class="text-right mt-6">
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
