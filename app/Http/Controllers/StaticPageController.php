<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;

class StaticPageController extends Controller
{
    /**
     * Show the Home (index) page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        // Search area here

        $random_books = Book::inRandomOrder()
            ->limit(2)
            ->get();
        $latest_books = Book::latest()->take(3)->get();
        $random_authors = Author::inRandomOrder()
            ->limit(3)
            ->get();
//        $random_genres = Genre::latest()->take(2)->get();


        return view('static.home', compact(['random_authors', 'random_books', 'latest_books']));

    }

    public function dashboard()
    {
        $user_count = User::count();
        $book_count = Book::count();
        $author_count = Author::count();
        return view('static.dashboard', compact(
            ['user_count', 'book_count', 'author_count']
        ));
    }
}
