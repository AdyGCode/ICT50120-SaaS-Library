# Making an API - Fallback Route

One item that is very important is what happens when a request is made to a Non-Existent API Route?

This is when a fallback route is very useful.


## Tutorial Index

|                      Previous                       |                Index                 |                             Next                              |
|:---------------------------------------------------:|:------------------------------------:|:-------------------------------------------------------------:|
| [Fallback Routes](ReadMe-18-API-fallback-routes.md) | [Tutorial Index](ReadMe-00-Index.md) | [Authentication via Sanctum](ReadMe-20-API-authentication.md) | 


## Create the API "Error" Controller

Run the command:

```shell
sail artisan make:controller API/ApiFallbackController
```

Open this new `app\Http\Controllers\API\ApiFallbackController.php` file.

In this class we now add:

```php
public function error(Request $request)
    {
        return $this->sendError(
            'Page Not Found. If error persists, contact ' . env("APP_CONTACT", "info@example.com")
        );
    }
```

Next change the class definition line to use the `ApiBaseController` class we created in the previous tutorial.

```php
class ApiFallbackController extends ApiBaseController
```

## Create the Fallback Route

Open the `routes/api.php` file and go to the end of the file.

At this point add:

```php
/* Fallback route with nice error message */

Route::fallback([ApiFallbackController::class, 'error']);
```

If you wanted you could add the `APP_CONTACT` key to the `.env` file:

```dotenv
APP_CONTACT=support@domain.name.dev
```

This would be the email address to send requests for support to.


## Testing

To test this, try going to a non-existent route such as `http://localhost/api/error`.

You should get back a response similar to:

```json
{
    "success": false,
    "message": "Page Not Found. If error persists, contact support@domain.name.dev"
}
```

# What's next?

Next it's onto [Authentication](ReadMe-21-API-authentication.md).

Before that though, remember to [complete the exercises](ReadMe-90-API-exercises.md).
