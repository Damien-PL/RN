<x-guest-layout>
    <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Bedankt voor het aanmelden! Zou je, voordat je het hotel gaat ontdekken, je e-mailadres kunnen verifiëren door op de link te klikken die we naar je hebben gemaild? Als je de e-mail niet hebt ontvangen, sturen wij je graag een nieuwe.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ __('Er is een nieuwe verificatielink verzonden naar het e-mailadres dat je tijdens de registratie hebt opgegeven.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button type="submit"
                            class="ml-4 inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25">
                            {{ __('Verificatie-e-mail Opnieuw Verzenden') }}
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-sm text-gray-600 underline hover:text-gray-900">
                        {{ __('Uitloggen') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
