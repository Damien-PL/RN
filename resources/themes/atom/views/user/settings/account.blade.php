<x-app-layout>
    @push('title', __('Accountinstellingen'))

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-9">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Accountinstellingen') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Accountinstellingen beheren') }}
            </x-slot:under-title>

            <form action="{{ route('settings.account.update') }}" method="POST" class="flex flex-col gap-y-4">
                @method('PUT')
                @csrf

                <div class="flex flex-col gap-y-1">
                    <x-form.label for="mail">
                        {{ __('E-mail') }}

                        <x-slot:info>
                            {{ __('Gebruik een bestaand e-mailadres. Als je ooit je wachtwoord vergeet, heb je deze nodig.') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="mail" type="email" value="{{ $user->mail }}" :autofocus="true" />
                </div>

                @if ($user->settings?->allow_name_change)
                    <div class="flex flex-col gap-y-1">
                        <x-form.label for="username">
                            {{ __('Gebruikersnaam') }}

                            <x-slot:info>
                                {{ __('Je gebruikersnaam wordt de naam van je Rainy') }}
                            </x-slot:info>
                        </x-form.label>

                        <x-form.input name="username" value="{{ $user->username }}" />
                    </div>
                @endif

                <div class="flex flex-col gap-y-1">
                    <x-form.label for="motto">
                        {{ __('Motto') }}

                        <x-slot:info>
                            {{ __('Fleur je profiel op met een leuk motto') }}
                        </x-slot:info>
                    </x-form.label>

                    <x-form.input name="motto" value="{{ $user->motto }}" />
                </div>

                <div class="flex w-full justify-start md:justify-end">
                    <x-form.secondary-button classes="lg:w-1/4">
                        {{ __('Instellingen opslaan') }}
                    </x-form.secondary-button>
                </div>
            </form>
        </x-content.content-card>
    </div>
</x-app-layout>
