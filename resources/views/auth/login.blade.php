<x-layouts::auth :title="__('Login to your account')">

    <x-components::status />

    <div class="card card-md">
        <form class="card-body" method="POST">
            @csrf

            <h2 class="h2 text-center mb-4">{{ __('Login to your account') }}</h2>

            <div class="mb-3">
                <x-components::forms.input type="email" name="email" :title="__('Email address')" value="{{ old('email') }}"
                    placeholder="your@email.com" required />
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">
                    {{ __('Password') }} <span class="text-danger">*</span>
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            {{ __('Forgot password') }}
                        </a>
                    </span>
                </label>

                <input type="password" class="form-control" name="password" id="password"
                    placeholder="{{ __('Password') }}" required />
                <x-components::forms.invalid-feedback field="password" />
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
