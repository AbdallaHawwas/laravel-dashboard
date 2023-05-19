<x-layouts::auth :title="__('Login to your account')">

    <x-components::status />

    <div class="card card-md">
        <form class="card-body" method="POST">
            @csrf

            <div class="text-center mb-4">
                <h2 class="h2 mb-2">
                    {{ __('Login to your account') }}
                </h2>

                <p class="text-muted">
                    {{ __('Forgot your password?') }}
                    <a href="{{ route('password.request') }}">{{ __('Reset password') }}</a>
                </p>
            </div>

            <div class="mb-3">
                <x-components::forms.input type="email" name="email" :title="__('Email address')" value="{{ old('email') }}"
                    placeholder="your@email.com" required />
            </div>

            <div class="mb-3">
                <x-components::forms.input type="password" name="password" :title="__('Password')" :placeholder="__('Password')"
                    required />
            </div>

            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <span class="form-check-label">{{ __('Remember me on this device') }}</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
            </div>
        </form>
    </div>
</x-layouts::auth>
