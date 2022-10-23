# Making an API - Related Data

How do we retrieve the books that belong to and author?

We do this with our Many-to-Many relationship that we have defined.


## Tutorial Index

|           Previous           |                Index                |           Next            |
|:----------------------------:|:-----------------------------------:|:-------------------------:|
| [Index-Show](ReadMe-11-index-show.md) | Tutorial Index](ReadMe-00-Index.md) | [Create](ReadMe-13-create.md) |



## Relationships

Retrieving data that is part of a relationship is important.

For example, we want the books that an author has written.

Before we begin we need to fix a small problem in the Models.

### Many to Many

We already know that we have the following situations:

- An author may write MANY books
- A book may have MANY authors

We resolve this using a 'pivot' or 'through' or 'mediatory' table.

In the case of the Books and Authors that is an Author-Book table.

### Defining the relationships

In Laravel, we need to then define the relationships between these tables in the models that represent the two 'outer'
tables.

In the Authors Model we added the `books()` method, and in the Books model we added the `authors()` method.

In the previous tutorial we used `hasMany` and `belongsToMany` relationship descriptors. This was a 'small' error.

We actually need to use '`belongsToMany`' in BOTH methods.

This, tied with the '`attach`' method, then works for retrieving the data from the related models:

### Fixing up

Open the Authors model and change the method to:

```php
    public function books() {
        return $this->belongsToMany(Book::class);
    }
```

Open the Books model and change the method to:

```php
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
```

## Using the relationships

So how can we use this?

We can use these relationships when we retrieve the books or authors.

We will return the books an author writes with the author when we
retrieve the author's details in the SHOW method.

Open the `AuthorAPIController` and locate the `show` method.

The key to getting the related books back is to use the `with` method
with the Author class. This tells Laravel to use the `books` method to
retrieve the related books as part of the data retrieved.

```php
        $authors = Author::with('books')->find( $id);
```

So the above code _Asks the `Author` model to retrieve the author
with the ID `$id` and then find and return any `books` they wrote.

Update your code.

## A Quick and Dirty Search Method

Here is some sample (not complete) code to search for authors with a given family name:

```php
    public function search(Request $request): JsonResponse
    {
        $search = $request->get('search');

        $authors = Author::with('books')->where( 'family_name', 'like', "%{$search}%")->get();

        if ($authors->count() > 0) {
            return $this->sendResponse(
                $authors,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Author Not Found");
    }
```

It would be a good idea to create a `SearchAuthorAPIRequest` and
perform validation on the passed data for the search.

We then need to add a new line to the `api.php` routes file:

```php
Route::get("/authors/search", [AuthorAPIController::class, 'search']);
```

Make sure you put this BEFORE any `/{id}` route.

You can always check the example in the [`routes\api.php` file](..\routes\api.php).

## Aside

Later, when you look at authentication, you will discover that a route that is listed as
being processed by middleware will take priority over one that does not require processing. 
