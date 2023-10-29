<x-app-layout>
    @push('title', __('Shop'))

    <div class="col-span-12">
        <x-modals.modal-wrapper>
            <div class="w-full py-2 px-4 text-center bg-[#f68b08] text-white rounded">
                {{ __('Lees eerst de') }}
                <button class="text-white underline font-bold" x-on:click="open = true">{{ __('Algemene Voorwaarden') }}</button>
                {{ __('van onze shop, voordat je iets koopt.') }}
            </div>

            <x-modals.regular-modal>
                <x-slot name="title">
                    <h2 class="text-2xl">
                        {{ __('Algemene Voorwaarden Shop') }}
                    </h2>
                </x-slot>

                <div class="space-y-3 p-2">
                    <p>
                        {{ __('Hier bij :hotel Hotel accepteren we donaties om het hotel draaiende te houden en als bedankje ontvang je daarvoor in-game items.', ['hotel' => setting('hotel_name')]) }}
                    </p>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('Waarom zijn donaties voor ons belangrijk?') }}</p>

                        <p>{{ __('Donaties zijn belangrijk, omdat het helpt om de rekeningen te betalen die nodig zijn om het hotel draaiende te houden, en om nieuwe functies toe te voegen waar jij en anderen van kunnen genieten!') }}</p>
                    </div>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('Onze voorwaarden') }}</p>

                        <p>{{ __('Zodra een donatie is gedaan en door ons is ontvangen, kan deze onder geen enkele omstandigheid worden gerestitueerd. Het gedoneerde bedrag wordt omgezet in websitesaldo en kan niet terug worden omgezet in contant geld of andere vormen van echt geld. Door een donatie te doen, erken en aanvaard je deze voorwaarden en ga je ermee akkoord geen terugvordering of geschil met je bank of kaartuitgever te starten.') }}</p>
                    </div>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('LET OP!') }}</p>

                        <p>{{ __('Het is belangrijk om verantwoordelijk met je geld om te gaan. Kom niet in de verleiding om geld uit te geven dat je niet hebt!') }}</p>
                        <p>{{ __('Vergeet niet dat je financiële welzijn cruciaal is en dat het maken van verantwoorde keuzes essentieel is. Als je problemen ervaart bij het beheersen van je uitgaven, aarzel dan niet om professionele begeleiding te zoeken. Er zijn verschillende hulpmiddelen beschikbaar die advies en ondersteuning kunnen bieden.') }}</p>
                    </div>
                </div>
            </x-modals.regular-modal>
        </x-modals.modal-wrapper>
    </div>

    <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9">
        <div class="flex flex-col gap-y-2 dark:text-gray-300">
            @foreach ($articles as $article)
                <x-shop.packages :article="$article" />
            @endforeach
        </div>
    </div>

    <div class="row-start-2 md:row-auto col-span-12 flex flex-col gap-y-3 md:col-span-5 lg:col-span-4 xl:col-span-3">
        <x-content.content-card icon="currency-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Account opwaarderen') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Doneer aan :hotel', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="text-sm text-center py-2 px-4 rounded bg-gray-100 text-black dark:text-gray-100 dark:bg-gray-700">
                {{ __('Huidig saldo: €:balance', ['balance' => auth()->user()->website_balance]) }}
            </div>

            @if(config('paypal.live.client_id') && config('paypal.live.client_secret'))
                <form action="{{ route('paypal.process-transaction') }}" method="GET" class="mt-3">
                    @csrf

                    <x-form.input name="amount" type="number" value="0" placeholder="amount" />

                    <button type="submit" class="mt-2 w-full rounded bg-blue-600 hover:bg-blue-700 text-white p-2 border-2 border-blue-500 transition ease-in-out duration-150 font-semibold">
                        {{ __('Doneer') }}
                    </button>
                </form>
            @else
                <p class="dark:text-gray-100  mt-4 text-xs">
                    {{ __('Voer je PayPal-gegevens in om te kunnen opwaarderen') }}
                </p>
            @endif
        </x-content.content-card>


        <x-content.content-card icon="catalog-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Voucher') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Gebruik een voucher voor gratis tegoed') }}
            </x-slot:under-title>

            <form action="{{ route('shop.use-voucher') }}" method="POST">
                @csrf

                <x-form.input name="code" type="text" placeholder="Voucher" />

                <x-form.secondary-button classes="mt-2">
                    {{ __('Gebruik voucher') }}
                </x-form.secondary-button>
            </form>
        </x-content.content-card>
    </div>

    @push('javascript')
        <script type="module">
            tippy('.user-badge');
        </script>
    @endpush
</x-app-layout>
