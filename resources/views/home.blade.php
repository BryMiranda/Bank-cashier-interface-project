@extends('layouts.app')

@section('content')
    <x-ui.header>
        Inicio
    </x-ui.header>

    <x-ui.container>
        <div class="space-y -2">
            <h1 class="text-2xl">
                Bienvenido
            </h1>
            <p class="text-gray-600 text-sm">
                Seleccione una de las opciones del menú para empezar
            </p>
        </div>
    </x-ui.container>
@endsection
