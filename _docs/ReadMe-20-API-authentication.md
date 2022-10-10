# Making an API - Authentication

TODO: Write this section



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

> Remember that there are comprehensive docs on Sanctum at:
> https://laravel.com/docs/9.x/sanctum.
> 
> This tutorial is based on:
> - (Setup Postman for Laravel Sanctum)[http://www.cgs4k.nz/setup-postman-for-laravel-sanctum]
> - (REST API Authentication Using Laravel Sanctum)[https://linuxhint.com/rest-api-authentication-laravel-sanctum/]
> - (Making Api CRUD(Create,Read,Update,Delete) with Laravel 8 n API Authentication with sanctum)[https://dev.to/tanzimibthesam/making-api-crud-create-read-update-delete-with-laravel-8-n-api-authentication-with-sanctum-19oh]
> - (Protecting our Laravel API with Sanctum)[https://daily-dev-tips.com/posts/protecting-our-laravel-api-with-sanctum/]
> - (https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum)[Build a Restful API in PHP with Laravel Sanctum]


## Install Laravel Sanctum

Begin by setting up Laravel Sanctum, and, getting ready for a later
exploration, the Laravel Breeze, HTML based templating.

```shell
sail composer require laravel/breeze --dev
sail composer require laravel/sanctum
sail artisan breeze:install
```
Now install and publish the routes for authentication, and the service provider, and migrate:

```shell
sail artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
sail artisan vendor:publish --tag=sanctum-config --tag=sanctum-migrations
sail artisan breeze:install
sail artisan migrate

```

Because we are using Sanctum to authenticate an API, which can be used 
for a Single page Application (SPA) or for Mobile development, you 
should add Sanctum's middleware to your api middleware group within 
your application's `app/Http/Kernel.php` file at the end of the `api` section:

```php
\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
```

![Laravel Sanctum line added to Http Kernel](images/sanctum-kernel-1.png)

```php
'api' => [
\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
'throttle:api',
\Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

## Create the API Authentication Controller

Run the following artisan command to create a new controller `AuthAPIController` in the API folder:

```shell
sail artisan make:controller API/AuthAPIController
```

Open this controller and add the following register and login methods to the class:

```php
public function register(Request $request){

    $post_data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8'
    ]);
    
    $user = User::create([
        'name' => $post_data['name'],
        'email' => $post_data['email'],
        'password' => Hash::make($post_data['password']),
    ]);
    
    $token = $user->createToken('authToken')->plainTextToken;
    
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
    
public function login(Request $request){
    if (!\Auth::attempt($request->only('email', 'password'))) {
           return response()
                ->json([
                    'message' => 'Login information is invalid.'
                ], 401);
    }
    
    $user = User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('authToken')->plainTextToken;
    
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
```


## Create the Register and Login Requests

Using the CLI again, run these two commands to create the Login ad




## Add the Routes to the API

Open the `routes/api.php` file and add two routes for the registration and authentication:

```php
Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class, 'login']);
```

These will both be accessed via the `api` based URL.

```text
http://localhost/api/register
http://localhost/api/login
```

## Create Postman Tests

We need two tests, one to check a user can be registered and the other to cehck the login.

### Registering, Missing Data


### Registering, Invalid eMail


### Registering, All Valid


### Login, Incorrect Details


### Login, Correct Details





# What's next?

Next it's onto [Authorisation](ReadMe-21-API-authorisation.md).

Before that though, remember to [complete the exercises](ReadMe-90-API-exercises.md).
