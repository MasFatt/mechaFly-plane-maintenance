<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto">
        @csrf

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/Test.png') }}" alt="Logo" class="h-10 w-40 mt-4">
        </div>


        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success shadow-sm mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Email -->
        <div class="form-control w-full mb-4">
            <label for="email" class="label">
                <span class="label-text">Email</span>
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="input input-bordered w-full" />
            @error('email')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-control w-full mb-4">
            <label for="password" class="label">
                <span class="label-text">Password</span>
            </label>
            <input id="password" type="password" name="password" required class="input input-bordered w-full" />
            @error('password')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
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
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link link-hover text-sm">Forgot your password?</a>
            @endif

            <button type="submit" class="btn btn-primary">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>
