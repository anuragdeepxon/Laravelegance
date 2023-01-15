@extends('admin.layouts.auth-app')

@section('content')
    <div class="items-center align-middle">
        <div
            class="w-full items-center align-middle mx-auto mt-8 max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" method="post" action="{{ url('/admin/dologin') }}">

                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to the Admin Panel</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="bg-gray-50 border
                        @error('email') is-invalid @enderror
                        border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com" required>

                    @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50
                        @error('password') is-invalid @enderror
                        border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>

                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center icheck-primary h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                            me</label>
                    </div>
                    {{-- <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost
                        Password?</a> --}}
                </div>
                <input type="submit" value="Login"
                    class="w-full rounded-3xl text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{-- <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create
                        account</a>
                </div> --}}
            </form>
        </div>



    </div>

    <style>
        span.error.invalid-feedback {
            font-size: 13px;
            color: red;
        }
    </style>
@endsection
