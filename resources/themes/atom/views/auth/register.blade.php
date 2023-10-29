<x-app-layout>
    @push('title', __('Account aanmaken'))

    <div class="col-span-12">
        <x-content.content-card icon="hotel-icon" classes="flex flex-col gap-y-8">
            <x-slot:title>
                {{ __('Registreer nu je account!') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Registreer een gratis account en wordt lid van Rainynight!') }}
            </x-slot:under-title>

            <div class="flex w-full justify-between">
                <div class="w-full !lg:w-[420px]">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <div class="flex flex-col gap-y-2">
                                <x-form.label for="username">
                                    {{ __('Gebruikersnaam') }}

                                    <x-slot:info>
                                        {{ __('Je gebruikersnaam heb je nodig om in te loggen op :hotel. Dit is ook de naam die zichtbaar is voor andere spelers, dus kies een die je leuk vindt!', ['hotel' => setting('hotel_name')]) }}
                                    </x-slot:info>
                                </x-form.label>
                            </div>

                            <x-form.input error-bag="register" name="username" type="text"
                                          value="{{ old('username') }}" placeholder="{{ __('Username') }}"
                                          :autofocus="true"/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <div class="flex flex-col gap-y-2">
                                <x-form.label for="mail">
                                    {{ __('E-mail') }}

                                    <x-slot:info>
                                        {{ __('Je e-mailadres heb je nodig wanneer je ooit je wachtwoord vergeet. Gebruik daarom een bestaand e-mailadres.') }}
                                    </x-slot:info>
                                </x-form.label>
                            </div>

                            <x-form.input error-bag="register" name="mail" type="email"
                                          value="{{ old('mail') }}" placeholder="{{ __('Enter your email') }}"/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4 bg-[#efefef] rounded-md p-3 flex flex-col gap-y-6 dark:bg-gray-900">
                            <div>
                                <x-form.label for="password">
                                    {{ __('Wachtwoord') }}

                                    <x-slot:info>
                                        {{ __('Je wachtwoord moet 8 tekens lang zijn. Gebruik een uniek wachtwoord dat moeilijk te raden is.') }}
                                    </x-slot:info>
                                </x-form.label>

                                <x-form.input error-bag="register" name="password" type="password"
                                              placeholder="{{ __('Choose a secure password') }}"/>
                            </div>
                            <hr class="dark:border-gray-700">

                            <!-- Confirm Password -->
                            <div>
                                <x-form.label for="password_confirmation">
                                    {{ __('Herhaal Wachtwoord') }}
                                </x-form.label>

                                <x-form.input error-bag="register" name="password_confirmation" type="password"
                                              placeholder="{{ __('Repeat your chosen password') }}"/>
                            </div>
                        </div>

                        @if (setting('requires_beta_code'))
                            <div class="mt-4">
                                <div class="flex flex-col gap-y-2">
                                    <x-form.label for="mail">
                                        {{ __('Beta code') }}

                                        <x-slot:info>
                                            {{ __('Enter the beta code you have been provided with') }}
                                        </x-slot:info>
                                    </x-form.label>
                                </div>

                                <x-form.input error-bag="register" name="beta_code" type="text"
                                              value="{{ old('beta_code') }}"
                                              placeholder="{{ __('Enter your beta code') }}"/>
                            </div>
                        @endif

                        <div class="mt-4 bg-[#efefef] rounded-md p-3 flex flex-col gap-y-1 dark:bg-gray-900">
                            <div class="flex items-center gap-x-3">
                                <input id="terms" type="checkbox" name="terms"
                                       class="mt-1 rounded ring-0 focus:ring-0">

                                <a href="{{ route('help-center.rules.index') }}" target="_blank"
                                   class="mt-1 text-sm font-semibold text-gray-700 hover:text-gray-900 hover:underline dark:hover:text-gray-300 dark:text-gray-500">
                                    {{ __('Ik accepteer de algemene voorwaarden en regels van :hotel en beloof mij hier aan te houden.', ['hotel' => setting('hotel_name')]) }}
                                </a>
                            </div>

                            @error('terms')
                            <p class="mt-1 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Used to determine the refer --}}
                        <input type="hidden" name="referral_code" value="{{ $referral_code }}">

                        @if (setting('google_recaptcha_enabled'))
                            <div class="mt-4 g-recaptcha"
                                 data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                        @endif

                        <div class="mt-4">
                            <x-form.primary-button>
                                {{ __('Registreer Gebruiker') }}
                            </x-form.primary-button>
                        </div>
                    </form>
                </div>

                <div class="hidden md:block relative w-full">
                    <img class="opacity-50 absolute -right-3 -bottom-3" src="{{ asset('/assets/images/hotel.png') }}"
                         alt="">
                </div>
            </div>
        </x-content.content-card>
    </div>

    @if (setting('google_recaptcha_enabled'))
        @push('javascript')
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endpush
    @endif
</x-app-layout>
