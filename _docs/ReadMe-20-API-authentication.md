# Making an API - Authentication


Remember that there are comprehensive docs on Sanctum at:
- https://laravel.com/docs/9.x/sanctum.

This tutorial is based on:
- [Setup Postman for Laravel Sanctum](http://www.cgs4k.nz/setup-postman-for-laravel-sanctum).
- [REST API Authentication Using Laravel Sanctum](https://linuxhint.com/rest-api-authentication-laravel-sanctum/).
- [Making Api CRUD (Create, Read, Update, Delete) with Laravel 8 + API Authentication with sanctum](https://dev.to/tanzimibthesam/making-api-crud-create-read-update-delete-with-laravel-8-n-api-authentication-with-sanctum-19oh).
- [Protecting our Laravel API with Sanctum](https://daily-dev-tips.com/posts/protecting-our-laravel-api-with-sanctum/).
- [Build a Restful API in PHP with Laravel Sanctum](https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum).

## Tutorial Index

|                      Previous                       |                Index                 |                        Next                        |
|:---------------------------------------------------:|:------------------------------------:|:--------------------------------------------------:|
| [Fallback Routes](ReadMe-18-API-fallback-routes.md) | [Tutorial Index](ReadMe-00-Index.md) | [Monitroing Health](ReadMe-80-monitoring-health.md) | 

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
```    

The validation for this API endpoint is shown in the controller method. 

It is prudent to move this into a request. We'll do this shortly.

The Login method is a little simpler...

```php 
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

## Create the Register Request

Using the CLI again, run these commands to create the Register requests.

```shell
sail artisan make:request RegisterAPIRequest
```

Edit the AuthAPIController and change the `Request $request` for the register to the following:

```php
public function register(RegisterAPIRequest $request){
```

Make sure you have the requests imported at the top of the controller.

Also, in the register method, change the `$post_data = $request->validate([...]);` line to read:

```php
        $post_data = $request->validated;
```

### Completing the Request

Next we move the validation code and create error messages, as we have previously.

In the `RegisterAPIRequest` we need to do the following:

- change the `authorize` method result to `true`.
- add the rules for the Registration Validation
- add the messages and failed validation handling

The registration validation rules now look like this:

```php
       return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:8',
            ]
        ];
```

The failed validation handling method is new and looks like this:

```php
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
```

Finally, the messages handler takes care of the important messages we need returning:

```php
public function messages()
{
    return [
        'name.required' => 'A name is required',
        'email.required' => 'An eMail address is required',
        'email.unique' => 'A unique eMail address is required',
        'email.email' => 'A valid eMail address is required',
        'password.min' => 'The password must be at least 8 characters long',
    ];
}
```

## Add the Routes to the API

Open the `routes/api.php` file and add two routes for the registration and authentication:

```php
Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class, 'login']);
```

These will both be accessed via the `api` based URLs that use POST requests:

- [http://localhost/api/register]()
- [http://localhost/api/login]()


## Create Postman Tests

We need to create tests. These tests check for missing data, invalid emails, and 
passwords when registering, plus incorrect email, and password when logging in, then for
valid values when registering and logging in.

### Registering, Missing Data

### Registering, Invalid eMail

### Registering, Invalid Password

### Registering, All Valid

### Login, Incorrect Password

### Login, Incorrect eMail

### Login, Correct Details

## Logout Method

Edit the AuthAPIController and add a new method: `logout`.

```php
public function logout(Request $request){
        auth()->user()->tokens()->logout();

        return [
            'message'=>'Logged out'
        ];
    }
```

This removes the token for the user and thus forces a logout.

Next we add the logout to the api.php routes file:

```php
/ Authentication required API Routes
// We wrap these in "Auth" Middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    // lines omitted for brevity ...
    
    /* Logout a logged-in user */
    Route::post('/logout', [AuthorAPIController::class, 'logout']);
});
```
 
## Making our Routes Tidier By Prefixing

When you have a set of routes that use the same prefix, such as in out case the `Authors`, we can use the ability to prefix 
the routes. Here is the updated `api.php` routes for the authors, complete with authentication middleware:

```php
/ Authentication required API Routes
// We wrap these in "Auth" Middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
   
    /* Prefix the given routes with /authors */
    Route::prefix('authors')->group(function() {
   
        Route::get("{id}", [AuthorAPIController::class, 'show']);
        Route::post('/', [AuthorAPIController::class, 'store']);
        Route::put('/{id}', [AuthorAPIController::class, 'update']);
        Route::delete('/{id}', [AuthorAPIController::class, 'delete']);
   
    });
   
    /* Logout a logged-in user */
    Route::post('/logout', [AuthorAPIController::class, 'logout']);
});
```

# Logging in and Accessing Protected Routes

Once we have the login working, we need to now handle accessing routes that require authentication.

For testing purposes we will move the `author/{id}` route into the middleware group in the `routes/api.php` file.

```php
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get("/authors/{id}", [AuthAPIController::class,'show']);
    Route::post('/author', [AuthorAPIController::class, 'store']);
    Route::put('/author/{id}', [AuthorAPIController::class, 'update']);
    Route::delete('/author/{id}', [AuthorAPIController::class, 'delete']);
});
```

Open Postman and try accessing the `http://localhost/api/authors/1` endpoint.

Did you get an error?

It should have directed you back to an HTML page - not what we want.

We need to get JSON responses, so how can we do this?

## API Controller that Returns JSON responses

A good technique is to create an API Controller that we use to send our results back to 
the caller in a set manner, and thus 
also reducing the amount of code written.

This is covered in [17 API Base Controller](ReadMe-18-API-Base-controller.md).

Also, a part of this is also making sure you are sending JSON based requests and not 
form based requests.

This is covered in [17 API Base Controller](ReadMe-11-API-index-show.md).

## Example testing

Successful Login:
```json
{
    "success": true,
    "data": {
        "access_token": "1|QABHSmyESS4blQR004qq7exBssDGgMeOMjeHzcG9",
        "token_type": "Bearer"
    },
    "message": "Logged-in"
}
```

Error on Login:
```json
{
    "success": false,
    "message": "Login information is invalid."
}
```

# Exercise!

Update the controller(s) used in this tutorial to use the API Base Controller, and ensure they
send back the uniform result structure.


If you get stuck, always check the latest code in the repository for this tutorial.

# What's next?

Next it's onto [Authorization](ReadMe-22-API-authorisation.md).

Before that though, remember to [complete the exercises](ReadMe-90-API-exercises.md).
