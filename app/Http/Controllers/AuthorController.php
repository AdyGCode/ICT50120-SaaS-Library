<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{

    /**
     * Add the permissions during object instantiation.
     *
     */
    function __construct()
    {
        $this->middleware(['auth'], ['except' => ['index', 'show']]);

        // we use author- to represent the 'namespace' for the permission.
        $this->middleware(
            'permission:author-browse|author-read|author-edit|author-add|author-delete',
            ['only' => ['index', 'show', 'store',]]
        );
        $this->middleware(
            'permission:author-add',
            ['only' => ['create', 'store',]]
        );
        $this->middleware(
            'permission:author-edit',
            ['only' => ['edit', 'update',]]
        );
        $this->middleware(
            'permission:author-delete',
            ['only' => ['destroy',]]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact(['authors',]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return redirect()->route('authors.index')
            ->with('success', "Author {$author->fullName()} created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = $author->with('books')->find($author);
        return view('authors.show', compact(['author', 'books',]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact(['author',]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        foreach ($request->validated() as $validKey => $validValue) {
            $author[$validKey] = $validValue;
        }

        $author->save();

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    /**
     * Verify the removal from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function delete(Author $author)
    {
        return view('authors.delete', compact(['author',]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
