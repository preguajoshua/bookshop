<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BooksController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * List of all ooks main page
     *
     * @return void
     */
    public function index(){
        
        $books = Book::orderBy('title', 'ASC')->simplePaginate(50);
        $authors = Author::all();

        return view('books.index', compact('books', 'authors'));
    }

    /**
     * Create new Book View
     *
     * @return void
     */
    public function create(){

        $authors = Author::all();
        return view('books.create',[
            'author' => $authors,
        ]);
    }

    /**
     * Show specific book
     *
     * @param [type] $id
     * @return void
     */
    public function show(Book $book){
        $authors = Author::all();
        return view('books.show', compact('book', 'authors'));

    }

    /**
     * Store book function
     *
     * @return void
     */
    public function store(){

        Book::create($this->validatedFields());
        return redirect('/books')->with('success', 'Book has been added successfully');

    }

    /**
     * Update book function
     *
     * @param [type] $id
     * @return void
     */
    public function update(Book $book){

        Book::findOrFail($book->id)->update($this->validatedFields());
        return redirect('/books')->with('success', 'Book has been updated successfully');

    }

    /**
     * Delete specific book
     *
     * @param [type] $id
     * @return void
     */
    public function delete(Book $book){

        $books->delete($books->id);
        return redirect('/books')->with('success', 'Book has been deleted successfully');

    }


    /**
     * Validated Fields
     *
     * @return void
     */
    public function validatedFields(){

        return request()->validate([
            'isbn' => 'unique:books|required|min:13',
            'title' => 'required|min:3',
            'author_id' => 'required|min:1',
            'pages' => 'required|min:1',
        ]);
    }
}
