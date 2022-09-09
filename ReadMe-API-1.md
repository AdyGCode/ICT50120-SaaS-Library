# Making an API I - Reading Data

This set of tutorials is on how to create an API using Laravel (v9 or later) and Postman (for testing).

You will also add a plugin to document your API dynamically.

## Resources
We are presuming you are using:
- Docker Desktop
- Windows Terminal (or iTerm on Mac)
- Windows Subsystem for Linux v2 (WSL2)
- Ubuntu Linux on WSL2

All code will use PHP 8.1 or later.

## Video Tutorials

The following video tutorials should be used to complement these notes. 
Some should be used to learn how to use a particular method, application 
or system.

There are no guarantees on quality of presentation

### Postman
- [Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU) includes Postman in the process
- [Learn Postman](https://www.youtube.com/playlist?list=PL6iUkDSEH9SvsgM4zyFrTnaewN65NZHAG) 
- [The Basics of Using Postman for API Testing](https://www.youtube.com/watch?v=t5n07Ybz7yI&t=403s)
- [Postman Beginner Tutorial 2022](https://www.youtube.com/playlist?list=PLhW3qG5bs-L9P22XSnRe4suiWL4acXG-g)

### APIs
- [APIs for Beginners](https://www.youtube.com/watch?v=GZvSYJDk-us)
- [APIs and SDKs](https://www.youtube.com/watch?v=kG-fLp9BTRo)
- [REST APIs](https://www.youtube.com/watch?v=lsMQRaeKNDk)
- [REST APIs and Examples](https://www.youtube.com/watch?v=7YcW25PHnAA)
- [What Are APIs? - Simply Explained](https://www.youtube.com/watch?v=OVvTv9Hy91Q)

### Laravel & Laravel API Development
- [Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU)
- [Laravel API Server Full Course - Beginner to Intermediate](https://www.youtube.com/watch?v=_zNi37BJVBk&t=24271s)
- [Laravel 9 for Beginners - Code with Dary](https://www.youtube.com/playlist?list=PLFHz2csJcgk_mM2jEf7t8P678O_jz83on)


### Docker
For those who want to supplement the basics of docker that we use via Laravel's Sail package, the following may proove very useful:
- [Docker Crash Course Tutorial](https://www.youtube.com/playlist?list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7)

### DNS
- [Oblivious DNS - Simply Explained](https://www.youtube.com/watch?v=TFvRp5SUgfE)


### TailwindCSS
Not for this particular tutorial, but help for other tutorials were a back-end admin interface is being developed:

- [TailwindCSS Tutorial - The Net Ninja](https://www.youtube.com/playlist?list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw)
- [TailwindCSS Tutorial - Code with Dary](https://www.youtube.com/playlist?list=PLFHz2csJcgk8lgiRDB7FdsXVr4xy6jE8K)

## Terminology

Before we start on the process, let's get the obligatory terminology out of the way...

| Term              | Definition                                                                                                               |
|-------------------|--------------------------------------------------------------------------------------------------------------------------|
| API               | Application Programming Interface                                                                                        |
| REST              | **Re**presentational **S**tate **T**ransfer                                                                              |
| Endpoint          | This is the "URI" that is used to make a call to an API                                                                  |
| aRoute            | How an API endpoint request is directed to the relevant controller method                                                |
| Resourceful Route | A resourceful route automatically determines the controller and method to use based on the conventions of the framework  |
| JSON              | JavaScript Object Notation                                                                                               |
| XML               | eXtensible Markup Language                                                                                               |
| SOAP              | Simple Object Access Protocol                                                                                            |


## Postman for API Testing & Development
Postman is an applicaiton that will allow you to design and test APIs.

There are a number of alternatives to Postman, including Paw (Mac).

To use Postman you will need to download and install it from [https://www.postman.com/downloads/](https://www.postman.com/downloads/).

To learn how to use Postman the following videos will be useful:

- [The Basics of Using Postman for API Testing](https://www.youtube.com/watch?v=t5n07Ybz7yI) ([https://www.youtube.com/watch?v=t5n07Ybz7yI](https://www.youtube.com/watch?v=t5n07Ybz7yI))
- []() ([]())
- []() ([]())
- []() ([]())


## REST and JSON
As we are creating a **REST**ful **API**, we will be returning JSON based results to any request. As against a SOAP based API which 
communicates via XML.

# Author API

We start with the Author API as we can test what it does easily without referring to the books.

## API Routes

Open the `routes/api.php` file and add the following:

```php
Route::resource('authors', \App\Http\Controllers\API\AuthorAPIController::class);
```

You can also use the following:
```php
Route::resource('authors', AuthorAPIController::class);
```
Remember then to include the class with the other "imports":
```php
use App\Http\Controllers\API\AuthorAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
```

## Automatic API...

The router will automatically filter the request for the `api` when you send it to the URL containing `api` immediately after 
the domain name: `http://DOMAIN.NAME/api`

This means that to make a 'call' to the API for the authors, you will now prepend `authors` with `/api/` like this: 
`http://DOMAIN.NAME/api/authors`.

> Remember that `DOMAIN.NAME` in the development environment is going to be `localhost`.

## API Controller

Create the API controller for the Author:
```shell
sail artisan make:controller API/AuthorAPIController --api --resource
```
This creates a new Controller in the `app/Http/Controllers/API` folder. The API folder was created automatically by `artisan`.

Because we selected the `--api` and `--resource` options we got a "resourceful controller" that removed the front end 
specific methods. We only have _five_ to deal with:

```php
    public function index(){}
    public function store(Request $request){}
    public function show($id){}
    public function update(Request $request, $id){}
    public function destroy($id){}
```

### Index API Method

Let's start by creating the required API call for the `http://DOMAIN/api/authors` endpoint. 

| Request                     | Response                                      |
|-----------------------------|-----------------------------------------------|
| `http://DOMAIN/api/authors` | JSON list of Authors and request result code  |

Edit the `AuthorAPIController` and add the following to the `index` method:

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

- Get all the authors
- return a JSON response with:
  - A message - something to send to the caller that may be displayed as a message to the user
  - The list of authors
  - Response code of 200, OK.

### Show API Method

Our next call is for the `api/authors/{author}` endpoint. This is the one we retrieve a single author.

| Request                              | Response                                             |
|--------------------------------------|------------------------------------------------------|
| `http://DOMAIN/api/authors/{author}` | JSON for the single Authors and request result code  |

Edit the `AuthorAPIController` and add the following to the `show` method:

```php
        $author = Author::query()->where('id', $id)->get();

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
                200  # Ok
            );
        }
        return $response;
```
We `query()` the `Author` model, asking to retrieve the author `where` the `id` is the one passed in the URL.

Next we set up a default response, this being a 404 ("not found") response, with a null for the author and a suitable error message .

Then we check to see if the number of authors found was at least 1 (it should only give 1 or 0),
if it was then the response will be 200 ("Ok") and the author that was found.



## Quick "Brute Force" Test (Not to be used normally)

A quick test of the API so far may be done using a browser window and going to `http://localhost/api/authors` which will show 
a JSON structure with all the authors.

## Exercises

### TODO: Create skeleton for Books API
- Create the resourceful controller skeleton for the Books API
- Create the resourceful route for the Books API

> Remember that the Books API will be API/BooksAPIController.

### TODO: Create Books Index API method
- Edit the API/BooksAPIController and have the index method return ALL books
- Do a "brute force" Test using (`http://localhost/api/books`)[http://localhost/api/books]

### TODO: Create Show One Book API endpoint
- Edit the BooksAPIController and the show method for the Books API
- Make the methods return a single book given the `id` for the book
- Brute force test using (`http://localhost/api/books/45`)[http://localhost/api/books/45]

