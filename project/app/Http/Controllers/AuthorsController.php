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
        $distinctBooks = Book::distinct('title');
        $distinctCountries = Author::distinct('country');

        return view('authors.index', [
            'authors' => $authors,
            'author' => $author,
            'distinctBooks' => $distinctBooks,
            'distinctCountries' => $distinctCountries,
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
        $data = request()->validate([
            'lastname' => 'required|min:3',
            'initials' => 'required|min:3',
            'age' => 'required',
            'country' => 'required|min:2',
        ]);
        $author = Author::find($id);
        $author->lastname = request('lastname');
        $author->initials = request('initials');
        $author->age = request('age');
        $author->country = request('country');
        $author->save();
        

        return redirect('/authors')->with('success', 'Author has been updated successfully');
    }
    
    public function store(){

        $data = request()->validate([
            'lastname' => 'required|min:3',
            'initials' => 'required|min:3',
            'age' => 'required|min:1',
            'country' => 'required|min:2',
        ]);
        Author::create($data);
        return redirect('/authors')->with('success', 'Author has been added successfully');
    }

    public function delete($id){
        $author = Author::find($id);
        $author->delete($author->id);
        return redirect('/authors')->with('success', 'Author has been deleted successfully');
    }
}