# Making an API

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

The router will automatically filter the request for the `api` when you send it to a url containing api immediately after 
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

### Retrieving / Testing API calls

There are a number of possible free and commercial products that may be used to test (and document) your API.

Some of these include:
- Postman [https://www.postman.com](https://www.postman.com)
- Katalon [https://katalon.com](https://katalon.com)
- RapidAPI [https://rapidapi.com/products/api-testing/](https://rapidapi.com/products/api-testing/)
- Paw [https://paw.cloud](https://paw.cloud)
- ... []()

Run the Postman Application []()
