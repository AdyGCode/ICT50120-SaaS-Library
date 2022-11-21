<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-5 grid-rows-auto gap-2">

                    <div class="col-span-5 p-4 border border-zinc-500 rounded">
                        Search ... to come
                    </div>


                    <div class="col-span-2 p-4 border border-zinc-500 rounded">
                        <div class="w-full grid grid-cols-2 gap-2 text-sm">
                            <h4 class="text-xl text-bold w-full col-span-2">
                                {{__("Random Books")}}
                            </h4>
                            @foreach($random_books as $book)
                                <div class="border border-zinc-300 p-2 col-span-1 rounded">
                                    <p>{{ $book->title }} {{ $book->subtitle??false ? "(<i>$book->subtitle</i>)" :""}}</p>
                                    <p class="pl-2 text-stone-700">
                                        @foreach($book->authors as $author)
                                            {{ $author->fullName() }},
                                        @endforeach
                                    </p>
                                    <p>
                                        {{--  @foreach($book->genres as $genre)--}}
                                        {{--      <span class="text-xm rounded bg-stone-500 text-white p-2">--}}
                                        {{--          {{ $author->fullName()}}--}}
                                        {{--      </span>--}}
                                        {{--  @endforeach--}}
                                    </p>
                                    <p class="text-xs pl-2 text-stone-500">{{ $book->publisher->name ?? ""  }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-3 p-4 border border-zinc-500 rounded">
                        <div class="w-full grid grid-cols-3 gap-2 text-sm">
                            <h4 class="text-xl text-bold col-span-3">
                                {{__("Latest Three Books")}}
                            </h4>
                            @foreach($latest_books as $book)
                                <div class="border border-zinc-300 p-2 col-span-1 rounded text-sm">
                                    <p>{{ $book->title }} {{ $book->subtitle??false ? "(<i> $book->subtitle</i>)" : ""}}</p>
                                    <p class="pl-2 text-stone-700">
                                        @foreach($book->authors as $author)
                                            {{ $author->fullName() }},
                                        @endforeach
                                    </p>
                                    <p>
                                        {{-- @foreach($book->genres as $genre)--}}
                                        {{--     <span class="text-xm rounded bg-stone-500 text-white p-2">--}}
                                        {{--         {{ $author->fullName()}}--}}
                                        {{--     </span>--}}
                                        {{-- @endforeach--}}
                                    </p>
                                    <p class="text-xs pl-2 text-stone-500">{{ $book->publisher->name ?? ""  }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-3 p-4 border border-zinc-500 rounded">
                        <div class="w-full grid grid-cols-3 gap-4">
                            <h4 class="text-xl text-bold col-span-3">
                                {{__("Random Authors")}}
                            </h4>
                            @foreach($random_authors as $author)
                                <div class="border border-zinc-300 p-2 col-span-1 rounded">
                                    <p>{{ $author->fullName() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-2 p-4 border border-zinc-500 rounded">
                        <div class="w-full grid grid-cols-4 gap-4">
                            <h4 class="text-xl text-bold w-full col-span-4">
                                {{__("Random Genres")}}
                            </h4>
                            @foreach($random_genres as $genre)
                                <div class="text-center border border-zinc-300 p-2 col-span-2 rounded">
                                    <p> {{ Str::title($genre->name) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
