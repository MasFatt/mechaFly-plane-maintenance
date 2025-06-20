<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form method="POST" action="<?php echo e(route('login')); ?>" class="max-w-md mx-auto">
        <?php echo csrf_field(); ?>

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="<?php echo e(asset('storage/Test.png')); ?>" alt="Logo" class="h-10 w-40 mt-4">
        </div>


        <!-- Session Status -->
        <?php if(session('status')): ?>
            <div class="alert alert-success shadow-sm mb-4">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <!-- Email -->
        <div class="form-control w-full mb-4">
            <label for="email" class="label">
                <span class="label-text">Email</span>
            </label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus class="input input-bordered w-full" />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-sm text-red-500 mt-1"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Password -->
        <div class="form-control w-full mb-4">
            <label for="password" class="label">
                <span class="label-text">Password</span>
            </label>
            <input id="password" type="password" name="password" required class="input input-bordered w-full" />
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-sm text-red-500 mt-1"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Remember Me -->
        <div class="form-control mb-4">
            <label class="label cursor-pointer justify-start gap-2">
                <input id="remember_me" type="checkbox" name="remember" class="checkbox checkbox-primary" />
                <span class="label-text">Remember me</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between">
            <?php if(Route::has('password.request')): ?>
                <a href="<?php echo e(route('password.request')); ?>" class="link link-hover text-sm">Forgot your password?</a>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">
                Log in
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mechaFly-plane-maintenance\resources\views/auth/login.blade.php ENDPATH**/ ?>