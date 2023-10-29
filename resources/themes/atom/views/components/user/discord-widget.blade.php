<x-content.content-card icon="discord-icon" classes="border dark:border-gray-900">
    <x-slot:title>
        {{ __('Discord') }}
    </x-slot:title>

    <x-slot:under-title>
        <span id="guildName"></span>
    </x-slot:under-title>

    <div class="text-sm dark:text-gray-200">
    <!-- Logo -->
    <a href="https://discord.gg/rainynight" target="_blank">
        <img src="https://rainynight.nl/assets/images/profile/jullie_logo.png" alt="RainyNight Logo"
            class="mb-2 hover:scale-105 transition duration-300 ease-in-out">
    </a>

    <!-- Discord-uitnodiging -->
    <p>{{ __('Kom bij onze Discord-server om deel te nemen aan de community:') }}</p>
    <a href="https://discord.gg/rainynight" target="_blank">
        <x-form.secondary-button classes="mt-3">
            {{ __('Word lid van onze server') }}
        </x-form.secondary-button>
    </a>
</div>

</x-content.content-card>