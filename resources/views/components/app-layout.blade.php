<!-- resources/views/components/app-layout.blade.php -->
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow p-4 hidden md:block">
        <div class="text-lg font-bold mb-4">✈️ Plane Maintenance</div>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('maintenances.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">
                    📅 Penjadwalan
                </a>
            </li>
            <!-- Tambah menu lain di sini -->
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 bg-gray-100">
        <header class="bg-white p-4 shadow">
            {{ $header ?? '' }}
        </header>

        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</div>
