<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-gray-800">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        <p class="mt-3 mb-2 text-center">o</p>

        <form method="GET" action="{{ route('login.driver','facebook') }}">
        @csrf
        <x-jet-button class="bg-blue-500 hover:bg-blue-500 active:bg-blue-500 w-full px-20">
            <a href="{{route('login.driver','facebook')}}"></a>
            {{ __('Iniciar sesi??n con Facebook') }}
        </x-jet-button>
        </form>

        <form method="GET" action="{{ route('login.driver','google') }}">
            @csrf
            <x-jet-button class=" bg-red-500 hover:bg-red-500 active:bg-red-500 mt-2 w-full text-center px-20" href="{{route('login.driver','google')}}">
                {{ __('  Iniciar sesi??n con Google') }}
            </x-jet-button>
            </form>
    </x-jet-authentication-card>
</x-guest-layout>
