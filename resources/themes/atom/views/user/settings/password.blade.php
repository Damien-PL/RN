<x-app-layout>
    @push('title', __('Wachtwoord instellingen'))

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-9">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Wachtwoord instellingen') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Verander je wachtwoord door onderstaande velden in te vullen') }}
            </x-slot:under-title>

            <form action="{{ route('settings.password.update') }}" method="POST" class="flex flex-col gap-y-4">
                @method('PUT')
                @csrf

                <div class="flex flex-col gap-y-1">
                    <x-form.label for="current_password">
                        {{ __('Huidig wachtwoord') }}

                        <x-slot:info>
                            {{ __('Voer je huidige wachtwoord in') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="current_password" type="password" :autofocus="true" />
                </div>

                <div class="flex flex-col gap-y-1">
                    <x-form.label for="password">
                        {{ __('Nieuw wachtwoord') }}

                        <x-slot:info>
                            {{ __('Voer een veilig nieuw wachtwoord in.') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="password" type="password" />
                </div>

                <div class="flex flex-col gap-y-1">
                    <x-form.label for="password_confirmation">
                        {{ __('Bevestig nieuw wachtwoord') }}

                        <x-slot:info>
                            {{ __('Bevestig je nieuwe wachtwoord') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="password_confirmation" type="password" />
                </div>

                <div class="flex w-full justify-start md:justify-end">
                    <x-form.secondary-button classes="lg:w-1/4">
                        {{ __('Wachtwoord opslaan') }}
                    </x-form.secondary-button>
                </div>
            </form>
        </x-content.content-card>
    </div>
</x-app-layout>
