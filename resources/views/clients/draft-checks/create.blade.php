@extends('layouts.app')

@section('content')
    <x-ui.header>
        Ingresar solicitud de cheque
    </x-ui.header>

    <x-ui.container>
        <form action="{{route('draft-checks.store', [$client])}}" method="post" enctype="multipart/form-data">
            @csrf            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                <div>
                    <label for="check_number" class="block text-sm font-medium leading-5 text-gray-700">
                        Número de cheque
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input
                            id="check_number"
                            value="{{old('check_number')}}"
                            placeholder="Número de cheque"
                            name="check_number" type="text"
                            class="p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    </div>
                    @include('partials.error', ['type' => 'check_number'])
                </div>

                <div>
                    <label for="document" class="block text-sm font-medium leading-5 text-gray-700">
                        Foto cheque
                    </label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input
                            id="document"
                            name="file"
                            class="block w-full px-3 py-2 bg-white border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                            style="padding: 0.35rem 0.5rem;"
                            type="file">
                    </div>
                    @include('partials.error', ['type' => 'file'])
                </div>
            </div>

            <div class="h-8"></div>

            <div class="pt-5 border-t border-gray-200">
                <div class="flex justify-end">
                    <div class="inline-flex rounded-md shadow-sm">
                        <a href="{{route('draft-checks.index', [$client->id])}}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                    <div class="inline-flex ml-3 rounded-md shadow-sm">
                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-ui.container>
@endsection
