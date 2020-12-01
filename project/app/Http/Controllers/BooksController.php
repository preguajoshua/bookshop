<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::orderBy('title', 'ASC')->paginate(50);
        $authors = Author::all();

        return view('books.index', [
            'books' => $books,
            'authors' => $authors,
        ]);
    }



    public function show($id){
        
        $books = Book::find($id);
        $authors = Author::all();
        return view('books.show', [
            'books' => $books,
            'authors' => $authors,
            
        ]);
    }

    public function store(){
        $books = new Book();

        $books->isbn = request('isbn');
        $books->title = request('title');
        $books->authors_id = request('authors_id');
        $books->pages = request('pages');

        $books->save();

        return redirect('/books')->with('success', 'Book has been added successfully');
    }

    public function update($id){

        $books = Book::find($id);

        $books->isbn = request('isbn');
        $books->title = request('title');
        $books->authors_id = request('authors_id');
        $books->pages = request('pages');

        $books->save();
        return redirect('/books')->with('success', 'Book has been updated successfully');
    }

    public function delete($id){

        $books = Book::find($id);
        $books->delete($books->id);
        return back();
    }
}
