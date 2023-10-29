<x-app-layout>
    @push('title', __('Twee-staps'))

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-9">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Twee-stapsverificatiie') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Voeg een extra beveiligingslaag toe aan je account door twee-stapsverificatie in te schakelen') }}
            </x-slot:under-title>

            <!-- 2FA enabled, we display the QR code : -->
            @if (auth()->user()->two_factor_confirmed)
                <form action="/user/two-factor-authentication" method="post">
                    @csrf
                    @method('delete')

                    <x-form.danger-button>
                        {{ __('2FA uitschakelen') }}
                    </x-form.danger-button>
                </form>

                {{-- 2FA enabled but not yet confirmed, we show the QRcode and ask for confirmation --}}
            @elseif(auth()->user()->two_factor_secret)
                <p>{{ __('Bevestig de inschakeling van 2FA door de volgende QR-code te scannen en voer de automatisch gegenereerde 2FA-code van de app in.') }}
                </p>

                <div class="mt-4 flex flex-col items-center md:flex-row md:items-start md:justify-center">
                    <div class="flex gap-x-8 rounded bg-gray-100 px-4 py-2">
                        <span class="flex items-center">
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </span>

                        <div>
                            <strong>
                                {{ __('Recovery codes:') }}
                            </strong>

                            <ul>
                                @foreach (auth()->user()->recoveryCodes() as $code)
                                    <li>{{ $code }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-2 flex justify-center text-xs italic text-gray-600">
                    <div class="w-full lg:w-[480px]">
                        {{ __('Bewaar je herstelcodes op een veilige plek! Als je de toegang tot je 2FA-codes verliest, zijn deze herstelcodes nodig om weer toegang tot je account te krijgen.') }}
                    </div>
                </div>

                <form action="{{ route('two-factor.verify') }}" method="POST" class="mt-8">
                    @csrf

                    <x-form.label for="code">
                        {{ __('Code') }}

                        <x-slot:info>
                            {{ __('Scan de bovenstaande QR-code met je telefoon om de 2FA-code op te halen.') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="code" placeholder="{{ __('Code') }}" />

                    <x-form.secondary-button classes="mt-4">
                        {{ __('Bevestig 2FA') }}
                    </x-form.secondary-button>
                </form>
            @else
                <div class="flex flex-col items-end">
                    <div class="flex w-full flex-col gap-y-3 dark:text-gray-100">
                        <p>
                            {{ __('Hier bij :hotel nemen we beveiliging zeer serieus en daarom bieden we je als Rainy een manier om je geliefde account nog verder te beveiligen, door de mogelijkheid te bieden om 2FA in te schakelen!', ['hotel' => setting('hotel_name')]) }}
                        </p>

                        <p>
                            {{ __('TTwee-stapsverificatie voegt een extra beveiligingslaag toe aan je account, waardoor het fysiek onmogelijk wordt om er toegang toe te krijgen zonder toegang tot je mobiele telefoon, aangezien alleen jouw telefoon de 2FA-code bevat die elke 30 seconden automatisch opnieuw wordt gegenereerd') }}
                        </p>
                    </div>

                    <form action="/user/two-factor-authentication" method="post" class="mt-8">
                        @csrf

                        <x-form.secondary-button>
                            {{ __('Activeer 2FA') }}
                        </x-form.secondary-button>
                    </form>
                </div>
            @endif
        </x-content.content-card>
    </div>
</x-app-layout>
