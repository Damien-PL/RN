<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
            @forelse($positions as $position)
                <x-content.staff-content-section :badge="$position->permission->badge" :color="$position->permission->staff_color">
                    <x-slot:title>
                        {{ $position->permission->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $position->permission->job_description }}
                    </x-slot:under-title>

                    <div class="text-center dark:text-gray-400">
                        <div class="mb-4 text-sm">
                            {!! $position->description !!}
                        </div>
                    </div>

                    <div class="flex justify-between">
                        @if (auth()->user()->hasAppliedForPosition($position->permission->id))
                            <x-form.danger-button>
                                {{ __('Je hebt al gesolliciteert als :position', ['position' => $position->permission->rank_name]) }}
                            </x-form.danger-button>
                        @else
                            <a href="{{ route('staff-applications.show', $position) }}" class="w-full">
                                <x-form.secondary-button>
                                    {{ __('Solliciteer als :position', ['position' => $position->permission->rank_name]) }}
                                </x-form.secondary-button>
                            </a>
                        @endif
                    </div>
                </x-content.staff-content-section>
            @empty
                <x-content.content-card icon="lighthouse-icon" classes="border dark:border-gray-900 col-span-full">
                    <x-slot:title>
                        {{ __('Geen vacatures') }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ __('We zijn op dit moment niet opzoek naar nieuwe collegas') }}
                    </x-slot:under-title>

                    <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                        <p>
                            {{ __('Kom op een later moment terug om te kijken of er nieuwe vacatures zijn. Bedankt voor je interesse!', ['hotel' => setting('hotel_name')]) }}
                        </p>
                    </div>
                </x-content.content-card>
            @endforelse
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Solliciteer als :hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Selecteer een functie om te beginnen', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('Bij :hotel hebben we zo nu en dan vacatures open. Sometimes you will find this page empty other times it might be filled with positions, if you ever come across a position you feel you would fit perfectly into, then do not hesitate to apply for it.', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
