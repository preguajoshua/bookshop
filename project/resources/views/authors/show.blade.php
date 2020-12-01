@extends('includes.layout')
@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Authors
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Authors</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="">
              <!-- <div class="form-group">
                  <label for="inputISBN">First Name</label>
                  <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $authors->isbn }}" placeholder="ISBN">
                </div> -->
                <div class="form-group">
                  <label for="inputTitle">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $authors->lastname }}" placeholder="Last Name">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Initials</label>
                  <input type="text" class="form-control" id="initials" name="initials" value="{{ $authors->initials }}" placeholder="Initials">
                </div>
                <div class="form-group">
                  <label for="inputTitle">Age</label>
                  <input type="text" class="form-control" id="age" name="age" value="{{ $authors->age }}" placeholder="Age">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Country</label>
                  <input type="text" class="form-control" id="country" name="country" value="{{ $authors->country }}" placeholder="Country">
                </div>
                @csrf
                @method('PATCH')

                <div class="modal-footer">

                  <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>

                </div>
              </form>


              <div class="form-group">
                <label for="inputISBN">List of Books Published</label>
                <ul>
                  @foreach($booksOfAuthor as $booksOfAuthors)
                    <li>{{ $booksOfAuthors->title }}</li>
                  
                  @endforeach
                </ul>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>   
    
    
  </div>
  @endsection
