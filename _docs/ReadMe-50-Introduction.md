# Making a Web Application - Introduction

In this set of tutorials we create a web interface to act as a back-end management system.

The interface will use Blade and TailwindCSS in this initial configuration.

## Tutorial Index

|                     Previous                     |                Index                 |                           Next                           |
|:------------------------------------------------:|:------------------------------------:|:--------------------------------------------------------:|
| [Web Interface Intro](ReadMe-50-Introduction.md) | [Tutorial Index](ReadMe-00-Index.md) | [51 Blade and the Homepage](ReadMe-51-Blade-Home-Page.md) |

## Adding Interface Helpers

To begin we want to add a few 'plugins' that will give us icons, and other features.

Let's start with FontAwesome, one of the most well known and evolving icon sets that can be used as a desktop application
font, a web font, SVG font, SVG images and more.

### FontAwesome (Free)

Fontawesome has been around for some time. It comes in two main license forms: free and full. The latter is a by 
subscription license that provides (at time of writing) over 19,000+ icons across six styles,in 68 categories. The free 
version provides you with just over 2000 free and open source icons to use. The full list of icons may be found at
[https://fontawesome.com/icons](https://fontawesome.com/icons).

#### Installing the FontAwesome Node plugin

Open the terminal and make sure you are in the main folder of the project.

Enter the command:

```shell
sail npm install @fortawesome/fontawesome-free
```

Open the `app.css` file from the `resources\css` folder

add the following line at the end of the file:

```js
@import "@fortawesome/fontawesome-free/css/all.css";
```

Open the terminal with the `npm run dev` running within it.

Use <kbd>CTRL</kbd>+<kbd>C</kbd> to stop the process.

Re-run the vite CSS/JS compiler using:

```shell
sail npm run dev
```

This should then automatically add the FontAwesome icons to the application's CSS.

## Static Page Controller

Before we start doing any work with Blade, we are going to create a static page controller.

This controller will then let us show pages such as the 'home', 'contact', 'about' and others as needed.

Create the new controller using:

```shell
sail artisan make:controller StaticPageController
```

Open the `app/Http/Controllers/StaticPageController.php` file.

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

**Remember** to import the `StaticPageController` at the top of the page!

At the moment if you visit the `http:\\localhost` you will get an error, but we are
on the way to the static pages being rendered.

## Publishing Package Views

Laravel packages will often contain a range of views that are available for modification/customisation.

This is one of the beautiful features of the framework.

We are going to publish the pagination views, so we are able to make them a bit more unique to our application.

A selection of available views and settings for publishing (if the relevant feature or package is
enabled/installed) are listed below.

From the Health package:

- health-config,
- health-migrations,
- health-translations,
- health-views,
- laravel-health-components

Built into Laravel we have:
- laravel-errors,
- laravel-mail
- laravel-notifications
- laravel-pagination

Sanctum comes with:

- sanctum-config,
- sanctum-migrations

From "Scribe", the API documentation package:

- scribe-config,
- scribe-examples,
- scribe-markdown,
- scribe-themes,
- scribe-views

Run the following commands:

```shell
sail artisan vendor:publish --tag=laravel-pagination
sail artisan vendor:publish --tag=laravel-errors
sail artisan vendor:publish --tag=laravel-mail --tag=laravel-notifications
```

## Modify the tailwind.config File

Open the `tailwind.config.js` file and alter the content section to read:
```js
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.js',
    ],
```
This will allow the pagination view to be updated and the changes take effect.

## Editing the Pagination Views

Dive into the `/resources/views/vendor/pagination` folder.

In here locate and open the `tailwind.blade.php` file.

We are going to do the following:
- add hover colour to the page numbers
- add highlight colour to the current page
- add hover colours to the previous and next buttons

### Active highlights

Use Replace <kbd>CTRL</kbd>+<kbd>R</kbd> (use <kbd>CMD</kbd>+<kbd>R</kbd> on Mac) and:

- search for `active:bg-gray-100` and replace with `active:bg-sky-600`
- search for `active:text-gray-700` and replace with `active:text-gray-700`

### Hover over numbers/arrows

Use Replace <kbd>CTRL</kbd>+<kbd>R</kbd> (use <kbd>CMD</kbd>+<kbd>R</kbd> on Mac) and:

- search for `bg-white` and replace with `bg-gray-50`
- search for `hover:text-gray-500` and replace with `hover:text-sky-50 hover:bg-sky-600`
- search for `hover:text-gray-400` and replace with `hover:text-sky-50 hover:bg-sky-600`

## Change animation period

Use Replace <kbd>CTRL</kbd>+<kbd>R</kbd> (use <kbd>CMD</kbd>+<kbd>R</kbd> on Mac) and:

- search for `duration-150` and replace with `duration-500`

With that we are ready for the next stage.
