@extends('admin.layouts.app')
@section('content')

<x-common.card>
    @slot('card_content')

    @component('components.common.card_title', ['title' => 'Viewing Employer', 'route' => 'employerListing', 'button_text' => 'Back'])
    @endcomponent

    {{ csrf_field() }}

    <x-common.messages />

    <br>

    <div class=" p-6">

        <div class="items-start p-6">
            <img src="https://picsum.photos/200?random=2" alt="Profile picture" class="w-32 h-32 rounded-full mb-4 shadow-xl">
            <h1 class="text-2xl font-bold mb-2">{{ $data->fullName  }}</h1>
            <p class="text-gray-700 mb-4">{{ $data->employer->position }}</p>
        </div>

        <div class="flex flex-wrap -mx-4 mb-6 mt-5 p-6 bg-zinc-100">

            <div class="w-1/2 px-4 mb-6">
                <div class="text-gray-700 font-bold mb-2">Email:</div>
                <div class="text-gray-500">{{ $data->email }}</div>
            </div>
            <div class="w-1/2 px-4 mb-6">
                <div class="text-gray-700 font-bold mb-2">Company Name:</div>
                <div class="text-gray-500">{{ $data->employer->company_name }}</div>
            </div>
            <div class="w-1/2 px-4 mb-6">
                <div class="text-gray-700 font-bold mb-2">Address:</div>
                <div class="text-gray-500">{{ $data->employer->address }}</div>
            </div>

            <div class="w-1/2 px-4 mb-6">
                <div class="text-gray-700 font-bold mb-2">Phone One:</div>
                <div class="text-gray-500">{{ $data->employer->phone_one }}</div>
            </div>

            <div class="w-1/2 px-4 mb-6">
                <div class="text-gray-700 font-bold mb-2">Phone Two:</div>
                <div class="text-gray-500">{{ $data->employer->phone_two }}</div>
            </div>

        </div>
    </div>


    @endslot
</x-common.card>
@endsection
