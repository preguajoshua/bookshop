<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index(){
        $author = Author::orderBy('initials', 'ASC')->paginate(50);
        $authors = Author::all();

        $cBooks = Book::distinct('title');
        $cCountries = Author::distinct('country');

        return view('authors.index', [
            'authors' => $authors,
            'author' => $author,
            'countBooks' => $cBooks,
            'cCountries' => $cCountries,
        ]);
    }

    
    public function show($id){
        
        $authors = Author::find($id);
        $booksOfAuthor =  Book::where('authors_id', $id)->get();
        
        return view('authors.show', [
            'authors' => $authors,
            'booksOfAuthor' => $booksOfAuthor,
            
        ]);
    }

    public function update($id){

        $author = Author::find($id);

        // $author->firstname = request('firstname');
        $author->lastname = request('lastname');
        $author->initials = request('initials');
        $author->age = request('age');
        $author->country = request('country');
        $author->save();


         return redirect('/authors')->with('success', 'Author has been updated successfully');
    }
    


    public function store(){

        $author = new Author();

        // $author->firstname = request('firstname');
        $author->lastname = request('lastname');
        $author->initials = request('initials');
        $author->age = request('age');
        $author->country = request('country');
        $author->save();


         return redirect('/authors')->with('success', 'Author has been added successfully');
    }

    public function delete($id){

        $author = Author::find($id);
        $author->delete($author->id);
        return back();
    }
}
