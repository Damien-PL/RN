<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <x-content.staff-content-section :badge="$position->permission->badge" :color="$position->permission->staff_color">
            <x-slot:title>
                {{ __('Je solliciteert voor de functie :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Vul alle velden in om te solliciteren voor de fucntie :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:under-title>

            <form class="flex flex-col gap-y-3" action="{{ route('staff-applications.store', $position) }}" method="POST">
                @csrf

                <div>
                    <x-form.label for="username" disabled>
                        {{ __('Gebruikersnaam') }}
                    </x-form.label>

                    <x-form.input classes="bg-red-200" name="username" value="{{ auth()->user()->username }}"
                        :readonly="true" />
                </div>

                <div>
                    <x-form.label for="username" disabled>
                        {{ __('Over Jou') }}
                    </x-form.label>

                    <textarea name="content"
                        class="focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full min-h-[180px]"></textarea>
                </div>

                @if (setting('google_recaptcha_enabled'))
                    <div class="g-recaptcha" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                @endif

                <x-form.primary-button>
                    {{ __('Solliciteer voor :position', ['position' => $position->permission->rank_name]) }}
                </x-form.primary-button>
            </form>
        </x-content.staff-content-section>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Solliciteren voor :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Lees voor solliciteren') }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('Vul alsjeblieft alle velden in om te solliciteren voor :position. Onthoud dat wanneer je solliciteert bij :hotel er wordt verwacht dat je eerlijk en betrouwbaar bent. Als blijkt dat de opgegeven informatie onjuist is riskeer je het verliezen van je functie in het hotel.', ['position' => $position->permission->rank_name, 'hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
