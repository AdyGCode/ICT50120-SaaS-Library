<nav x-data="{ open: false }" class="bg-stone-700 text-stone-300 border-b border-stone-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-red-400"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-stone-300">
                        {{ __('Home') }}
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center
                            text-sm font-medium text-stone-400
                            hover:text-stone-700 hover:border-stone-100
                            focus:outline-none focus:text-stone-100 focus:border-stone-300
                            transition duration-150 ease-in-out">
                            <div class="ml-1>">{{ __('Account') }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <p>
                            <!-- Authentication -->
                            <a href="{{ route('login') }}"
                               class="ml-4 text-sm text-stone-700 dark:text-stone-500 underline">
                                {{ __("Log-in") }}
                            </a>
                        </p>
                        @if (Route::has('register'))
                            <p>
                                <a href="{{ route('register') }}"
                                   class="ml-4 text-sm text-stone-700 dark:text-stone-500 underline">
                                    {{ __("Register") }}
                                </a>
                            </p>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-stone-400 hover:text-stone-500 hover:bg-stone-100 focus:outline-none focus:bg-stone-100 focus:text-stone-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Authors') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Books') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Publishers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                {{ __('Users') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-stone-200 bg-stone-200">
            <div class="px-4">
                <p>
                    <a href="{{ route('login') }}"
                       class="text-sm text-stone-700 dark:text-stone-500 underline">
                        {{__("Log-in")}}</a>
                </p>
                @if (Route::has('register'))
                    <p>
                        <a href="{{ route('register') }}"
                           class="text-sm text-stone-700 dark:text-stone-500 underline">
                            {{__("Register")}}
                        </a>
                    </p>
                @endif
            </div>

        </div>
    </div>
</nav>
