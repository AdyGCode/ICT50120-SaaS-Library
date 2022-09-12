# Making an API II - Inserting Data

In [API part I](ReadMe-API-1-index-show.md) we looked at how to query the data via 
an API in the Index and Show methods.

The Index is NOT paginated (a problem for a later step), so we retrieve 
ALL the records (even if we had 1,000,000 of them)!


# The Steps

- [Introduction](ReadMe-API-0-introduction.md)  🔗
- [Index and Show](ReadMe-API-1-index-show.md)  🔗
- [Create](ReadMe-API-2-create.md)  🔗
- [Update](ReadMe-API-3-update.md)  🔗
- [Delete](Readme-API-4-delete.md)  🔗
- [Exercises](Readme-API-5-exercises.md)  🔗
- [Documenting API](ReadMe-API-6-documenting.md)  🔗
- [Pagination](ReadMe-API-7-pagination.md)  🔗
- [Authentication](ReadMe-API-8-authentication.md)  🔗



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

We now edit the `StoreAuthorAPIRequest.php` file and make the following
modifications...

At the top of the file, add the two extra lines to import HTTP Response
Exceptions and the Validator contract:
```php
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
```

### Allowing the Request
We are currently not checking to see if the user is logged in so change
the "authorised" method to return True.

```php
public function authorize()
{
    return true;
}
```

### Validation Rules
Now we need to create the rules for the validation method:

| Field        | Rules                                      |
|--------------|--------------------------------------------|
| Given Name   | max 64 chars                               |
| Family Name  | required without given name, max 128 chars |

To define a maximum length we use `max:LENGTH`.

To define something as required when another field is missing, we use: `required_without:FIELD_NAME`.

Replace LENGTH with a number, and FIELD_NAME with the field that may be blank.

```php
return [
    'given_name' => [
        'max:64',
        'min:0',
    ],
    'family_name' => [
        'required_without:given_name',
        'max:128',
    ],
];
```

#### Response Structure
Responses should have a common structure, be they successful or not.

A reasonable structure could be:

```json
{
    'success': TRUE/FALSE,
    'message': 'MESSAGE TEXT',
    'data': [ RETURNED_DATA ]
}
```

### Failed Validation Response

Because we want to send back a JSON response it is a good idea to 
structure our response to failed validation in a manner that is usable.

We do this by adding the `failedValidation` method.

```php
public function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
        'success' => false,
        'message' => 'Validation errors',
        'data' => $validator->errors()
    ]));
}
```

### Response Messages

To customise the response messages from the validator we add a `messages` method:

```php
public function messages()
{
    return [
        'family_name.required' => 'A family name is required. This is also used for Corporate authors',
    ];
}
```

## AuthorAPIController updates

Now we have the Response set up we modify the `AuthorAPIController` a little.

Edit the `AuthorAPIController` and change the store signature to:

```php
public function store(StoreAuthorAPIRequest $request)
```

Next we can add the author to the database.

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

### TODO: Create the Books API cCreate endpoint

- Add the `create` method to `BooksAPIController.php`.
- Make sure you verify all the required data is submitted.
- If the data is not submitted, it will return HTML for the time being,
  this is ok, until we look at error responses in a later stage.
- Store the new book in the database.

### TODO: Test the Create method

- Create a suitable test in Postman to verify that you create a record 
  using the API only.
- Use the Unknown Author id (1) for the test.

### TODO: Add the Book-Author relationship

- Update the book create API endpoint so that when a book is added, 
  its author is linked via the author-book model.
- The Author is passed as TWO text fields (family name(s) or corporate name, and an optional, null if omitted, given name(s)).
- Use these two fields to check if the author exists (if so use that id)
- If not create the author first, then use the new author's ID as the id.
- Refer to the seeders for help on this one.


### TODO: Test the updated create method

- Create a suitable test in Postman to verify that you create a 
  record (and link the associated author) using the API only.

### TODO: Add multiple authors to a book

- When submitting the author details, allow for an 'array of authors' (with family name(s) or corporate name, and an 
  optional, null if omitted,  given name(s) for each author)
- Use this to add multiple authors, in a similar way to the previous problem.
