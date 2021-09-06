@extends('layouts.app')

@section('content')
    <x-ui.header>
        Nuevo Cliente
    </x-ui.header>

    <x-ui.container>
        <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Nombre Cliente *
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input
                            id="name"
                            value="{{old('name')}}"
                            placeholder="Nombre Cliente"
                            name="name" type="text"
                            class="p-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    </div>
                    @include('partials.error', ['type' => 'name'])
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Correo *
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input
                            id="email"
                            value="{{old('email')}}"
                            placeholder="Correo"
                            name="email" type="text"
                            class="p-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    </div>
                    @include('partials.error', ['type' => 'email'])
                </div>

                <div>
                    <label for="document" class="block text-sm font-medium leading-5 text-gray-700">
                        Cédula * (Formato imagen)
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
                        <a href="{{route('clients.index')}}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                    <div class="inline-flex ml-3 rounded-md shadow-sm">
                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-ui.container>
@endsection
