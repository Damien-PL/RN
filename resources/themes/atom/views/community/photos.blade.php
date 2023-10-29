<x-app-layout>
    @push('title', __('Foto`s'))

    <div class="col-span-12">
        <x-content.content-card icon="camera-icon">
            <x-slot:title>
                {{ __('Recente Foto`s') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Hier vind je de mooiste foto`s, gemaakt door onze spelers!') }}
            </x-slot:under-title>

            <x-photos :photos="$photos" />
        </x-content.content-card>

        {{ $photos->links() }}
    </div>

    @push('javascript')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    @endpush

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
</x-app-layout>
