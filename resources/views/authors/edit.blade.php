<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Edit Author") }}</h3>
                    <div class="grid grid-cols-4 gap-4">

                        <label for="Given" class="">{{ __("Given Name") }}</label>
                        <input type="text"
                               id="Given" name="given_name"
                               value="{{ old("given_name") ?? $author->given_name }}"
                               class="p-2 col-span-3">
                        <label for="Family" class="">{{ __("Family Name") }}</label>
                        <input type="text"
                               id="Family" name="family_name"
                               value="{{ old("family_name")?? $author->family_name }}"
                               class="p-2 col-span-3">
                        <label for="Corporate" class="">{{ __("Corporate") }}</label>
                        <input type="checkbox"
                               id="Corporate" name="is_company"
                               @checked(old('is_company') ?? $author->is_company)
                               class="p-2 font-bold text-stone-600 col-span-3">

                        <p class="">{{ __("Written") }}</p>
                        <div class="flex flex-col col-span-3">
                            <p class="">
                                {{ $author->books()->count() }}@if ($author->books()->count()>0)
                                    , {{ __("including") }}...
                                @endif
                            </p>
                            <ul class="list-circle list-inside pl-4">
                                @foreach($author->books as $book)
                                    @if($loop->index<5)
                                        <li>{{$book->title}}</li>
                                    @endif
                                @endforeach
                                @if($author->books()->count()>=5)
                                    <li class="text-stone-600">{{ __("and others") }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class=""></div>
                        <form action="{{ route('authors.update',compact(['author'])) }}"
                              class="mt-6 col-span-3 flex flex-row gap-4">
                            <button type="submit"
                                    class="py-2 px-4 mx-2 w-1/6 text-center
                                       rounded border border-sky-600
                                       hover:bg-sky-600
                                       text-sky-600 hover:text-white
                                       transition duration-500">
                                <i class="fa fa-floppy-disk"></i> {{ __("Save") }}
                            </button>
                            <a href="{{ route('authors.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-arrow-rotate-left"></i> {{ __("Cancel") }}
                            </a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
