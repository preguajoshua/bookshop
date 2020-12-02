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
            <div class="box-header with-border">
              <a href="#addNewAuthor" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>

            
            <div class="box-body">


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
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ $distinctBooks->count() }}</h3>
                    <p>Books</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
            </div>
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissable">
                <p>{{ $message }}</p>
              </div>

            @elseif ($message = Session::get('error'))
              <div class="alert alert-warning alert-dismissable">
                  <p>{{ $message }}</p>
              </div>
            @endif
              <table id="tables" class="table table-bordered">
                <thead>
                  <th>#</th>
                  <th>Initials</th>
                  <th>Age</th>
                  <th>Origin of Country</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php $count=1 ?>
                @foreach($author as $auth)
                 <tr>
                   <td>{{ $count++ }}</td>
                    <td><a href="/authors/{{ $auth->id }}">{{ $auth->initials }}</a></td>
                    <td>{{ $auth->age }}</td>
                    <td>{{ $auth->country }}</td>
                    <td>
                      <a href="/authorsdel/{{ $auth->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                 </tr>
                 @endforeach
                </tbody>
              </table>
              {{ $author->links() }}
            </div>
          </div>
        </div>
      </div>
      @include('authors.modals')
    </section>   
  </div>
@endsection