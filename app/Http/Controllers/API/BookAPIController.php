<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookAPIController extends ApiBaseController
{



    public function show(Book $book)
    {
        $books = Book::with('authors')->find($book);
        if ($books->count() > 0) {
            return $this->sendResponse(
                $books,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Book Not Found");
    }

}
