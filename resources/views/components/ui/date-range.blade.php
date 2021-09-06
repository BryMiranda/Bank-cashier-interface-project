<div class="flex space-x-3">
    <div class="w-full">
        <label for="from" class="block text-sm font-medium leading-5 text-gray-700">
            Desde
        </label>
        <div class="shadow-sm">
            <input id='from'
                name='from'
                type='date'
                value="{{ $from }}"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
            />
        </div>
    </div>
    <div class="w-full">
        <label for="to" class="block text-sm font-medium leading-5 text-gray-700">
            Hasta
        </label>
        <div class="shadow-sm">
            <input id='to'
                name='to'
                type='date'
                value="{{ $to }}"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
            />
        </div>
    </div>
</div>
