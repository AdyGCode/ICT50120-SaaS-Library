<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PaginateAPIRequest;
use App\Http\Requests\StoreAuthorAPIRequest;
use App\Http\Requests\UpdateAuthorAPIRequest;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;


/**
 * @group Author API
 *
 * API endpoints for managing authors
 */
class AuthorAPIController extends ApiBaseController
{

    /**
     * Browse the list of all authors
     *
     * @bodyParams
     *
     * @response {
     *      "status": true,
     *      "message": "Retrieved successfully",
     *      "data": {
     *          "authors": [
     *              {
     *                  "id": 1,
     *                  "given_name": "UNKNOWN",
     *                  "family_name": "AUTHOR",
     *                  "is_company": 0,
     *                  "created_at": "2022-09-10T14:45:22.000000Z",
     *                  "updated_at": "2022-09-10T14:45:22.000000Z"
     *              }, ...
     *          }
     *      ]
     * }
     *
     * @return JsonResponse
     */
    public function index(PaginateAPIRequest $request): JsonResponse
    {
        // $authors = Author::all();
        $authors = Author::paginate($request['per_page']);

        return $this->sendResponse(
            $authors,
            "Retrieved successfully."
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

        $authors = Author::create($validated);

        return $this->sendResponse(
            $authors,
            "Created successfully."
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
        $authors = Author::with('books')->find( $id);

        if ($authors->count() > 0) {
            return $this->sendResponse(
                $authors,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Author Not Found");
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
        $authors = Author::query()->where('id', $id)->first();

        if (!is_null($authors) && $authors->count() > 0) {
            $validated['is_company'] = $validated['is_company'] ?? 0;
            if (!isset($validated['given_name'])) {
                $validated['given_name'] = $validated['family_name'];
                $validated['family_name'] = null;
            }

            $authors['given_name'] = $validated['given_name'];
            $authors['family_name'] = $validated['family_name'];
            $authors['is_company'] = $validated['is_company'];
            $authors['updated_at'] = Carbon::now();
            $authors->save();

            return $this->sendResponse(
                $authors,
                "Updated successfully.",
            );

        }
        return $this->sendError("Unable to update: Author Not Found");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $author = Author::query()->where('id', $id)->first();

        $destroyedAuthor = $author;

        if (!is_null($author) && $author->count() > 0) {
            $author->delete();

            return $this->sendResponse(
                $destroyedAuthor,
                "Deleted successfully.",
            );

        }
        return $this->sendError("Unable to remove: Author Not Found");
    }


    /**
     * Search request in the form http://localhost/authors/search with raw JSON sent { "search": "name" }
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $search = $request->get('search');

        $authors = Author::with('books')->where( 'family_name', 'like', "%{$search}%")->get();

        if ($authors->count() > 0) {
            return $this->sendResponse(
                $authors,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Author Not Found");
    }

}
