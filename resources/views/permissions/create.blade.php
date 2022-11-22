<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('Users') }}
        </h2>
        <a href="{{ route('users.create') }}" class="rounded bg-sky-600 p-2">New User</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row mb-6">
                        <div class="flex-grow">
                            <h2>Create New Permission</h2>
                        </div>
                        <div class="">
                            <a class="rounded bg-stone-500 text-stone-50 p-2" href="{{ route('users.index') }}">
                                Back</a>
                        </div>
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <p><strong>Whoops!</strong> There were some problems with your input.</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('permissions.store') }}" method="post">

                        <div class="grid grid-cols-12">
                            <label for="Name" class="col-span-2">Name:</label>
                            <input type="text" name="name" id="Name" placeholder='Name' class='col-span-10'>
                        </div>

                        <div class="grid grid-cols-12 pt-6">
                            <div for="Name" class="col-span-2"></div>

                            <button type="submit" class="rounded bg-stone-500 text-stone-50 p-2">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </x-guest-layout>
