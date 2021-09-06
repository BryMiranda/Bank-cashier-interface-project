@extends('layouts.app')

@section('content')
    <x-ui.header>
        Verificar valides de cheque
    </x-ui.header>

    <x-ui.container>
        <form action="{{ route('draft-checks.update', [$client, $draftCheck]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                <div>
                    <label for="CI" class="block text-sm font-medium leading-5 text-gray-700">
                        Foto Cédula
                    </label>
                    <a href="{{ $client->images()->first()->getFullUrl() }}" target="_blank">
                        <img alt="{{ $client->name }}" class="object-cover w-full h-96 rounded shadow"
                            src="{{ $client->images()->first()->getFullUrl('thumbnail') }}" />
                    </a>
                </div>

                <div>
                    <label for="check" class="block text-sm font-medium leading-5 text-gray-700">
                        Foto Cheque
                    </label>
                    <a href="{{ $draftCheck->images()->first()->getFullUrl() }}" target="_blank">
                        <img alt="{{ $draftCheck->check_number }}" class="object-cover w-full h-96 rounded shadow"
                            src="{{ $draftCheck->images()->first()->getFullUrl('thumbnail') }}" />
                    </a>
                </div>
                <div class="sm:col-span-1">
                    <label for="observation" class="block text-sm font-medium leading-5 text-gray-700">
                        Observaciones
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea id="observation" rows="5" name="observation" placeholder="Observaciones"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">{{ old('observation') }}</textarea>
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="observation" class="block text-sm font-medium leading-5 text-gray-700">
                        Verificación
                    </label>
                    <input type="radio" name="status" id="YES" value=1>
                    <label for="YES">Aceptar</label><br>
                    <input type="radio" name="status" id="NO" value=0>
                    <label for="NO">Rechazar</label><br>
                </div>

            </div>

            <div class="h-8"></div>

            <div class="pt-5 border-t border-gray-200">
                <div class="flex justify-end">
                    <div class="inline-flex rounded-md shadow-sm">
                        <a href="{{ route('draft-checks.index', [$client->id]) }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                    <div class="inline-flex ml-3 rounded-md shadow-sm">
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-ui.container>
@endsection
