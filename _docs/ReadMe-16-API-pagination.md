# Making an API - Pagination

Pagination is a way of sending chunks of data to the caller, be they an
API request or a web page.

There are different ways to do pagination, for now we will use the 
built-in pagination for Laravel.


## Tutorial Index

- [Introduction](ReadMe-10-API-introduction.md)  🔗
- [Index and Show](ReadMe-11-API-index-show.md)  🔗
- [Create](ReadMe-12-API-create.md)  🔗
- [Update](ReadMe-13-API-update.md)  🔗
- [Delete](ReadMe-14-API-delete.md)  🔗
- [Documenting API](ReadMe-15-API-documenting.md)  🔗
- [Exercises](ReadMe-90-API-exercises.md)  🔗
- [Pagination](ReadMe-16-API-pagination.md)  🔗
- [Authentication](ReadMe-20-API-authentication.md)  🔗

---

We are going to add pagination by using a new Request (to validate page and number of items per page).

When it comes to the actual pagination, the index method then uses this Pagination Request to validate the page and number 
of items per page before allowing the request to progress.

## Create "Pagination API Request"

One advantage of creating a Pagination request is that it is re-usable. The only validation is compelted on the page number 
and the items per page.

```shell
sail artisan make:request PaginationAPIRequest
```

## Edit the Author API Controller
Head into the `app\Http\Controllers\API\` folder and open the `AuthorController`.

Find index method and modify the signature:

```php
public function index(PaginationAPIRequest $request): JsonResponse
```

Next modify the index's `$author` line to read:

```php
        $authors = Author::paginate($validated["per_page"]);
```

Now we head to the PaginateAPIRequest and add the core of the functionality.

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'page'=>[
                'min:1',
                'integer'
            ],
            'per_page'=>[
              'min:1',
              'max:9999',
              'integer'
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ])
        );
    }


    public function messages()
    {
        return [
            'page' => 'Page must be an integer greater or equal to 1.',
            'per_page'=>"Per Page must be a value between 1 and 9999"
        ];
    }





# What's next?

Next it's onto [Authentication](ReadMe-20-API-authentication.md).

Before that though, remember to [complete the exercises](ReadMe-90-API-exercises.md).
