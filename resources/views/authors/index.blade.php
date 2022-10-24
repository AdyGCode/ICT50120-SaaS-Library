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
                    <table class="table w-full">
                        <thead class="border border-stone-300">
                        <tr class="bg-stone-300">
                            <th class="p-2 text-right">#</th>
                            <th class="p-2 text-left">Given Name</th>
                            <th class="p-2 text-left">Family Name</th>
                            <th class="p-2 text-center">Corporate</th>
                            <th class="p-2 text-right">Qty</th>
                            <th class="p-2 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="border border-stone-300">
                        @foreach($authors as $author)
                            <tr class="border-b border-stone-300 hover:bg-stone-200">
                                <td class="p-2 text-right">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $author->given_name }}</td>
                                <td class="p-2">{{ $author->family_name }}</td>
                                <td class="font-bold text-stone-600 text-center">
                                    {{ $author->is_company ? "Y" : ""}}
                                </td>
                                <td class="p-2 text-right">{{ $author->books()->count() }}</td>
                                <td class="p-2">
                                    View
                                    Edit
                                    Delete
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
</x-guest-layout>
