@extends('includes.layouts')
@section('content')


@section('title')
List of Books
@endsection

<div style="padding-top: 20px; padding-bottom: 20px">
  <h2>Lists of Books</h5>
  <a class="btn btn-primary" role="button" href="/books/create">Add new Book</a>
</div>
  
  <div class="row">
    <div class="col-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{ $message }}</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


    @elseif ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p>{{ $errors }}</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="box">
        <!-- <div class="box-header with-border">
          <a href="#addnewBook" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
        </div> -->
        <div class="box-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ISBN #</th>
                <th>Title</th>
                <th>Author</th>
                <th>No of Pages</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              @foreach($books as $book)
                <tr>
                  <td>{{ $book->isbn }}</td>
                  <td><a href="/books/{{$book->id}}/edit">{{ $book->title }}</a></td>
                  <td>{{ $book->author->initials }}</td>
                  <td>{{ $book->pages }}</td>
                  <td>
                        <div class="row">
                            <div class="col-md-4">
                              <a class="btn btn-success btn-sm edit btn-flat" data-id="1" href="/books/{{ $book->id }}/edit"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                            <div class="col-md-8">
                              <form action="/books/{{ $book->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm delete btn-flat" data-id="1" href="/books/{{ $book->id }}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</button>
                              </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tr>
            </tbody>
          </table>
          {{ $books->links() }}
        </div>
      </div>
    </div>
  </div>

  

  @endsection