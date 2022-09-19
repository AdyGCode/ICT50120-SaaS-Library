<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorAPIRequest;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $authors = Author::all();
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
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
        return response()->error(404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
        return response()->error(404);

    }
}
