# Making an API - API Base Controller

Having a controller that all the API Controllers are based on helps reduce possible errors when responding to requests. This 
is done by unifying the response structures be it when sending a response or an error.

In this tutorial we will create a base controller and then use it in our Authors API Controller.


## Tutorial Index

|           Previous           |                Index                 |                    Next                    |
|:----------------------------:|:------------------------------------:|:------------------------------------------:|
| [Index-Show](ReadMe-11-index-show.md) | [Tutorial Index](ReadMe-00-Index.md) | [Related Data](ReadMe-13-API-related-data.md) |



## Create the Controller

Run the command:
```shell
 sail artisan make:controller API/ApiBaseController
```

This creates an empty "stub"/"prototype"/"skeleton" controller.

Edit this new file, and add:

```php
/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
```

Now edit the AuthorAPIController and change the class definition line to read:

```php
class AuthorAPIController extends ApiBaseController
```

We will use this in the next step, related data.
