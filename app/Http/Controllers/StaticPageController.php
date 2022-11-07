<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Show the Home (index) page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('static.home');

    }

    public function dashboard()
    {
        $user_count = User::count();
        $book_count = Book::count();
        $author_count = Author::count();
        return view('dashboard', compact(
            ['user_count', 'book_count', 'author_count']
        ));
    }
}
