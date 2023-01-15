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
    <form action="{{ route('updateEmployer', $data->id) }}" method="POST" class="w-full  mx-auto">

        @csrf
        @method('POST')

        @component('components.form.input', ['label' => 'Name', 'name' => 'name', 'value' => $data->name, 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Position', 'name' => 'position', 'value' => $data->employer->position, 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Email', 'name' => 'position', 'value' => $data->email, 'type' => 'text'])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Company Name', 'name' => 'company_name', 'value' => $data->employer->company_name])
        @endcomponent

        @component('components.form.textarea', ['label' => 'Address', 'name' => 'address', 'value' => $data->employer->address])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone One', 'name' => 'phone_one', 'value' => $data->employer->phone_one, 'type' => 'text'])
        @endcomponent

        @component('components.form.input', ['label' => 'Phone Two', 'name' => 'phone_two', 'value' => $data->employer->phone_two, 'type' => 'text'])
        @endcomponent

        @component('components.form.submit', ['value' => 'Update'])
        @endcomponent

    </form>

    @endslot
</x-common.card>
@endsection
