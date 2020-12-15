<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AuthorsController extends Controller
{
    /**
     * List of all Authors main page
     *
     * @return void
     */
    public function index()
    {
        $authors = DB::table('authors')
        ->leftJoin('books', 'authors.id', '=', 'books.author_id')
        ->select(
            "authors.id", 
            "authors.initials", 
            "authors.lastname", 
            "books.author_id",
            "authors.image",
            "authors.age",
            "authors.country",
            "books.pages"
        )
        ->selectRaw('round(AVG(books.pages),0) AS pages ')
        ->groupBy('authors.id')
        ->orderBy('books.pages', 'DESC')
        ->simplePaginate(50);

        
        $distinctCountries = Author::distinct('country');
        (int)$averageBooks = round((int)Book::all()->count() / (int) $authors->count(),0);

        return view('authors.index', compact('averageBooks', 'authors', 'distinctCountries'));
    }

    /**
     * Show specific Author in Page
     *
     * @param [type] $id
     * @return void
     */
    public function show(Author $author)
    {
        // dd($author);
        $booksOfAuthor =  Book::where('author_id', $author->id)->get();
        return view('authors.show', compact('author', 'booksOfAuthor'));
    }


    /**
     * Store Author Function
     *
     * @return void
     */
    public function store()
    {

        $author = Author::create($this->validatedFields());
        $this->storeImage($author);

        return redirect('/authors')->with('success', 'Author has been added successfully');
    }
    

    public function create(){
        return view('authors.create');
    }

    /**
     * Update Author Function
     *
     * @param [type] $id
     * @return void
     */
    public function update(Author $author)
    {   
     
        $imageUpdate = Author::findOrFail($author->id)->update($this->validatedFields());
        $this->storeImage($imageUpdate);
        return redirect('/authors')->with('success', 'Author has been updated successfully');
    }

    /**
     * Delete Specific Author
     *
     * @param [type] $id
     * @return void
     */
    public function delete(Author $author)
    {
        $author->delete($author->id);
        return redirect('/authors')->with('success', 'Author has been deleted successfully');
    }

    /**
     * Validated Fields
     *
     * @return void
     */
    public function validatedFields()
    {

        $data = request()->validate([
            'initials' => 'required|min:3',
            'age' => 'required',
            'lastname' => 'required|min:2',
            'country' => 'required|min:2',
        ]);

        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:5000'
            ]);
        }

        return $data;
    }

    /**
     * Store Image Function
     *
     * @param [type] $author
     * @return void
     */
    public function storeImage($author)
    {

        if (request()->has('image')) {
            $author->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    
}
