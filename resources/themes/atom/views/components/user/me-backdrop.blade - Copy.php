@props(['user'])

<div class="relative flex items-center justify-between overflow-hidden rounded px-10 me-backdrop"
    style="background: rgba(0, 0, 0, 0.3) url({{ setting('cms_me_backdrop') }});">
    <div>
        <a href="{{ route('profile.show', $user) }}"
            class="absolute -bottom-12 left-0 drop-shadow transition duration-300 ease-in-out hover:scale-105">
            <img style="image-rendering: pixelated;"
                src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l"
                alt="">
        </a>
    </div>


   <div class="p-4 rounded bg-black bg-opacity-50 flex flex-col gap-3 text-white">
       <x-top-header-currency icon="nav-credit-icon">
           <x-slot:currency>
               {{ auth()->user()->credits }}
           </x-slot:currency>

           {{ __('Credits') }}
       </x-top-header-currency>

       <x-top-header-currency icon="nav-ducket-icon">
           <x-slot:currency>
               {{ auth()->user()->currency('duckets') }}
           </x-slot:currency>

           {{ __('Duckets') }}
       </x-top-header-currency>

       <x-top-header-currency icon="nav-diamond-icon">
           <x-slot:currency>
               {{ auth()->user()->currency('diamonds') }}
           </x-slot:currency>

           {{ __('Druppels') }}
       </x-top-header-currency>
   </div>
</div>