<x-layouts::auth :title="__('Create new account')">

    <x-components::status />

    <div class="card card-md">
        <form class="card-body" method="POST" action="{{ route('website.register.store') }}">
            @csrf

            <div class="text-center mb-4">
                <h2 class="h2 mb-2">
                    {{ __('Create new account') }}
                </h2>

                <p class="text-muted">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('website.login') }}">{{ __('Login') }}</a>
                </p>
            </div>

            <div class="mb-3">
                <x-components::forms.input type="text" name="name" :title="__('Name')" value="{{ old('name') }}"
                    required />
            </div>

            <div class="mb-3">
                <x-components::forms.input type="email" name="email" :title="__('Email address')" value="{{ old('email') }}"
                    placeholder="your@email.com" required />
            </div>

            <div class="mb-3">
                <x-components::forms.input type="password" name="password" :title="__('Password')" :placeholder="__('Password')"
                    required />
            </div>

            <div class="mb-3">
                <x-components::forms.input type="password" name="password_confirmation" :title="__('Confirm Password')"
                    :placeholder="__('Confirm Password')" required />
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
            </div>
        </form>
    </div>
</x-layouts::auth>
