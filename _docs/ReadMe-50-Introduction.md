# Making a Web Application - Introduction

In this set of tutorials we create a web interface to act as a back-end management system.

The interface will use Blade and TailwindCSS in this initial configuration.


## Tutorial Index
|               Previous               |                Index                 |                 Next                  |
|:------------------------------------:|:------------------------------------:|:-------------------------------------:|
| [Tutorial Index](ReadMe-00-Index.md) | [Tutorial Index](ReadMe-00-Index.md) | [51 Blade and the Homepage](ReadMe-51-Blade-HomePage.md) |

## Static Page Controller

Before we start doing any work with Blade, we are going to create a static page controller.

This controller will then let us show pages such as the 'home', 'contact', 'about' and others as needed.


Create the new controller using:

```shell
sail artisan make:controller StaticPageController
```
Open the app/Http/Controllers/StaticPageController.php file.

In this file we will now create a series of methods for the various static pages.

### Home Page

Add the home method:

```php
    /**
     * Show the Home (index) page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('static.home');

    }
```

## Change the route for home

Open the `/routes/web.php` file and modify the router that says:
```php
Route::get('/', function () {
    return view('home');
});
```

Make the route read:

```php
Route::get('/', [StaticPageController::class, 'home'])->name('home');
```

**Remember** to import the StaticPageController at the top of the page!

At the moment if you visit the `http:\\localhost` you will get an error, but we are on the way to the static pages being 
rendered.
