@extends('admin.layouts.app')
@section('content')

<x-common.card>
    @slot('card_content')

    @component('components.common.card_title', ['title' => 'Editing Employer', 'route' => 'employerListing', 'button_text' => 'Back'])
    @endcomponent

    {{ csrf_field() }}

    <x-common.messages />
    <br>

    <!-- Edit Form -->
    <form id="form" action="{{ route('updateEmployer', $data->id) }}" method="POST" class="w-full  mx-auto">

        @csrf
        @method('POST')

        @component('components.form.input', ['label' => 'First Name', 'name' => 'first_name', 'value' => $data->first_name, 'type' => 'text', 'id'=> 'first_name'])
        @endcomponent

        @component('components.form.input', ['label' => 'Last Name', 'name' => 'last_name', 'value' => $data->last_name, 'type' => 'text', 'id'=> 'last_name'])
        @endcomponent

        @component('components.form.input', ['label' => 'Position', 'name' => 'position', 'value' => $data->employer->position, 'type' => 'text', 'id'=> 'position'])
        @endcomponent

        @component('components.form.input', ['label' => 'Email', 'name' => 'email', 'value' => $data->email, 'type' => 'text', 'id'=> 'email'])
        @endcomponent

        @component('components.form.input', ['label' => 'Password', 'name' => 'password', 'value' => old('password'), 'type' => 'password', 'id'=> 'password'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Company Name', 'name' => 'company_name', 'value' => $data->employer->company_name, 'id'=> 'company_name'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Address', 'name' => 'address', 'value' => $data->employer->address, 'id'=> 'address'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone One', 'name' => 'phone_one', 'value' => $data->employer->phone_one, 'type' => 'text', 'id'=> 'phone_one'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone Two', 'name' => 'phone_two', 'value' => $data->employer->phone_two, 'type' => 'text', 'id'=> 'phone_two'])
        @endcomponent

        @component('components.form.submit', ['value' => 'Update'])
        @endcomponent

    </form>


    @endslot
</x-common.card>

<script src="{{ URL::asset('js/vendor/validator/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/dynamic_validator.js') }}"></script>
<script>
    $("#form").validate({
        ignore: ":input[name=password]",
    });
</script>
@endsection
