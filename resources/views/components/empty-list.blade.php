@props(['count', 'withoutBackground'])
@php
    $withoutBackground = $withoutBackground ?? false;
@endphp
@if($count == 0)
    <p class="{{$withoutBackground ? '' : 'bg-white'}} p-6 text-center text-gray-500 text-xs">
        {{ $slot }}
    </p>
@endif
