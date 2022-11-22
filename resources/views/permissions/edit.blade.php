<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex-1">
                {{ __('Users') }}
            </h2>
            <p class="flex-initial">
                <a href="{{ route('users.create') }}" class="rounded shadow text-white bg-sky-600 p-2">
                    New User
                </a>
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-row">
                        <h3 class="text-xl flex-grow">
                            Edit User
                        </h3>
                        <a class="rounded bg-stone-600 text-stone-50 shadow p-2 px-4"
                           href="{{ route('users.index')}}">
                            Back
                        </a>
                    </div>

                    @if (count($errors) > 0)
                        <div class="rounded bg-red-200 text-red-900 p-4">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="grid grid-cols-5 gap-4 my-4">
                        <label for="" class="py-2">Name:</label>
                        <div class="col-span-4">
                            {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'w-full')) !!}
                        </div>

                        <label for="" class="py-2">Email:</label>
                        <div class="col-span-4">
                            {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'w-full')) !!}
                        </div>

                        <label for="" class="py-2">Password:</label>
                        <div class="col-span-4">
                            {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'w-full')) !!}
                        </div>

                        <label for="" class="py-2">Confirm Password:</label>
                        <div class="col-span-4">
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'w-full')) !!}
                        </div>

                        <label for="" class="py-2">Role:</label>
                        <div class="col-span-4">
                            {!! Form::select('roles[]', $roles, $userRole, array('class' => 'w-full','multiple')) !!}
                        </div>
                        <div></div>
                        <div class="px-4 py-2 bg-sky-600 text-white shadow hover:bg-sky-200 hover:text-sky-900 transition
                                    duration-500 border-sky-900 text-center">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
