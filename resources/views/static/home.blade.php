<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-columns-5 gap-8">
                    <div class="w-full grid-colspan-5">
                        Search ... to come
                    </div>

                    <div class="grid-colspan-2">
                        <div class="grid grid-cols-2">
                            <h4 class="text-xl text-bold grid-colspan-2">
                                Two Random Books
                            </h4>
                            @foreach($random_books as $book)
                                <div class="border border-zinc-300 p-2 grid-cols-1">
                                    <p>{{ $book->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-full">
                        Latest Three Books
                        @foreach($latest_books as $book)
                            <p>{{ $book->title }}</p>
                        @endforeach
                    </div>

                    <div class="w-full">
                        Some Random Authors
                        @foreach($random_authors as $author)
                            <p>{{ $author->fullName() }}</p>
                        @endforeach
                    </div>

                    <div>
                        Two Random Genres
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
