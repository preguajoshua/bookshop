@extends('includes.layout')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Books
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Authors</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
      @endif
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnewBook" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ISBN #</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>No of Pages</th>
                  <th>Action</th>
                </thead>
                <tbody>
                @foreach($books as $book)
                 <tr>
                    <td>{{ $book->isbn }}</td>
                    <td><a href="/books/{{$book->id}}">{{ $book->title }}</a></td>
                    <td>{{ $book->authors->initials }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>
                     <!--  <a href="/books/{{ $book->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="glyphicon glyphicon-trash"></i></a> -->
                    </td>
                 </tr>
                 @endforeach
                </tbody>
              </table>


              {{ $books->links() }}


            </div>
          </div>
        </div>
      </div>
      @include('books.modals')
    </section>   
    
    
  </div>


@endsection
