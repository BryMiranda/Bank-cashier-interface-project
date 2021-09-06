@props(['client'])
<form {{$attributes}} method="post">
    @csrf
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                Nombre
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="name" placeholder="Nombres del cliente" name="name" type="text" value="{{old('name', $client->name)}}"
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
            @include('partials.error', ['type' => 'name'])
        </div>

        <div class="sm:col-span-3">
            <label for="identification_number" class="block text-sm font-medium leading-5 text-gray-700">
                #Identificación
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="identification_number" name="identification_number" type="text" placeholder="Cédula o RUC"
                       value="{{old('identification_number', $client->identification_number)}}"
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
            @include('partials.error', ['type' => 'identification_number'])
        </div>

        <div class="sm:col-span-3">
            <label for="code"
                   class="block text-sm font-medium leading-5 text-gray-700">
                Código
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="code"
                    name="code"
                    type="text"
                    placeholder="Código"
                    value="{{ old('code', $client->code) }}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                />
            </div>
            @include('partials.error', ['type' => 'code'])
        </div>

        <div class="sm:col-span-3">
            <label for="address"
                   class="block text-sm font-medium leading-5 text-gray-700">
                Dirección
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="address"
                    name="address"
                    type="text"
                    placeholder="Dirección"
                    value="{{ old('address', $client->address) }}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                />
            </div>
            @include('partials.error', ['type' => 'address'])
        </div>
    </div>

    <div class="h-8"></div>

    <div class="border-t border-gray-200 pt-5">
        <div class="flex justify-end">
            <div class="inline-flex rounded-md shadow-sm">
                <a href="{{route('clients.index')}}"
                   class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Cancelar

                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow-sm">
                <button type="submit"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
                    Guardar
                </button>
            </div>
        </div>
    </div>

</form>
