<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
    <div class="flex flex-col gap-y-4">
        @foreach ($employees as $employee)
            @if (count($employee->users) > 0) <!-- Voeg deze voorwaarde toe -->
                <x-content.staff-content-section :badge="$employee->badge" :color="$employee->staff_color">
                    <x-slot:title>
                        {{ $employee->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $employee->job_description }}
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($employee->users as $staff)
                            <x-community.staff-card :user="$staff" />
                        @endforeach
                    </div>
                </x-content.staff-content-section>
            @endif
        @endforeach

        @if (count($employees) === 0) <!-- Voeg deze voorwaarde toe voor het geval er helemaal geen personeel is -->
            <div class="text-center dark:text-gray-400">
                {{ __('Momenteel hebben wij geen staff in deze functie') }}
            </div>
        @endif
    </div>
</div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __(':hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Over het :hotel staff-team', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('Het :hotel staff-team is één grote familie. Elk staff-lid heeft een andere rol en taken te vervullen.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {{ __('Het grootste deel van ons team bestaat uit spelers die al een tijdje bekend zijn bij :hotel , maar dit betekent niet dat we alleen oude en bekende spelers aannemen, we werven degenen die voor ons uitblinken!', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-card>

        <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Solliciteren als staff') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Hoe word je staff-lid', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('Zo nu en dan kunnen er vacatures voor medewerkers vrijkomen. We zorgen er altijd voor dat we een nieuwsartikel plaatsen waarin het proces wordt uitgelegd. Houd deze dus in de gaten als je je bij het staff team wilt aansluiten van :hotel !', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {!! __(
                        'Je kan ook de :startTag Staff Vacature Pagina :endTag in de gaten houden waar alle vacatures op worden geplaatst.',
                        ['startTag' => '<a href="/community/staff-applications" class="underline">', 'endTag' => '</a>'],
                    ) !!}
                </p>
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
