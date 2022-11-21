<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">
                        {{ __("Add Author") }}
                    </h3>

                    @if($errors->any())
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-triangle-exclamation text-xl pl-2 pr-4"></i>
                            You have errors in your form submission.
                        </div>
                        @enderror

                        <form action="{{ route('authors.store') }}"
                              class="flex flex-col gap-4"
                              method="post">

                            @csrf

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Given" class="">{{ __("Given Name") }}</label>
                                <input type="text"
                                       id="Given" name="given_name"
                                       value="{{ old("given_name") }}"
                                       class="p-2 col-span-5">
                                @error('given_name')
                                <span></span>
                                <p class="text-red-800 mb-2 text-sm col-span-5">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Family" class="">{{ __("Family Name") }}</label>
                                <input type="text"
                                       id="Family" name="family_name"
                                       value="{{ old("family_name") }}"
                                       class="p-2 col-span-5">
                                @error('family_name')
                                <span></span>
                                <p class="text-red-800 mb-2 text-sm col-span-5">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Corporate" class="">{{ __("Corporate") }}</label>
                                <input type="checkbox"
                                       id="Corporate" name="is_company"
                                       @checked(old('is_company'))
                                       class="p-2 font-bold text-stone-600 col-span-5">
                            </div>


                            <div class="grid grid-cols-6 gap-4">

                                <span></span>

                                <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                                    <a href="{{ route('authors.index') }}"
                                       class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                        <i class="fa fa-circle-left"></i> {{ __("Back") }}
                                    </a>

                                    <button type="submit"
                                            class="py-2 px-4 mx-2 w-1/6 text-center
                                       rounded border border-red-600
                                       hover:bg-red-600
                                       text-red-600 hover:text-white
                                       transition duration-500">
                                        <i class="fa fa-trash"></i> {{ __("Save") }}
                                    </button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
