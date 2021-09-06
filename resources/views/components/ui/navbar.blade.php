<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-blue-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <div class="flex-shrink-0">
                        <img class="h-16 w-16" src="{{ asset('/img/logo.png') }}"
                            alt="{{ config('app.name') }}" />
                    </div>
                </a>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <div class="rounded-md shadow-sm">
                            <a href=""
                                class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-blue-700 focus:outline-none focus:text-white focus:bg-blue-500">
                                Servicio al cliente
                            </a>
                        </div>
                        <div class="rounded-md shadow-sm">
                            <a href=""
                                class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-blue-700 focus:outline-none focus:text-white focus:bg-blue-500">
                                Depositos
                            </a>
                        </div>
                        <div class="rounded-md shadow-sm">
                            <a href="{{ route('clients.index') }}"
                                class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-blue-700 focus:outline-none focus:text-white focus:bg-blue-500">
                                Cheques
                            </a>
                        </div>
                        <div class="rounded-md shadow-sm">
                            <a href=""
                                class="inline-flex items-center space-x-2 leading-5 justify-center px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-blue-700 focus:outline-none focus:text-white focus:bg-blue-500">
                                Administración
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
