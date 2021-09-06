@props(['menuItem', 'isActive', 'isAuthorized'])

<div
    x-data="{ open: false }"
    @keydown.window.escape="open = false"
    @click.away="open = false"
    class="relative inline-block text-left">
    <div class="rounded-md shadow-sm">
        <button
            @click="open = !open"
            type="button"
            @if($isActive)
            class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
            @else
            class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
            @endif
            id="options-menu"
            aria-haspopup="true"
            aria-expanded="true"
            x-bind:aria-expanded="open">

            <i class="fas {{ $menuItem['icon'] }}"></i>

            <span>
                {{ $menuItem['title'] }}
            </span>

            <svg class="-mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    <div
        x-show="open"

        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"

        class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg z-200">
        <div class="rounded-md bg-white ring-1 ring-black ring-opacity-5 z-200">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                @foreach($menuItem['options'] as $menuItem)
                    @if($isAuthorized($menuItem))
                        <a
                            href="{{ $menuItem['url'] }}"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                            {{ $menuItem['title'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
