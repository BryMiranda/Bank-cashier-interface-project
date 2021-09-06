@extends('layouts.app')

@section('content')
    <x-ui.header>
        Solicitudes de cheques
    </x-ui.header>

    <x-ui.container>
        <x-ui.flash />
        <div class="space-y -2">
            <h1 class="text-2xl">
                Clientes
            </h1>
            <p class="text-gray-600 text-sm">
                Seleccione un cliente con cheque registrado para validar
            </p>
        </div>

        <div class="sm:flex sm:justify-end">
            <div class="flex justify-end items-center">
                <div class="inline-flex rounded-md shadow-sm">
                    <a href="{{route('clients.create')}}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
                        <i class="fas fa-file mr-2"></i>
                        Agregar Nuevo Cliente
                    </a>
                </div>
            </div>
        </div>

        <div class="h-4"></div>

        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Correo
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($clients as $client)
                            <tr>
                                <td
                                    class="px-6 py-4 border-b border-gray-200 text-sm leading-5 font-medium text-gray-900 space-y-2">
                                    {{ $client->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $client->email }}
                                </td>                                
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-left border-b border-gray-200 text-sm leading-5 font-medium">
                                    <div class="flex justify-end items-center space-x-8">                                                                                
                                        <a href="{{ route('draft-checks.index', $client->id) }}"                                            
                                            class="text-teal-600 hover:text-teal-900 focus:outline-none focus:underline">
                                            Ver solicitudes de cheques
                                        </a>                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <x-empty-list :count="$clients->count()">
                    No existen clientes registrados
                </x-empty-list>
            </div>
        </div>
    </x-ui.container>
@endsection