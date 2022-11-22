<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid grid-cols-3 gap-6">

                    <a href="{{ route('books.index') }}"
                       class="rounded-lg
                              hover:bg-sky-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-book text-8xl w-32"></i>
                            </div>
                            <div class=" p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Books</h5>
                                <p class="text-5xl text-right grow">{{ $book_count ?? "n/a"}}</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{ route('authors.index') }}"
                       class="rounded-lg
                              hover:bg-teal-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-feather text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Authors</h5>
                                <p class="text-5xl text-right grow">{{ $author_count ?? "n/a"}}</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('genres.index')}}"
                       class="rounded-lg
                              hover:bg-emerald-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-hat-cowboy text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Genres</h5>
                                <p class="text-5xl text-right grow">999999</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('admin.dashboard')}}"
                       class="rounded-lg
                              hover:bg-rose-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-list-check text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow bg-transparent">
                                <h5 class="text-2xl text-right mb-4">Loans</h5>
                                <p class="text-5xl text-right grow">999999</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('admin.dashboard')}}"
                       class="rounded-lg
                              hover:bg-pink-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-id-card text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Members</h5>
                                <p class="text-5xl text-right grow">999999</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('admin.dashboard')}}"
                       class="rounded-lg
                              hover:bg-lime-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-building text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Publishers</h5>
                                <p class="text-5xl text-right grow">{{ $publisher_count ?? "n/a"}}</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('admin.dashboard')}}"
                       class="rounded-lg
                              hover:bg-stone-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-users text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow ">
                                <h5 class="text-2xl text-right mb-4">Staff</h5>
                                <p class="text-5xl text-right grow">999999</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('admin.dashboard')}}"
                       class="rounded-lg
                              hover:bg-slate-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-earth-oceania text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Countries</h5>
                                <p class="text-5xl text-right grow">999999</p>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('roles.index')}}"
                       class="rounded-lg
                              hover:bg-zinc-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-person-circle-question text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Roles</h5>
                            </div>
                        </section>
                    </a>

                    <a href="{{route('permissions.index')}}"
                       class="rounded-lg
                              hover:bg-zinc-600
                              transition duration-250 ease-in-out
                              text-neutral-900 hover:text-white
                              shadow shadow-neutral-300 hover:shadow-none hover:shadow-neutral-400
                              border border-neutral-200">
                        <section class="flex flex-row">
                            <div class="p-4 text-center">
                                <i class="fa-solid fa-person-circle-question text-8xl w-32"></i>
                            </div>
                            <div class="p-4 grow">
                                <h5 class="text-2xl text-right mb-4">Permissions</h5>
                            </div>
                        </section>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
