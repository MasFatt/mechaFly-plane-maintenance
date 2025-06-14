<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Jadwal Perawatan Pesawat
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end gap-4 mb-6">
            <!-- Tombol Tambah Jadwal -->
            <a href="{{ route('maintenances.create') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Jadwal
            </a>

            <!-- Tombol Export Excel -->
            <a href="{{ route('export.aircraft') }}"
               class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-5 py-2.5 rounded-xl shadow-lg transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Export ke Excel
            </a>
        </div>

        @if ($maintenances->isEmpty())
            <div class="text-center text-gray-500 text-lg">
                Belum ada jadwal perawatan.
            </div>
        @else
            <div class="overflow-x-auto bg-white rounded-xl shadow ring-1 ring-gray-200">
                <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-5 py-3 text-left">Pesawat</th>
                            <th class="px-5 py-3 text-left">Deskripsi</th>
                            <th class="px-5 py-3 text-left">Last Done</th>
                            <th class="px-5 py-3 text-left">Next Due</th>
                            <th class="px-5 py-3 text-left">Task Ref</th>
                            <th class="px-5 py-3 text-left">MFG Ref</th>
                            <th class="px-5 py-3 text-left">Threshold</th>
                            <th class="px-5 py-3 text-left">Interval</th>
                            <th class="px-5 py-3 text-left">Forecast</th>
                            <th class="px-5 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($maintenances as $maintenance)
                            <tr class="hover:bg-blue-50 transition-all duration-200 ease-in-out group">
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->aircraft_name ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->description ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->last_done ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->next_due ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->maintenance_task_ref ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->mfg_task_card_ref ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->threshold ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->interval ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap">{{ $maintenance->forecast ?? '-' }}</td>
                                <td class="px-5 py-3 whitespace-nowrap flex items-center gap-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('maintenances.edit', $maintenance->id) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors duration-200" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 transition-colors duration-200"
                                            title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 012 2v0a2 2 0 01-2 2H7a2 2 0 01-2-2v0a2 2 0 012-2h10z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
