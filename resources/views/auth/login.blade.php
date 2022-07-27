<style>
    .view_background {
        background-image: url('https://scontent.fcai19-8.fna.fbcdn.net/v/t1.18169-9/11182247_490079594480102_7337547165823997638_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=e3f864&_nc_ohc=2WmDPnETxzUAX_yuFLJ&_nc_ht=scontent.fcai19-8.fna&oh=00_AT9wpv6TcXzl17g6q3inb20W5TWnyqSEc0L_Vr_C9PYYog&oe=62DF240D');
        background-size: cover;

        /*opacity: 0.4;*/
    }

    .view_background2 {
        background-color: white;
        background-size: cover;
        /* opacity: 0.4; */
    }
</style>

<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="animation__wobble" src="/img/Ethydco.png" alt="Ethydco" height="200" width="200" >
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="view_background2">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>

</x-guest-layout>
