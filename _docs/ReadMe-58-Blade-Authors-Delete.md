# Authors - Delete

Browse, Read, Edit, and Add are down, Delete wraps it up.

We will use a confirmation page

## Tutorial Index

|                     Previous                      |                 Index                |                          Next                           |
|:-------------------------------------------------:|:------------------------------------:|:-------------------------------------------------------:|
| [57 Authors: Add](ReadMe-57-Blade-Authors-Add.md) | [Tutorial Index](ReadMe-00-Index.md) | [59 Authors: Routes](ReadMe-59-Blade-Authors-Routes.md) |

## Authors Delete Page

Well, why make out lives difficult...?

Duplicate the show page, naming the new copy `delete.blade.php`.

Now we can edit the page a little.

Update the title to be "Delete Author":

```php
<h3 class="font-bold text-gray-700 text-lg mb-4">
    {{ __("Delete Author") }}
</h3>
```

Update the `form` opening tag to include the POST method and action to route to the 'destroy' method,
plus add the CSRF and the method faking:

```php
<form action="{{ route('authors.destroy', compact(['author'])) }}"
      method="POST"
      class="mt-6 col-span-3 flex flex-row gap-4">
    @csrf
    @method('delete')
```

Remove the edit link from the bottom of the summary (the lines to remove are shown below)

```php
<a href="{{ route('authors.edit', compact('author')) }}"
   class="py-2 px-4 mx-2 w-1/6 text-center
          rounded border border-sky-600
          hover:bg-sky-600
          text-sky-600 hover:text-white
          transition duration-500">
    <i class="fa fa-pen"></i> {{ __("Edit") }}
</a>
```

Modify the "Delete" button to be "Confirm Delete".

```php
<button type="submit"
        class="py-2 px-4 mx-2 w-1/6 text-center
           rounded border border-red-600
           hover:bg-red-600
           text-red-600 hover:text-white
           transition duration-500">
    <i class="fa fa-trash"></i> {{ __("Confirm Delete") }}
</button>
```

That's it for the view.

The controller's delete adn destroy methods are next.

### Delete Method

Open the `AuthorController.php` file and move to the bottom fo the file.

Add the following `delete` method **IMMEDIATELY** above the destroy method.

```php
/**
 * Verify the removal from storage.
 *
 * @param  \App\Models\Author  $author
 * @return \Illuminate\Http\Response
 */
public function delete(Author $author)
{
    return view('authors.delete', compact(['author',]));
}
```

### Destroy method

We now can add the code to destroy the actual author record:

```php
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
```

### Update the Author's show (Read) page

You will also need to update the show view's delete button to send to the delete confirmation page.

This means changing from a `button` to an `a` anchor link:

```php
<a href="{{ route('authors.delete', compact('author')) }}"
        class="py-2 px-4 mx-2 w-1/6 text-center
           rounded border border-red-600
           hover:bg-red-600
           text-red-600 hover:text-white
           transition duration-500">
    <i class="fa fa-trash"></i> {{ __("Delete") }}
</a>
```

### Testing

To test this works, add a new dummy author and then locate it and use the delete button.
