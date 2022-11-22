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
                    @auth()
                    <a href="{{ route('authors.create') }}"
                       class="rounded mb-6 p-2 bg-sky-500 text-white text-center w-1/5 min-w-64">
                        {{ __('Add new Author') }}
                    </a>
                    @endauth

                    <table class="table w-full">
                        <caption>{{ __('All Authors (paginated)') }}</caption>
                        <thead class="border border-stone-300">
                        <tr class="bg-stone-300">
                            <th class="p-2 text-right">#</th>
                            <th class="p-2 text-left">{{ __("Given Name") }}</th>
                            <th class="p-2 text-left">{{ __("Family Name") }}</th>
                            <th class="p-2 text-center">{{ __("Corporate") }}</th>
                            <th class="p-2 text-right">{{ __("Written") }}</th>
                            <th class="p-2 text-left">{{ __("Actions") }}</th>
                        </tr>
                        </thead>
                        <tbody class="border border-stone-300">
                        @foreach($authors as $author)
                            <tr class="border-b border-stone-300 hover:bg-stone-200 transition duration-500 ease-in-out">
                                <td class="p-2 text-right">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $author->given_name }}</td>
                                <td class="p-2">{{ $author->family_name }}</td>
                                <td class="font-bold text-stone-600 text-center">
                                    {{ $author->is_company ? "Y" : ""}}
                                </td>
                                <td class="p-2 text-right">{{ $author->books()->count() }}</td>
                                <td class="py-2 pl-2 pr-0 flex flex-row gap-2">
                                    <a href="{{ route('authors.show', compact('author')) }}"
                                       class="px-2 w-12 text-center rounded-md border border-emerald-600
                                              hover:bg-emerald-600 hover:text-white transition duration-500">
                                        <span class="sr-only">View</span>
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('authors.edit', compact('author')) }}"
                                       class="px-2 w-12 text-center rounded-md border border-sky-600
                                              hover:bg-sky-600 hover:text-white transition duration-500">
                                        <span class="sr-only">Edit</span>
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{ route('authors.delete', compact('author')) }}"
                                       class="px-2 w-12 text-center rounded-md border border-red-600
                                              hover:bg-red-600 hover:text-white transition duration-500">
                                        <span class="sr-only">Delete</span>
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tfoot class="border border-stone-300">
                        <tr>
                            <td colspan="5" class="p-2">
                                {{ $authors->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

