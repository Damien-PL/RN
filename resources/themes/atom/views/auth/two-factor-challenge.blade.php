<x-app-layout>
    @push('title', __('Twee-stapsverificatie'))

    <div class="col-span-12 lg:px-[250px] flex flex-col gap-y-3">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Twee-stapsverificatie') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Voer de 2FA-code in die je hebt gekregen van de authenticator-app op je mobiele telefoon.') }}
            </x-slot:under-title>

            <form action="/two-factor-challenge" method="POST">
                @csrf

                <div id="twoFactorCode">
                    <x-form.label for="code">
                        {{ __('Code') }}

                        <x-slot:info>
                            {{ __('Vul de code in uit je app.') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="code" placeholder="{{ __('Code') }}" :autofocus="true" />
                    <small onclick="toggleRecoveryCodeField()"
                        class="italic text-gray-600 hover:cursor-pointer hover:underline">{{ __('Geen toegang meer tot je 2FA-codes? Klik hier om een recovery code te gebruiken') }}</small>
                </div>

                <div id="recoveryCode">
                    <x-form.label for="recovery_code">
                        {{ __('Recovery code') }}

                        <x-slot:info>
                            {{ __('Als je geen toegang hebt tot je 2FA-code, kunt je een van je recovery codes gebruiken.') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="recovery_code" :required="false" placeholder="{{ __('Recovery code') }}" />
                    <small onclick="toggleRecoveryCodeField()"
                        class="italic text-gray-600 hover:cursor-pointer hover:underline">{{ __('Heb je weer toegang tot je 2FA-codes? Klik hier om uw authenticator-app te gebruiken') }}</small>
                </div>

                <div class="flex justify-end">
                    <x-form.secondary-button classes="md:w-1/4 mt-4">
                        {{ __('Bevestig 2FA') }}
                    </x-form.secondary-button>
                </div>
            </form>
        </x-content.content-card>
    </div>

    @push('javascript')
        <script>
            document.querySelector('#recoveryCode').style.display = 'none';
            let showRecoveryCodeField = false;

            function toggleRecoveryCodeField() {
                if (!showRecoveryCodeField) {
                    document.querySelector('#twoFactorCode').style.display = 'none';
                    document.querySelector('#recoveryCode').style.display = 'block';

                    showRecoveryCodeField = true;

                    return;
                }

                document.querySelector('#twoFactorCode').style.display = 'block';
                document.querySelector('#recoveryCode').style.display = 'none';

                showRecoveryCodeField = false;
            }
        </script>
    @endpush
</x-app-layout>
