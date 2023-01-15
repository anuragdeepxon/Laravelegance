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
    <form id="form" action="{{ route('createEmployer') }}" method="POST" class="w-full  mx-auto">
        @csrf
        @method('POST')


        @component('components.form.input', ['label' => 'First Name', 'name' => 'first_name', 'value' => old('first_name'), 'type' => 'text', 'id'=> 'first_name'])
        @endcomponent

        @component('components.form.input', ['label' => 'Last Name', 'name' => 'last_name', 'value' => old('last_name'), 'type' => 'text', 'id'=> 'last_name'])
        @endcomponent

        @component('components.form.input', ['label' => 'Position', 'name' => 'position', 'value' => old('position'), 'type' => 'text', 'id'=> 'position'])
        @endcomponent

        @component('components.form.input', ['label' => 'Email', 'name' => 'email', 'value' => old('email'), 'type' => 'text', 'id'=> 'email'])
        @endcomponent

        @component('components.form.input', ['label' => 'Password', 'name' => 'password', 'value' => old('password'), 'type' => 'password', 'id' => 'password'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Company Name', 'name' => 'company_name', 'value' => old('company_name'), 'id' => 'company_name'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Address', 'name' => 'address', 'value' => old('address'), 'address' => 'address', 'id' => 'address'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone One', 'name' => 'phone_one', 'value' => old('phone_one'), 'type' => 'text', 'id'=> 'phone_one'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone Two', 'name' => 'phone_two', 'value' => old('phone_two'), 'type' => 'text', 'id'=> 'phone_two'])
        @endcomponent

        @component('components.form.submit', ['value' => 'Save'])
        @endcomponent

    </form>

    @endslot
</x-common.card>

<script src="{{ URL::asset('js/vendor/validator/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/dynamic_validator.js') }}"></script>
@endsection
