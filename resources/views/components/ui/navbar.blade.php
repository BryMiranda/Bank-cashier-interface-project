<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    {{-- <div class="flex-shrink-0">
                        <img class="h-8 w-8"
                             src="{{ asset('/img/logo.png') }}"
                             alt="{{ config('app.name') }}" />
                    </div> --}}
                </a>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- @foreach($menuItems as $menuItem)
                            @if($isAuthorized($menuItem))
                                <x-ui.menu-item-with-dropdown
                                    :menuItem="$menuItem"
                                    :isActive="$isActive($menuItem)"
                                    :isAuthorized="$isAuthorized"
                                />
                            @endif
                        @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                {{-- <div class="ml-4 flex items-center md:ml-6">
                    <a
                        href="{{ route('notifications.index') }}"
                        @if($user->unreadNotifications->isNotEmpty())
                        class="px-2 py-1 flex items-center space-x-2 border-2 border-transparent rounded-full text-red-400 hover:text-white focus:text-red focus:bg-gray-700"
                        @else
                        class="px-2 py-1 flex items-center space-x-2 border-2 border-transparent rounded-full text-gray-400 hover:text-white focus:text-white focus:bg-gray-700"
                        @endif
                    >
                        <span class="font-medium">
                            {{ $user->unreadNotifications->count() }}
                        </span>

                        <i class="fas fa-bell text-lg"></i>
                    </a>
                    <!-- Profile dropdown -->
                    <div @click.away="open = false" class="z-10 ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                <img class="h-8 w-8 rounded-full"
                                     src="{{ $user->present()->avatarUrl() }}"
                                     alt="{{ $user->present()->name() }}">
                            </button>
                        </div>
                        <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" style="display: none;">
                            <div class="py-1 rounded-md bg-white ring-1 ring-black ring-opacity-5">
                                <a href="https://forms.clickup.com/f/2wmy5-535/H6PLKQSW5RB8PHXCER"
                                   target="_blank"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Reportar Errores
                                </a>
                                <a href="https://doc.clickup.com/d/h/2wmy5-528/713220ff1f25eef/2wmy5-227"
                                   target="_blank"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Ver Cambios y Mejoras
                                </a>
                                <a href="{{ route('users.me.profile.edit') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Mi Perfil
                                </a>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="text-left w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150" role="menuitem">Salir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open" aria-label="Main menu">
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Open" x-state:off="closed" :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 sm:px-3">
            {{-- @foreach($menuItems as $menuItem)
                @if($isAuthorized($menuItem))
                    <div>
                        <a class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                            {{ $menuItem['title'] }}
                        </a>
                        <div>
                            @foreach($menuItem['options'] as $menuItem)
                                @if($isAuthorized($menuItem))
                                    <a
                                        href="{{ $menuItem['url'] }}"
                                        @if($menuItem['isActive'])
                                        class="ml-4 block px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
                                        @else
                                        class="ml-4 block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                                        @endif
                                    >
                                        {{ $menuItem['title'] }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach --}}
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            {{-- <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="{{ $user->present()->avatarUrl() }}"
                         alt="{{ $user->present()->name() }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">
                        {{ $user->present()->name() }}
                    </div>
                    <div class="mt-1 text-sm font-medium leading-none text-gray-400">
                        {{ $user->present()->email() }}
                    </div>
                </div>
            </div> --}}
            {{-- <div class="mt-3 px-2 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="{{ route('notifications.index') }}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-600 focus:outline-none focus:text-white focus:bg-gray-600">
                    @if($user->unreadNotifications->isNotEmpty())
                        <span class="text-red-400">
                            {{ $user->unreadNotifications->count() }} Notificaciones
                        </span>
                    @else
                        Notificaciones
                    @endif
                </a>
                <a href="{{ route('users.me.profile.edit') }}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-600 focus:outline-none focus:text-white focus:bg-gray-600">
                    Mi Perfil
                </a>
                <form action="{{route('logout')}}"
                      method="post">
                    @csrf
                    <a class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-600 focus:outline-none focus:text-white focus:bg-gray-600">
                        <button type="submit">
                            Salir
                        </button>
                    </a>
                </form>
            </div> --}}
        </div>
    </div>
</nav>
