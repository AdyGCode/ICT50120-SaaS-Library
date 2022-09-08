# Making an API I - Reading Data

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

## REST and JSON
As we are creating a RESTful API, we will be returning JSON based results to any request. As against a SOAP based API which 
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

_Remember that `DOMAIN.NAME` in the development environment is going to be `localhost`._

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

| Request                    | Response                                      |
|----------------------------|-----------------------------------------------|
| http://DOMAIN/api/authors  | JSON list of Authors and request result code  |

Edit the AuthorAPIController and add the following to the index method:

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

