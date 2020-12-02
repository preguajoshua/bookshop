@extends('includes.layout')
@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Book
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Book</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <form method="POST" action="">
            <div class="box-body">
              <div class="form-group">
                <label for="inputISBN">ISBN #</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $books->isbn }}" placeholder="ISBN">
              </div>
              <div class="form-group">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $books->title }}" placeholder="Title">
              </div>

              <div class="form-group">
                <label>Author</label>
                <select class="form-control"  name="authors_id" id="authors_id">
                  <option>--Select Author--</option>
                  @foreach($authors as $author)
                  <option value="{{ $author->id }}" 
                    @if($author->id === $books->authors->id)
                    selected
                    @endif
                    >{{ $author->initials }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputPages">Number of Pages</label>
                  <input type="text" class="form-control" id="pages" name="pages" value="{{ $books->pages }}" placeholder="No of Pages">
                </div>
                @csrf
                @method('PATCH')
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> 
  </div>
  @endsection
