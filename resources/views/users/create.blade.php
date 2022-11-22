<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-grow">
                {{ __('Users') }}
            </h2>

            <a href="{{ route('users.create') }}" class="rounded bg-sky-600 text-white shadow p-2">{{ __("New User") }}</a>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">

                        <h2 class="flex-grow text-2xl mb-6">{{ __('Create New User') }}</h2>

                        <div class="pull-right">
                            <a class="bg-zinc-800 text-white px-4 py-2 border border-zinc-800 rounded shadow shadow-md
                                shadow-zinc-300
                                hover:shadow-none hover:bg-zinc-100 hover:text-zinc-800 transition ease-in-out duration-500"
                               href="{{ route('users.index') }}"> {{__
                                ("Back")}}</a>
                        </div>
                    </div>

                    @if (count($errors) > 0)
                        <div class="flex flex-row rounded border border-red-500 text-red-800 bg-red-100 mb-4">
                            <i class="fa fa-triangle-exclamation text-xl px-4 py-2 flex-none bg-red-500 text-white rounded-l
                            mr-4"></i>
                            <p class="flex-grow my-3">
                                {{ __("Whoops!") }} {{ __("There were some problems with your input") }}.
                            </p>
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="grid grid-cols-12 my-2 gap-4">

                        <label for="Name" class="col-span-2">{{ __("Name") }}:</label>
                        <div class='col-span-10'>
                            <input type="text"
                                   name="name"
                                   placeholder="{{ __("Name") }}"
                                   id="Name"
                                   class="rounded w-full @error('name')border-red-500 @enderror">
                            @error('name')
                            <p class="w-full text-sm text-red-500 py-1">
                                {{ $errors->first('name') }}
                            </p>
                            @enderror
                        </div>

                        <label class="col-span-2" for="EMail">{{ __("eMail") }}:</label>
                        <div class='col-span-10'>
                            <input type="text"
                                   name="email"
                                   placeholder="{{ __("eMail") }}"
                                   id="EMail"
                                   class="rounded w-full @error('email')border-red-500 @enderror">
                            @error('email')
                            <p class="w-full text-sm text-red-500 py-1">
                                {{ $errors->first('email') }}
                            </p>
                            @enderror
                        </div>

                        <label class="col-span-2 " for="Password">{{ __("Password") }}:</label>
                        <div class='col-span-10'>
                            <input type="password"
                                   name="password"
                                   placeholder="{{ __("Password") }}"
                                   id="Password"
                                   class="rounded w-full @error('password')border-red-500 @enderror">
                            @error('password')
                            <p class="w-full text-sm text-red-500 py-1">
                                {{ $errors->first('password') }}
                            </p>
                            @enderror
                        </div>

                        <label class="col-span-2" for="ConfirmPassword">{{ __("Confirm Password") }}:</label>
                        <div class='col-span-10'>
                            <input type="password"
                                   name="confirm-password"
                                   placeholder="{{ __("Confirm Password") }}"
                                   id="ConfirmPassword"
                                   class="rounded w-full @error('confirm-password')border-red-500 @enderror">
                            @error('confirm-password')
                            <p class="w-full text-sm text-red-500 py-1">
                                {{ $errors->first('confirm-password') }}
                            </p>
                            @enderror
                        </div>

                        <label class="col-span-2" for="Roles">{{ __("Role") }}:</label>
                        <div class='col-span-10'>
                            <select class="rounded w-full @error('name')border-red-500 @enderror" name="roles[]" id="Roles"
                                    multiple>
                                @foreach($roles as $role)
                                    <option @if(old('roles') && in_array($role,old('roles'))) selected @endif >
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                            <p class="w-full text-sm text-red-500 py-1">
                                {{ $errors->first('roles') }}
                            </p>
                            @enderror
                        </div>

                        <label class="col-span-2"></label>
                        <button type="submit"
                                class="btn btn-primary col-span-2 bg-sky-800 text-sky-50 border border-sky-800
                                   hover:bg-sky-500 hover:text-white transition duration-500 ease-in-out
                                   rounded-md px-4 py-2">
                            {{ __("Submit") }}
                        </button>
                    </div>


                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
