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
                        {{ __("Delete Author") }}
                    </h3>
                    <div class="grid grid-cols-4">
                        <p class="">{{ __("Given Name") }}</p>
                        <p class="p-2 col-span-3">{{ $author->given_name }}</p>
                        <p class="">{{ __("Family Name") }}</p>
                        <p class="p-2 col-span-3">{{ $author->family_name }}</p>
                        <p class="">{{ __("Corporate") }}</p>
                        <p class="p-2 font-bold text-stone-600 col-span-3">
                            {{ $author->is_company ? "Yes" : "No"}}
                        </p>
                        <p class="">{{ __("Written") }}</p>
                        <div class="flex flex-col p-2 col-span-3">
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
                        <form action="{{ route('authors.destroy', compact(['author'])) }}"
                              method="POST"
                              class="mt-6 col-span-3 flex flex-row gap-4">
                            @csrf
                            @method('delete')
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
                                <i class="fa fa-trash"></i> {{ __("Confirm Delete") }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
