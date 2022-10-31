# Authors - Edit

Browse and Read are down, Edit is next.

## Tutorial Index
|                      Previous                       |                Index                 |                       Next                       |
|:---------------------------------------------------:|:------------------------------------:|:------------------------------------------------:|
| [55 Authors: Read](ReadMe-55-Blade-Authors-Read.md) | [Tutorial Index](ReadMe-00-Index.md) | [57 Authors: Read](ReadMe-57-Blade-Authors-Add.md) |

## Authors Edit Page

Create a new file `edit.blade.html` in the `/resources/views/author` folder.

In this file start as per the last two:

```php
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
                
                ...
                
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
```
