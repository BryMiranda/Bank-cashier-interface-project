@props(['paginator', 'appends'])
<div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
    <div class="hidden sm:block">
        <p class="text-xs leading-5 text-gray-700">
            <span class="font-medium">{{ $paginator->total() }}</span>
            @if($paginator->total() > 1)
                registros encontrados.
            @else
                registro encontrado.
            @endif
            Página
            <span class="font-medium">{{ $paginator->currentPage() }}</span>
            de
            <span class="font-medium">{{ $paginator->lastPage() }}</span>.
        </p>
    </div>
    <div class="flex justify-between flex-1 sm:justify-end">
        @if(!$paginator->onFirstPage())
            <a href="{{ $paginator->appends(request($appends))->previousPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                Anterior
            </a>
        @else
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-400 bg-white border border-gray-300 rounded-md">
                Anterior
            </a>
        @endif

        @if($paginator->hasMorePages())
            <a href="{{ $paginator->appends(request($appends))->nextPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                Siguiente
            </a>
        @else
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-400 bg-white border border-gray-300 rounded-md">
                Siguiente
            </a>
        @endif
    </div>
</div>
