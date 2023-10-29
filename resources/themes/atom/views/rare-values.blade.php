<x-app-layout>
    @push('title', __('Ruilwaarden'))
   

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="flex flex-col gap-y-4">
            @forelse($categories as $category)
                <x-content.content-card :icon="$category->badge">
                    <x-slot:title>
                        {{ $category->name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ __('Alle :category rares', ['category' => $category->name]) }}
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($category->furniture as $rare)
                            <x-rares.rare-card :rare="$rare" />
                        @endforeach
                    </div>
                </x-content.content-card>
            @empty
                <x-content.content-card icon="currency-icon">
                    <x-slot:title>
                        {{ __('Ruilwaarden') }}
                    </x-slot:title>

                    <x-slot:under-title>
                       {{ __('Krijg een overzicht van alle rares in :hotel', ['hotel' => setting('hotel_name')]) }}
                    </x-slot:under-title>

                   <p class="text-center">
                       {{ __('Er zijn momenteel geen rares om te laten zien') }}
                   </p>
                </x-content.content-card>
            @endforelse
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-card icon="catalog-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Zoek') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Zoek naar rares') }}
            </x-slot:under-title>

            <form action="{{ route('values.search') }}" method="POST" class="space-y-3">
                @csrf

                <x-form.input name="search" placeholder="Search for a rare"/>

                <x-form.secondary-button>
                    {{ __('Zoek') }}
                </x-form.secondary-button>
            </form>
        </x-content.content-card>

        <x-content.content-card icon="inventory-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Rare categoriën') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Selecteer hieronder een categorie') }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-2">
                <div class="rounded bg-gray-200 dark:bg-gray-700 py-2 px-4 transition duration-200 ease-in-out hover:scale-[102%]">
                    <a href="{{ route('values.index') }}" class="block text">
                        {{ __('Alle waarden') }}
                    </a>
                </div>

                @foreach($categoriesNav as $category)
                    <div class="rounded bg-gray-200 dark:bg-gray-700 py-2 px-4 transition duration-200 ease-in-out hover:scale-[102%]">
                        <a href="{{ route('values.category', $category->id) }}" class="block text">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
