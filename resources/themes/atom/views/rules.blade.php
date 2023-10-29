<x-app-layout>
    @push('title', __('Regels'))

    <div class="col-span-12 flex flex-col gap-y-3">
        <div class="mb-4 w-full rounded bg-red-600 p-4 text-white">
            {{ __('Regels en voorschriften kunnen zonder aankondiging veranderen. Als lid van de :hotel community ga je akkoord met de geldende algemene voorwaarden. Het niet naleven van de regels en voorschriften zal resulteren in de nodige sancties die op je account worden toegepast. Als je vragen of opmerkingen hebt met betrekking tot The :hotel Way, aarzel dan niet om deze aan een stafflid te stellen.', ['hotel' => setting('hotel_name')]) }}
        </div>

        <div class="flex flex-col gap-y-6">
            @foreach ($categories as $category)
                <x-content.content-card icon="{{ $category->badge }}" classes="border dark:border-gray-900">
                    <x-slot:title>
                        {{ $category->name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $category->description }}
                    </x-slot:under-title>

                    <ul class="rounded bg-gray-100 p-2 dark:bg-gray-700 dark:text-gray-300">
                        @foreach ($category->rules as $rule)
                            <li><strong>{{ $rule->paragraph }}.</strong> {{ $rule->rule }}</li>
                        @endforeach
                    </ul>
                </x-content.content-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
