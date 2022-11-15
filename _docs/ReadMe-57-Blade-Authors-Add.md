# Authors - Add

Browse, Read and Edit are down, Add is next.

## Tutorial Index

|                     Previous                     |                Index                 |                        Next                        |
|:------------------------------------------------:|:------------------------------------:|:--------------------------------------------------:|
| [55 Authors: Edit](ReadMe-56-Blade-Authors-Edit.md) | [Tutorial Index](ReadMe-00-Index.md) | [58 Authors: Delete](ReadMe-58-Blade-Authors-Delete.md) |

## Authors Add Page

The add page is remarkably similar to the "Edit" page. In fact, we often work with one or the other, then duplicate and
update to suit the task.

You may follow these steps along after copying the `edit.blade.php` view file and naming it `add.blade.php`, or by starting
from scratch.

We will progress through the file from top to bottom.

At the top of the file, we start as per the previous pages, except the page heading will be "Add Author".

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
                    <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Add Author") }}</h3>
                

```

### Adding a General Error message

At the spot marked by the ... we now add the following (keep the ... as we will refer to it in the following steps):

```php
@if($errors->any())
    <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
        <i class="fa fa-triangle-exclamation text-xl pl-2 pr-4"></i>
        You have errors in your form submission.
    </div>
@enderror

...
```

The code above first checks to see if there are `any()` errors.

If there errors then the general error message "*You have errors in your form submission*" is
shown with an icon, pale red background and dark red text.

### Adding the Form

Next we have the form header with the store route, POST method and CSRF protection:

```php
<form action="{{ route('authors.store') }}"
      class="flex flex-col gap-4"
      method="post">

    @csrf
```

The Given name, Family name and corporate fields are very similar to the edit page,
except we do not use the null coalesce.

Rather than repeating the explanations for each, we present the code for each field in turn.

### Given Name

Note the `value=...` section where the `??` null coalesce has been removed.

```php
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
```

### Family Name

Repeat for the Family name...

```php
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
```

### Corporate Checkbox

The corporate checkbox is once again a modification from the edit...

```php
<div class="grid grid-cols-6 gap-1">
    <label for="Corporate" class="">{{ __("Corporate") }}</label>
    <input type="checkbox"
           id="Corporate" name="is_company"
           @checked(old('is_company'))
           class="p-2 font-bold text-stone-600 col-span-5">
</div>
```

### Remove the book list

As we are adding an author we can remove the book list. We do nto need it.

Possible future enhancement may be to provide a way to add a book to the author.

### Submit or Go Back

The final part of the form is where we submit the data to be saved, or we go back to the list of authors.

```php
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
```

### Closing the form

The last bit is to close the form and page content off:

```php
                        </form>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
```

For the full code, check the repository.

## The Author Controller - Create Method

We have the view, so now we need to feed it.

Open the `AuthorController` and locate the `create` method.

Modify the controller to read:

```php
 public function create()
    {
        return view('authors.create');
    }
```

Next we add the code to do the author store.

### Store Author

We can use the validate data from the request to create the author:

```php
 public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return redirect()->route('authors.index')
            ->with('success', "Author {$author->fullName()} created successfully.");
    }
 ```

Before we can use this we need to create an StoreAuthorRequest.

### UpdateAuthorRequest

Create the request using:

```shell
sail artisan make:request StoreAuthorRequest
```

Edit the request by changing the `authorize` method to `return true` and then adding the following validation rules:

```php
    public function rules()
    {
        return [
            'given_name' => [
                'required_without:family_name',
                'max:64',
            ],
            'family_name' => [
                'required_without:given_name',
                'max:128',
            ],
            'is_company' => [
                'boolean',
                'nullable',
            ]
        ];
    }
```

We do not need to add a constructor or anything else to this as Laravel will handle sending the errors back as part of an
"error bag".

With that we should now have a working create/add page.

### What about the links to the add?

We will add a new button to the authors `index.blade.php`.

Find the opening Table tag, and immeditely before it add:

```php
<a href="{{ route('authors.create') }}"
   class="rounded mb-6 p-2 bg-sky-500 text-white text-center w-1/5 min-w-64">Add new Author</a>
```

And there we have it. Add is done.

Final step is delete - where we will wrap up the basic BREAD/CRUD.

