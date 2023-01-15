<div>
    @if ($message = Session::get('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mt-4">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mt-4">
        {{ Session::get('error') }}
    </div>
    @endif
</div>
