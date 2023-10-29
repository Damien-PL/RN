<x-app-layout>
    @push('title', __('Verbannen'))
    <div class="col-span-12 flex justify-center">
        <div class="space-y-4 lg:w-1/2">
            <div class="w-full rounded-md bg-red-500 p-2 text-center text-white">
                {{ __('Zo te zien ben je verbannen van :hotel', ['hotel' => setting('hotel_name')]) }}
            </div>

            <div class="rounded-md p-2 shadow">
                <div class="flex justify-between">
                    <div class="flex flex-col px-1">
                        <div class="max-w-[380px]">
                            <p>
                                <strong>{{ __('Ban type:') }}</strong> {{ $ban->type }}
                            </p>

                            <p>
                                <strong>{{ __('Reden van ban:') }}</strong> {{ $ban->ban_reason }}
                            </p>

                            <p>
                                <strong>{{ __('Je bent weer welkom over:') }}</strong> {{ date('Y/m/d', $ban->ban_expire) }}
                            </p>
                        </div>

                        <div class="mt-4 max-w-[380px]">
                            <p class="mb-4">
                                {{ __('Als je deze verbanning niet terecht vindt of denkt dat het een fout is, neem dan contact met ons op via onze helpdesk!') }}
                            </p>

                            <a href="{{ setting('discord_invitation_link') }}" target="_blank">
                                <x-form.primary-button>
                                    {{ __('Join discord') }}
                                </x-form.primary-button>
                            </a>
                        </div>
                    </div>

                    <div class="mr-8 hidden items-center lg:flex">
                        <img src="{{ asset('assets/images/angry_frank.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
