<div>
    <div class="flex flex-col md:flex-row items-start mt-8">
        <div class="md:w-1/3 font-bold text-gray-700">{{ $label }}:</div>
        <textarea name="{{ $name }}" id="{{ $id }}" class="md:w-2/3 rounded-lg shadow-lg p-4 border-2 border-gray-300 focus:border-blue-500">{{ $value }}</textarea>
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
