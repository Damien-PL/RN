<x-app-layout>
    @push('title', __('Welkom bij het leukste hotel op het internet!'))

    <div class="col-span-12 space-y-14">
        <div class="col-span-12">
            <x-content.guest-content-card icon="hotel-icon">
                <x-slot:title>
                    {{ __('Laatste Nieuws') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Blijf up-to-date over de laatste roddels.') }}
                </x-slot:under-title>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @forelse($articles as $article)
                        <x-article-card :article="$article" />
                    @empty
                        <x-filler-article-card />
                    @endforelse
                </div>
            </x-content.guest-content-card>
        </div>

        

    @push('javascript')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    @endpush

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
</x-app-layout>
