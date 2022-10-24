# Making an API - API Base Controller Part II


In this tutorial we will use the Base Controller we created in [Base Controller](ReadMe-12-API-Base-controller.md),
and apply it to  our Authors API Controller.


## Tutorial Index

|           Previous           |                Index                 |                        Next                        |
|:----------------------------:|:------------------------------------:|:--------------------------------------------------:|
| [Pagination](ReadMe-18-API-pagination.md) | [Tutorial Index](ReadMe-00-Index.md) | [Fallback routes](ReadMe-20-API-fallback-route.md) | 


## Editing the Controllers to use the BaseController

Now edit the AuthorAPIController and change the class definition line to read:

```php
class AuthorAPIController extends ApiBaseController
```

Next we need to update the `return` statements to use the correct response call.


### Index Method Update

Edit the `index` method and modify it.

We start with the documentation for the API:

```php
/**
     * Browse the list of all authors
     *
     * @bodyParams
     *
     * @response {
     *      "status": true,
     *      "message": "Retrieved successfully",
     *      "data": {
     *          "authors": [
     *              {
     *                  "id": 1,
     *                  "given_name": "UNKNOWN",
     *                  "family_name": "AUTHOR",
     *                  "is_company": 0,
     *                  "created_at": "2022-09-10T14:45:22.000000Z",
     *                  "updated_at": "2022-09-10T14:45:22.000000Z"
     *              }, ...
     *          }
     *      ]
     * }
     *
     * @return JsonResponse
     */
    public function index(PaginateAPIRequest $request): JsonResponse
```

Next we change the index method to read:

```php
        // $authors = Author::all();
        $authors = Author::paginate($request['per_page']);

        return $this->sendResponse(
            $authors,
            "Retrieved successfully."
        );
```

Notice how we remove the complexity of mapping the results to fields?

Let's continue...

### Store Method Update

Replace the section:
```php
        $author = Author::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => "Created successfully.",
                'data' => [
                    'authors' => $authors,
                ],
            ],
            200
        );
```

This is replaced by the following:

```php
        $authors = Author::create($validated);
        
        return $this->sendResponse(
            $authors,
            "Created successfully."
        );
```

Looking good so far.

### Show Method Update

Now we look at the "show" method - where we have two options, success or failure to retrieve the author.      

```php
$response = response()->json(
    [
        'status' => false,
        'message' => "Author Not Found",
        'authors' => null
    ],
    404  # Not Found
);

if ($author->count() > 0) {
    $response = response()->json(
        [
            'status' => true,
            'message' => "Retrieved successfully.",
            'authors' => $author
        ],
        200  # OK
    );
}
return $response;
```

This is replaced by:

```php
        if ($authors->count() > 0) {
            return $this->sendResponse(
                $authors,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Author Not Found");
```

Note: Make sure that you change `$author` to `$authors`.

### Update

The update is shortened as well...

```php
        $authors = Author::query()->where('id', $id)->first();

        if (!is_null($authors) && $authors->count() > 0) {
            $validated['is_company'] = $validated['is_company'] ?? 0;
            if (!isset($validated['given_name'])) {
                $validated['given_name'] = $validated['family_name'];
                $validated['family_name'] = null;
            }

            $authors['given_name'] = $validated['given_name'];
            $authors['family_name'] = $validated['family_name'];
            $authors['is_company'] = $validated['is_company'];
            $authors['updated_at'] = Carbon::now();
            $authors->save();

            return $this->sendResponse(
                $authors,
                "Updated successfully.",
            );

        }
        return $this->sendError("Unable to update: Author Not Found" );
```

Much neater!


Finally we Destroy...

### Destroy

The destroy method now becomes:

```php
    public function destroy(int $id)
    {
        $author = Author::query()->where('id', $id)->first();

        $destroyedAuthor = $author;

        if (!is_null($author) && $author->count() > 0) {
            $author->delete();

            return $this->sendResponse(
                $destroyedAuthor,
                "Deleted successfully.",
            );

        }
        return $this->sendError("Unable to remove: Author Not Found");
    }
```

Once again much cleaner.
