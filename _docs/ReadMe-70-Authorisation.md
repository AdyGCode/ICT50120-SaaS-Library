# Security - Authorisation

This tutorial is based on:

- https://www.honeybadger.io/blog/user-roles-permissions-in-laravel/
- https://www.laravelcode.com/post/laravel-8-user-roles-and-permissions-using-spatie

## Tutorial Index

|                     Previous                      |                Index                 |                    Next                     |
|:-------------------------------------------------:|:------------------------------------:|:-------------------------------------------:|
| [Monitoring Health](ReadMe-80-monitoring-health.md) | [Tutorial Index](ReadMe-00-Index.md) | [API Exercises](ReadMe-90-API-Exercises.md) | 

## Introduction

We will be using:

- https://laravelcollective.com/docs/6.x/html
- https://spatie.be/docs/laravel-permission/v5/installation-laravel

## Adding the required packages

Run the following commands to add Spatie's Permissions and the Laravel Collective HTML helper packages.

```shell
sail composer require laravelcollective/html spatie/laravel-permission
```

This may also update some packages already installed due to the requirements of these two new packages.

Open the `config/app.php` file and in the `providers` section add the following line to the package service provider area:

```php
       /*
         * Package Service Providers...
         */
        Spatie\Permission\PermissionServiceProvider::class,
```

Publish the service provider for customisation (as required):

```shell
sail artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Create the seeders for the various tables:

```shell
sail artisan make:seeder PermissionSeeder
```

### Add the seed data 
Remember to import the Spatie Model at the top of the file...

```php
use Spatie\Permission\Models\Permission;
```

Now the seeder, add the following to the `PermissionSeeder.php` file

```php
 $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
```

Remember to edit the DatabaseSeeder file, and add the PermissionSeeder to the top before the Country Seeder.

```php
$this->call([
            PermissionSeeder::class,
            CountrySeeder::class,
```

### Migrate! Migrate! Migrate!
And run the migration and seed (SEPARATELY this time):

```shell
sail artisan migrate --step
sail artisan db:seed --class=PermissionSeeder
```

> Note we are not running the seeder and migration from fresh.


## Create the Required Additional Controllers
Run the following artisan commands:
```shell
sail artisan make:controller RoleController --resource
sail artisan make:controller PermissionController --resource
```

## Adding the middleware

Open the `app/Http/kernel.php` file.

Fine the variable `$routeMiddleware` and after the line:

`'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,`

Add the following three lines to allow us to use the Spatie permission middleware:

```php
'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
```

## Add the Web routes

As roles and permissions management should really only be done at a secure location we will create the routes in the web.php
file.

Add the following:

```php
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
```

## User Controller

To use the roles and permissions we really need to have user administration, so here we go. Let's create a simple User Admin
section for the site.

Open the `/app/Http/Controllers/UserController.php` file.

Edit each of the methods as given:

### UserController - index

In the `index` method add the following code:

```php
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
```

### UserController - create

In the `create` method add the following code:

```php
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
```

### UserController - store

In the `store` method add the following code:

```php
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
```

As an exercise you can create the `StoreUserRequest` and modify the above code.

### UserController - show

In the `show` method add the following code:

```php
public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
```

### UserController - edit

In the `edit` method add the following code:

```php
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
```

### UserController - update

In the `update` method add the following code:

```php
   $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
```

### UserController - destroy

In the `destroy` method add the following code:

```php
User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
```

## Update the imports

Make sure that the `use` lines at the top of the UserController includes each of these:

```php
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Arr;
```

## Adding the Permissions to the Controllers

We need to define the permissions for each controller.

Open the Author Controller, and at the top, add the following `__construct` method definition. It must be placed as the 
FIRST function definition in the class:

```php
    /**
     * Add the permissions during object instantiation.
     *
     */
    function __construct()
    {
        $this->middleware(
            'permission:product-list|product-create|product-edit|product-delete',
            ['only' => ['index', 'show']]
        );
        $this->middleware(
            'permission:product-create',
            ['only' => ['create', 'store']]
        );
        $this->middleware(
            'permission:product-edit',
            ['only' => ['edit', 'update']]
        );
        $this->middleware(
            'permission:product-delete',
            ['only' => ['destroy']]
        );
    }
```

We will need to do the same for the Roles Controller and the Users Controller.

So repeat for these.

## The User Views

Now we need to create the views for the Users, so we can perform our BREAD (aka CRUD) operations:

Create a new folder `users` in the `resources/views` folder.

We are now able to add the index, create, update, show and delete views.

### Users Index
