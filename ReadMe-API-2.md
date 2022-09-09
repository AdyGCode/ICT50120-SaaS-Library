# Making an API II - Inserting Data

In [API part I](ReadMe-API-1.md) we looked at how to query the data via 
an API in the Index and Show methods.

The Index is NOT paginated (a problem for a later step), so we retrieve 
ALL the records (even if we had 1,000,000 of them)!

# HTTP Response Codes Revisited

One part of an API is the response it gives to a request, be that for a 
`GET`, `POST`, `DELETE`, `PUT` or `PATCH`.

The commonly used REST specific codes are shown below:

| Code Number | Meaning                | Use? |
|-------------|------------------------|------|
| `200`       | Ok                     | Y    |
| `201`       | Created                | Y    |
| `202`       | Accepted               |      |
| `204`       | No content             |      |
| `301`       | Moved Permanently      |      |
| `302`       | Found                  | Y    |
| `303`       | See Other              |      |
| `304`       | Not Modified           | Y    |
| `307`       | Temporary Redirect     |      |
| `400`       | Bad Request            | Y    |
| `401`       | Unauthorised           | Y    |
| `403`       | Forbidden              | Y    |
| `404`       | Not Found              | Y    |
| `405`       | Method Not Allowed     |      |
| `406`       | Not Acceptable         |      |
| `412`       | Precondition Failed    |      |
| `415`       | Unsupported Media Type |      |
| `500`       | Internal Server Error  |      |
| `501`       | Not Implemented        |      |

The "Use?" column is an indication of commonly used codes.

More details may be found at:
- [REST API Tutorial - HTTP Status Codes](https://restfulapi.net/http-status-codes/).

# Author API - Create a New Author

As we have employed Resourceful Routing, we do not need to create a
specific route. :smile:

Our exising `routes/api.php` file has this:

```php
Route::resource('authors', \App\Http\Controllers\API\AuthorAPIController::class);
```

You can also use the following:

```php
Route::resource('authors', AuthorAPIController::class);
```

This means we can now concentrate on the `API/AuthorAPIController.php` 
file and the `store`method.

## Store API Method

Let's start by creating the required API call for the
`http://DOMAIN/api/authors` endpoint.


| Request                   | HTTP Verb | Response                                               |
| ------------------------- |:---------:|--------------------------------------------------------|
| http://DOMAIN/api/authors |   POST    | request result code (201), message and author as JSON  |

We want our method to do the following:

- Validate the author data
- Store the new author
- Return a JSON response with:
  - A message - something to send to the caller that may be displayed as
    a message to the user
  - The list of authors
  - Response code of 201, Created

### Validate Submitted Data

To perform validation in the best way we need to make use of a Store Request.
The Requests are kept in the `app/Http/Requests` folder.

To create the Request Stub we use the command:

```shell
sail artisan make:request StoreAuthorAPIRequest
```

We now edit the StoreAuthorAPIRequest.php file and make the following
modifications...

At the top of the file, add the two extra lines to import HTTP Response
Exceptions and the Validator contract:
```php
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
```

We are currently not checking to see if the user is logged in so change 
the "authorised" method to return True.


Edit the AuthorAPIController and add the following to the store method:

```php
        $authors = Author::all();
        return response()->json(
            [
                'message' => "Retrieved successfully.",
                'authors' => $authors
            ],
            200
        );
```

## Testing with Postman

Because we are sending data to the API we cannot use the brute force 
check via the browser.

We need to use Postman to do the testing.




## Exercises

### TODO: Create the Books API create endpoint

- Add the `create` method to `BooksAPIController.php`.
- Make sure you verify all the required data is submitted.
- If the data is not submitted, it will return HTML for the time being,
  this is ok, until we look at error responses in a later stage.
- Store the new book in the database.

### TODO: Test the create method

- Create a suitable test in Postman to verify that you create a record 
  using the API only.

### TODO: Add the book - Author relationship

- Update the book create API endpoint so that when a book is added, 
  its author is linked via the author-book model.
- Refer to the seeders for help on this one.


### TODO: Test the updated create method

- Create a suitable test in Postman to verify that you create a 
  record (and link the associated author) using the API only.
