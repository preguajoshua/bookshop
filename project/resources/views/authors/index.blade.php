@extends('includes.layouts')
@section('content')


@section('title')
List of Authors
@endsection

<div style="padding-top: 20px; padding-bottom: 20px">
  <h2>Lists of Authors</h5>
  <a class="btn btn-primary" role="button" href="/authors/create">Add new Author</a>
</div>


  <div class="row">
    <div class="col">
      <div class="box">
        <!-- <div class="box-header with-border">
          <a href="#addnewBook" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
        </div> -->
        <div class="box-body">

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
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{ $authors->unique('initials')->count('initials') }}</h3>
                    <p>Authors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div> 
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                      <h3>{{ round($authors->avg('age')) }}</h3>
                    <p>Average Age</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ $averageBooks }}</h3>
                    <p>Average Books</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ $distinctCountries->count() }}</h3>
                    <p>Countries</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div><!-- ./col -->
            </div>

    
            
          <table class="table table-striped">
            <thead>
                <th>#</th>
                <th style="text-align: center;">Profile</th>
                <th>Lastname</th>
                <th>Initials</th>
                <th>Age</th>
                <th>Origin of Country</th>
                <th>No of Pages</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count=1 ?>
                @foreach($authors as $auth)
                 <tr>
                    <td>{{ $count++ }}</td>
                    <td style="text-align: center;">
                      @if($auth->image === null)
                      <img src="{{ asset('storage/uploads/profile.jpg') }}" width="50px" height="50px">
                      @else
                      <img src="{{ asset('storage/'. $auth->image) }}" width="50px" height="50px">
                      @endif
                    </td>
                    <td>{{ $auth->lastname }}</td>
                    <td><a href="/authors/{{ $auth->id }}/edit">{{ $auth->initials }}</a></td>
                    <td>{{ $auth->age }}</td>
                    <td>{{ $auth->country }}</td>
                    <td>
                      @if($auth->pages === NULL)
                        N/A
                      @else
                        {{ $auth->pages }}
                      @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                              <a class="btn btn-success btn-sm edit btn-flat" data-id="1" href="/authors/{{ $auth->id }}/edit"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                            <div class="col-md-8">
                              <form action="/authors/{{ $auth->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm delete btn-flat" data-id="1" href="/authors/{{ $auth->id }}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</button>
                              </form>
                            </div>
                        </div>
                    </td>
                 </tr>
                 @endforeach
                </tbody>
          </table>
          {{ $authors->links() }}
        </div>
      </div>
    </div>
  </div>

  

  @endsection