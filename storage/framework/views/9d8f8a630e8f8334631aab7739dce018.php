<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Jadwal Perawatan Pesawat
        </h2>
     <?php $__env->endSlot(); ?>

    
    <?php if(session('success')): ?>
        <?php if(session('success')): ?>
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                class="alert alert-success shadow-lg my-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                </svg>
                <div>
                    <span class="font-bold">Sukses!</span> <?php echo e(session('success')); ?>

                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end gap-4 mb-6">
            <!-- Tombol Tambah Jadwal -->
            <a href="<?php echo e(route('maintenances.create')); ?>" class="btn btn-outline btn-primary">
                Tambah Maintenance
            </a>

            <!-- Tombol Export Excel -->
            <a href="<?php echo e(route('export.aircraft')); ?>" class="btn btn-outline btn-info">
                Export ke Excel
            </a>

            <!-- Tombol Export Excel -->
            <form action="<?php echo e(route('maintenance.import')); ?>" method="POST" enctype="multipart/form-data"
                class="flex items-center space-x-2">
                <?php echo csrf_field(); ?>

                <input type="file" name="file" required class="file-input file-input-bordered file-input-sm" />

                <button type="submit" class="btn btn-sm btn-outline btn-primary">
                    + Import
                </button>
            </form>
        </div>

        <?php if($maintenances->isEmpty()): ?>
            <div class="text-center">
                <span class="font-semibold">Info:</span> Belum ada jadwal perawatan.
            </div>
        <?php else: ?>
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
                        <?php $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-blue-50 transition-all duration-200 ease-in-out group">
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->aircraft_name ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->description ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->last_done ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->next_due ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->maintenance_task_ref ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->mfg_task_card_ref ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->threshold ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->interval ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap"><?php echo e($maintenance->forecast ?? '-'); ?></td>
                                <td class="px-5 py-3 whitespace-nowrap flex items-center gap-3">
                                    <!-- Tombol Edit -->
                                    <a href="<?php echo e(route('maintenances.edit', $maintenance->id)); ?>"
                                        class="text-blue-600 hover:text-blue-800 transition-colors duration-200" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="<?php echo e(route('maintenances.destroy', $maintenance->id)); ?>" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mechaFly-plane-maintenance\resources\views/maintenances/index.blade.php ENDPATH**/ ?>