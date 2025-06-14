<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            ✍️ {{ isset($maintenance) ? 'Edit' : 'Tambah' }} Jadwal Perawatan
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <form action="{{ isset($maintenance) ? route('maintenances.update', $maintenance) : route('maintenances.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            @if(isset($maintenance))
                @method('PUT')
            @endif

            <!-- Aircraft name -->
            <div>
                <label class="block font-medium mb-1">Nama Pesawat</label>
                <input type="text" name="aircraft_name" value="{{ old('aircraft_name', (isset($maintenance) && is_object($maintenance) ? $maintenance->aircraft_name : '') ) }}"
                class="w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Maintenance Dates -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-1">Last Done</label>
                    <input type="date" name="last_done" value="{{ old('last_done', $maintenance->last_done ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block font-medium mb-1">Next Due</label>
                    <input type="date" name="next_due" value="{{ old('next_due', $maintenance->next_due ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <!-- Task References -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-1">Maintenance Task Reference</label>
                    <input type="text" name="maintenance_task_ref" value="{{ old('maintenance_task_ref', $maintenance->maintenance_task_ref ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block font-medium mb-1">MFG Task Card Reference</label>
                    <input type="text" name="mfg_task_card_ref" value="{{ old('mfg_task_card_ref', $maintenance->mfg_task_card_ref ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $maintenance->description ?? '') }}</textarea>
            </div>

            <!-- Threshold, Interval, Forecast -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block font-medium mb-1">Threshold</label>
                    <input type="text" name="threshold" value="{{ old('threshold', $maintenance->threshold ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block font-medium mb-1">Interval</label>
                    <input type="text" name="interval" value="{{ old('interval', $maintenance->interval ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block font-medium mb-1">Forecast</label>
                    <input type="text" name="forecast" value="{{ old('forecast', $maintenance->forecast ?? '') }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow">
                    {{ isset($maintenance) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
