<form {{$attributes}} method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">

        <div>
            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                Nombre
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="name"
                    placeholder="Nombre"
                    name="name"
                    type="text"
                    value="{{old('name', $user->name)}}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
            @include('partials.error', ['type' => 'name'])
        </div>

        <div>
            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                Correo electrónico
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="email"
                    placeholder="Correo electrónico"
                    name="email"
                    type="text"
                    value="{{old('email', $user->email)}}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
            @include('partials.error', ['type' => 'email'])
        </div>

        <div>
            <label for="avatar" class="block text-sm font-medium leading-5 text-gray-700">
                Avatar
            </label>
            <div class="flex items-center mt-1 space-x-3">
                <img class="w-10 h-10 border border-white rounded-full shadow" src="{{ $user->present()->avatarUrl() }}"/>
                <div class="w-full rounded-md shadow-sm">
                    <input
                        id="avatar"
                        placeholder="Avatar"
                        name="avatar"
                        type="file"
                        class="block w-full px-4 py-2 bg-white border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>
            </div>
            @include('partials.error', ['type' => 'email'])
        </div>

        <div>
            <label for="branch_id" class="block text-sm font-medium leading-5 text-gray-700">
                Sucursal
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <select name="branch_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    <option value="">Escoja una Sucursal</option>
                    @foreach (App\Branch::all() as $branch)
                        <option
                            @selected(old('branch_id', $user->branch_id) == $branch->id)
                            value="{{$branch->id}}">
                            {{$branch->present()->name()}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                Contraseña
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="password"
                    placeholder="Contraseña"
                    name="password"
                    type="password"
                    value="{{old('password')}}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
            @include('partials.error', ['type' => 'password'])
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                Confirmar contraseña
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input
                    id="password_confirmation"
                    placeholder="Confirmar contraseña"
                    name="password_confirmation"
                    type="password"
                    value="{{old('password_confirmation')}}"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
            </div>
        </div>

    </div>

    <div class="h-8"></div>

    <div class="pt-5 border-t border-gray-200">
        <div class="flex justify-end">
            <div class="inline-flex rounded-md shadow-sm">
                <a href="{{route('users.index')}}"
                   class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                    Cancelar
                </a>
            </div>
            <div class="inline-flex ml-3 rounded-md shadow-sm">
                <button
                    wire:model='submit'
                    type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-md hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700">
                    Guardar
                </button>
            </div>
        </div>
    </div>

</form>
