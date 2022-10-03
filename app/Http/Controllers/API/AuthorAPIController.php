<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateAPIRequest;
use App\Http\Requests\StoreAuthorAPIRequest;
use App\Http\Requests\UpdateAuthorAPIRequest;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


/**
 * @group Author API
 *
 * API endpoints for managing authors
 */
class AuthorAPIController extends Controller
{

    /**
     * Browse the list of all authors
     *
     * @bodyParams
     *
     * @response {
     *      "status": true,
     *      "message": "Retrieved successfully",
     *      "authors": "authors": [
     *          {
     *              "id": 1,
     *              "given_name": "UNKNOWN",
     *              "family_name": "AUTHOR",
     *              "is_company": 0,
     *              "created_at": "2022-09-10T14:45:22.000000Z",
     *              "updated_at": "2022-09-10T14:45:22.000000Z"
     *          }, ...
     *      ]
     * }
     *
     * @return JsonResponse
     */
    public function index(PaginateAPIRequest $request): JsonResponse
    {
        // $authors = Author::all();
        $authors = Author::paginate($request['per_page']);

        return response()->json(
            [
                'status' => true,
                'message' => "Retrieved successfully.",
                'authors' => $authors
            ],
            200
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAuthorAPIRequest $request
     * @return JsonResponse
     */
    public function store(StoreAuthorAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['is_company'] = $validated['is_company'] ?? 0;

        /*  Option 1:  Move given name into blank family name.
         *
         *  If using this option, remove the Option 2 block
         *  and uncomment the code below
         */
        // if (!isset($validated['family_name']) ) {
        //     $validated['family_name'] = $validated['given_name'];
        //     $validated['given_name'] = null;
        // }


        /*  Option 2:  Move family name into blank given name.
         *
         *  If using this option, remove the Option 1 block
         *  and uncomment the code below
         */
        if (!isset($validated['given_name'])) {
            $validated['given_name'] = $validated['family_name'];
            $validated['family_name'] = null;
        }

        $author = Author::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => "Created successfully.",
                'data' => [
                    'authors' => $author,
                ],
            ],
            200
        );
    }

    /**
     * Retrieve an author
     *
     * Given a URL parameter of the ID of an Author, the author's details are returned with status 200
     *
     * If the Author ID is invalid then a status code of 404 is returned.
     *
     * @param int $id
     * @return JsonResponse
     */
    #[UrlParam("id", "int", "The author's ID.", required: true, example: 7)]
    #[Response('"authors": [{"id": 7,"given_name": "Kevin","family_name": "Potts","is_company": 0,"created_at": "2022-09-10T14:45:22.000000Z","updated_at": "2022-09-10T14:45:22.000000Z"}]', 200, "Retrieved successfully.")]
    #[ResponseField("status", "Success or failure indicator.")]
    #[ResponseField("message", "Accompanying message for the status result.")]
    #[ResponseField("authors", "The author details.")]
    public function show(int $id): JsonResponse
    {
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAuthorAPIRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAuthorAPIRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        $author = Author::query()->where('id', $id)->first();
        $response = response()->json(
            [
                'status' => false,
                'message' => "Unable to update: Author Not Found",
                'authors' => null
            ],
            404  # Not Found
        );

        if (!is_null($author) && $author->count() > 0) {
            $validated['is_company'] = $validated['is_company'] ?? 0;
            if (!isset($validated['given_name'])) {
                $validated['given_name'] = $validated['family_name'];
                $validated['family_name'] = null;
            }

            $author['given_name'] = $validated['given_name'];
            $author['family_name'] = $validated['family_name'];
            $author['is_company'] = $validated['is_company'];
            $author['updated_at'] = Carbon::now();
            $author->save();

            $response = response()->json(
                [
                    'status' => true,
                    'message' => "Updated successfully.",
                    'authors' => $author
                ],
                200  # Ok
            );
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public
    function destroy(int $id)
    {
        $author = Author::query()->where('id', $id)->first();

        $destroyedAuthor = $author;
        $response = response()->json(
            [
                'status' => false,
                'message' => "Unable to delete: Author Not Found",
                'authors' => null
            ],
            404  # Not Found
        );

        if (!is_null($author) && $author->count() > 0) {
            $author->delete();

            $response = response()->json(
                [
                    'status' => true,
                    'message' => "Author deleted.",
                    'authors' => $destroyedAuthor
                ],
                200  # Ok
            );
        }

        return $response;
    }
}
