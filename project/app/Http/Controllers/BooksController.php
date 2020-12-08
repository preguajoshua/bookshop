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
        return view('books.index', compact('books', 'authors'));
    }


    public function show($id){

        $books = Book::findOrFail($id);
        $authors = Author::all();
        return view('books.show', compact('books', 'authors'));

    }

    public function store(){

        Book::create($this->validatedFields());
        return redirect('/books')->with('success', 'Book has been added successfully');

    }

    public function update($id){

        Book::findOrFail($id)->update($this->validatedFields());
        return redirect('/books')->with('success', 'Book has been updated successfully');

    }

    public function delete($id){

        $books = Book::findOrFail($id);
        $books->delete($books->id);
        return redirect('/books')->with('success', 'Book has been deleted successfully');

    }

    public function validatedFields(){

        return request()->validate([
            'isbn' => 'required|min:13',
            'title' => 'required|min:3',
            'authors_id' => 'required|min:1',
            'pages' => 'required|min:1',
        ]);
    }
}
