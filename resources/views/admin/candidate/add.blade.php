@extends('admin.layouts.app')
@section('content')

<x-common.card>
    @slot('card_content')

    @component('components.common.card_title', ['title' => 'Create Employer', 'route' => 'employerListing', 'button_text' => 'Back'])
    @endcomponent

    {{ csrf_field() }}

    <x-common.messages />

    <br>

    <!-- Create Form -->
    <form action="{{ route('createEmployer') }}" method="POST" class="w-full  mx-auto">
        @csrf
        @method('POST')


        @component('components.form.input', ['label' => 'Name', 'name' => 'name', 'value' => old('name'), 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Position', 'name' => 'position', 'value' => old('position'), 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Email', 'name' => 'position', 'value' => old('email'), 'type' => 'text'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Company Name', 'name' => 'company_name', 'value' => old('company_name')])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Address', 'name' => 'address', 'value' => old('address')])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone One', 'name' => 'phone_one', 'value' => old('phone_one'), 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone Two', 'name' => 'phone_two', 'value' => old('phone_two'), 'type' => 'text'])
        @endcomponent

        @component('components.form.submit', ['value' => 'Save'])
        @endcomponent


    </form>

    @endslot
</x-common.card>
@endsection
