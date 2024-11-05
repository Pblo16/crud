<div>
    <x-slot:sidebar drawer="main-drawer" collapsible right-mobile collapse-text="Hide it"
        class="bg-sidebar dark:text-white border-r border-r-sidebarBorder ">
        <div class="p-5 flex justify-between items-center">

            <a href="{{route('home')}}" class="btn btn-ghost text-xl" wire:navigate.hover>{{ config('app.name') }}</a>
            <x-mary-theme-toggle class="btn btn-circle btn-ghost" />
        </div>
        @auth
        <x-mary-menu class="flex flex-col flex-grow" activate-by-route>
            <div class="flex-1">
                <x-mary-menu-item title="Users" link="{{ route('users.show') }}" route=" users.show" wire:navigate.hover
                    icon="o-sparkles" link="/users" />
            </div>

            <div class="flex-1">
                <x-mary-menu-item title="Personal Data" link="{{ route('personal-data.show') }}"
                    route=" personal-data.show" wire:navigate.hover icon="o-sparkles" link="/personal-data" />
            </div>
        </x-mary-menu>

        @endauth

        @auth
        <div class="flex items-center content-center justify-between flex-wrap px-3">
            <x-dropdown align="left">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </button>
                    @else
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}

                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
        @else
        <x-mary-menu-item title="Log in" icon="o-archive-box" href="{{ route('login') }} "
            class="flex flex-wrap px-4 justify-between items-center" wire:navigate.hover />
        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            wire:navigate>Register</a>
        @endif
        @endauth
    </x-slot:sidebar>
</div>