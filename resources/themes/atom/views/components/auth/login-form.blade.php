<x-slot name="title">
    <h2 class="text-2xl font-semibold">{{ __('Hallo!') }}</h2>
    <p class="dark:text-gray-400">
        {{ __('Er zijn op dit moment :online Rainys online', ['online' => DB::table('users')->where('online', '1')->count()]) }}
    </p>
</x-slot>

<form class="flex flex-col gap-y-3" action="{{ route('login') }}" method="POST">
    @csrf

    <div>
        <x-form.label for="username">
            {{ __('Gebruikersnaam') }}
        </x-form.label>

        <x-form.input error-bag="login" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}"
            :autofocus="true" />
    </div>

    <div>
        <x-form.label for="password">
            {{ __('Wachtwoord') }}
        </x-form.label>

        <x-form.input error-bag="login" name="password" placeholder="{{ __('Password') }}" type="password" />
    </div>

    @if (setting('google_recaptcha_enabled'))
        <div class="g-recaptcha" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
    @endif

    <x-form.primary-button>
        {{ __('Log in') }}
    </x-form.primary-button>

    <div class="text-center text-sm font-semibold text-gray-700 dark:text-gray-400">
        <a href="{{ route('register') }}" class="hover:underline" x-on:click="open = false">
            {{ __('Nog geen account? Registreer nu!') }}
        </a>
        
    </div>
</form>
