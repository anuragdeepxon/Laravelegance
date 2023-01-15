<div>
    <div class="flex flex-col md:flex-row items-start mt-8">
        <div class="md:w-1/3 font-bold text-gray-700">{{ $label }}:</div>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" class="md:w-2/3 rounded-lg shadow-lg p-2 border-2 border-gray-300 focus:border-blue-500">

    </div>

    <div class="flex flex-col md:flex-row items-end">
        @error($name)
        <div class="text-red-500 text-xs italic ml-2 md:ml-0 w-full text-right">
            <label>{{ $message }}</label>
        </div>
        @enderror

        <div class="text-red-500 text-xs italic ml-2 md:ml-0 w-full text-right">
            <label id="{{ $name }}-error" class="error" for="{{ $name }}"></label>
        </div>
    </div>
</div>
