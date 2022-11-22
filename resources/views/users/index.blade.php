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
                    <table class="table w-full">
                        <thead class="border border-stone-300">
                        <tr class="bg-stone-300">
                            <th class="p-2 text-right">#</th>
                            <th class="p-2 text-left">{{ __("Name") }}</th>
                            <th class="p-2 text-left">{{ __("eMail") }}</th>
                            <th class="p-2 text-left">{{ __("Actions") }}</th>
                        </tr>
                        </thead>
                        <tbody class="border border-stone-300">
                        @foreach($users as $user)
                            <tr class="border-b border-stone-300 hover:bg-stone-200 transition duration-500 ease-in-out">
                                <td class="p-2 text-right">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>

                                <td class="py-2 pl-2 pr-0 flex flex-row gap-2">
                                    <a href="{{ route('users.show', compact('user')) }}"
                                       class="px-2 w-12 text-center rounded-md border border-emerald-600
                                              hover:bg-emerald-600 hover:text-white transition duration-500">
                                        <span class="sr-only">View</span>
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', compact('user')) }}"
                                       class="px-2 w-12 text-center rounded-md border border-sky-600
                                              hover:bg-sky-600 hover:text-white transition duration-500">
                                        <span class="sr-only">Edit</span>
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{ route('users.show', compact('user')) }}"
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
                            <td colspan="4" class="p-2 h-10">
                                {{ $users->links()}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
