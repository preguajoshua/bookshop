<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AuthorsController extends Controller
{
    public function index(){

        $author = Author::orderBy('initials', 'ASC')->paginate(50);
        $authors = Author::all();
        $distinctBooks = Book::distinct('title');
        $distinctCountries = Author::distinct('country');
        return view('authors.index', compact('author', 'authors', 'distinctBooks', 'distinctCountries'));
    }

    public function show($id){

        $authors = Author::findOrFail($id);
        $booksOfAuthor =  Book::where('authors_id', $id)->get();
        return view('authors.show', compact('authors', 'booksOfAuthor'));
    }
    
    public function store(){

        $author = Author::create($this->validatedFields());
        $this->storeImage($author);
   
        return redirect('/authors')->with('success', 'Author has been added successfully');
    }

    public function update($id){

        $author = Author::findOrFail($id)->update($this->validatedFields());
        $this->storeImage($author);
        return redirect('/authors')->with('success', 'Author has been updated successfully');
    }

    public function delete($id){
        $author = Author::findOrFail($id);
        $author->delete($author->id);
        return redirect('/authors')->with('success', 'Author has been deleted successfully');
    }

    public function validatedFields(){

        $data = request()->validate([
            'initials' => 'required|min:3',
            'age' => 'required',
            'country' => 'required|min:2',
        ]);

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000'
            ]);
        }

        return $data;
    }

    public function storeImage($author){
        
        if(request()->has('image')){
            $author->update([
                'image' => request()->image->store('uploads','public'),
            ]);
        }
    }
}
