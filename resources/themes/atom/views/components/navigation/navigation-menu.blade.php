<div class="relative hidden flex h-full w-full flex-col items-center gap-y-2 py-3 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0" id="mobile-menu">
    @auth
        <x-navigation.dropdown icon="home" route-group="user*">
            {{ auth()->user()->username }}

            <x-slot:children>
                <x-navigation.dropdown-child :route="route('me.show')">
                    {{ __('Home') }}
                </x-navigation.dropdown-child>

                <x-navigation.dropdown-child :route="route('profile.show', auth()->user()->username)">
                    {{ __('Mijn Profiel') }}
                </x-navigation.dropdown-child>
                
                <x-navigation.dropdown-child :route="route('settings.account.show')">
                    {{ __('Profiel Instellingen') }}
                </x-navigation.dropdown-child>
            
                <form method="POST" action="{{ route('logout') }}">
    @csrf <!-- Add the CSRF token for security -->
    <x-navigation.dropdown-child>
        <button type="submit">{{ __('Log Uit') }}</button>
    </x-navigation.dropdown-child>
</form>

            
            
            </x-slot:children>
        </x-navigation.dropdown>
    @else
        <a href="{{ route('welcome') }}"
           class="nav-item dark:text-gray-200 {{ request()->routeIs('welcome') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            <i class="mr-1 hidden navigation-icon home lg:inline-flex"></i>
            {{ __('Home') }}
        </a>
    @endauth

    <x-navigation.dropdown icon="community" route-group="community*" :uppercase="true">
        {{ __('Community') }}

        <x-slot:children>
            <x-navigation.dropdown-child :route="route('article.index')">
                {{ __('Artikelen') }}
            </x-navigation.dropdown-child>

            <x-navigation.dropdown-child :route="route('staff.index') ">
                {{ __('Staff') }}
            </x-navigation.dropdown-child>

            <x-navigation.dropdown-child :route="route('teams.index')">
                {{ __('Teams') }}
            </x-navigation.dropdown-child>

            <x-navigation.dropdown-child :route="route('staff-applications.index')">
                {{ __('Staff Vacatures') }}
            </x-navigation.dropdown-child>

        </x-slot:children>
    </x-navigation.dropdown>

    <a href="{{ route('leaderboard.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('leaderboard.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="navigation-icon leaderboards mr-1 hidden lg:inline-flex"></i>
        {{ __('Statistieken') }}
    </a>

    <a href="{{ route('values.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('values.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="navigation-icon leaderboards mr-1 hidden lg:inline-flex"></i>
        {{ __('Ruilwaarden') }}
    </a>

    <a href="{{ route('shop.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('shop.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            <i class="navigation-icon mr-1 hidden lg:inline-flex shop"></i>
            {{ __('Shop') }}
    </a>

        <x-navigation.dropdown icon="rules" route-group="help-center*" :uppercase="true">
            {{ __('Assistentie') }}

            <x-slot:children>
                <x-navigation.dropdown-child :route="route('help-center.index')">
                    {{ __('Help Centrum') }}
                </x-navigation.dropdown-child>

                @if(hasPermission('manage_website_tickets'))
                    <x-navigation.dropdown-child :route="route('help-center.ticket.index')">
                        {{ __('Open tickets') }}
                    </x-navigation.dropdown-child>
                @endif

                <x-navigation.dropdown-child :route="route('help-center.rules.index')">
                    {{ __('Regels') }}
                </x-navigation.dropdown-child>
            </x-slot:children>
        </x-navigation.dropdown>

    <a href="{{ setting('discord_invitation_link') }}" target="_blank" class="nav-item dark:text-gray-200">
        {{ __('Discord') }}
    </a>
    
    @if(hasPermission('view_server_logs') || hasPermission('housekeeping_access') || hasPermission('generate_logo'))
            <x-navigation.dropdown classes="!text-red-700 !border-none">
                {{ __('Administratie') }}

                <x-slot:children>
                    @if (hasPermission('view_server_logs'))
                        <x-navigation.dropdown-child route="/log-viewer" :turbolink="false" target="_blank">
                            {{ __('Error logs') }}
                        </x-navigation.dropdown-child>
                    @endif

                    @if(hasPermission('housekeeping_access'))
                        <a data-turbolinks="false" href="{{ setting('housekeeping_url') }}" target="_blank" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                            {{ __('Housekeeping') }}
                        </a>
                    @endif
                </x-slot:children>
            </x-navigation.dropdown>
        

@endif