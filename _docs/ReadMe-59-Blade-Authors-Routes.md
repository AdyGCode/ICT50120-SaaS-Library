# Authors - Routes Revisited

Before we leave this blade based "management interface" - we need to revisit the routing.

## Tutorial Index

|                       Previous                        |                 Index                |
|:-----------------------------------------------------:|:------------------------------------:|
| [58 Authors: Delete](ReadMe-58-Blade-Authors-Delete.md) | [Tutorial Index](ReadMe-00-Index.md) |

## Updating the Authors controller

Open the `AuthorController.php` file.

We need to add (or edit) the `__construct` method.

If you do not have the `--construct` method then dd teh following lines immediaely after the `class AuthorController {` line:

```php
function __construct()
{
    $this->middleware('auth', ['except' => ['index', 'show']]);
}  
```

This tells the controller to verify that the user is logged in before using any routes **except** the index and show routes,
which are allowed to everyone.

It is important, though, to use this ONLY in cases where the user does not need to have authenticated access.

If you have the `__construct` method, then simply add the line:

```php
    $this->middleware('auth', ['except' => ['index', 'show']]);
```

## Updating the Web routes

After updating the Author Controller we are now able to modify the `routes/web.php` file.

We need to tidy up the content to make it more manageable, and maintainable.

In fact, if we use the controller to filter out the rotus that do not need authentication, we can then put all the routes
unto a middleware group:

```php
// Routes requiring authentication
Route::group(['middleware'=>['auth']], function () {
    Route::resource('authors', AuthorController::class);
    Route::get("/authors/{author}/delete", [AuthorController::class, 'delete'])->name('authors.delete');
    
    /*
     * The following routes will be uncommented as the various features
     * are added to the project.
    */
    Route::resource('books', BookController::class);
    // Route::resource('genres', GenreController::class);
    // Route::resource('countries', CountryController::class);

    /*
     * The users, roles and permissions routes will NOT have any exceptions, plus
     * they will require the correct permissions to use them. More on this
     * in a later section of the tutorial.
     */
    Route::resource('users', UserController::class);
    // Route::resource('roles', RoleController::class);
    // Route::resource('permissions', PermissionController::class);

    /* Logout a logged-in user */
    Route::post('/logout', [AuthController::class, 'logout']);
});
```

If all goes well the user will be able to visit the authors list, and show
the author's details without logging in, but will
not be able to add, edit or delete an author without being authenticated.



