@extends('includes.layouts')

@section('title')
Edit {{ $author->initials }}
@endsection


@section('content')

<div style="padding-top: 20px; padding-bottom: 20px">
  <h2></h5>
</div>

<div class="section">

    <div class="row">
        <div class="col-md-8">
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="isbn" class="form-label strong font-weight-bold">Initials</label>
                <input type="text" class="form-control" id="initials" name="initials"  value="{{ old('isbn') ?? $author->initials }}" aria-describedby="isbn">
                @error('initials')
                <p class="help text-danger">{{ $errors->first('initials') }}</p>
            @enderror   
            </div>
            <div class="mb-3">
                <label for="title" class="form-label strong font-weight-bold">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') ?? $author->lastname }}">
                @error('lastname')
                    <p class="help text-danger">{{ $errors->first('lastname') }}</p>
                @enderror  
            </div>
            
            <div class="mb-3">
                <label for="title" class="form-label strong font-weight-bold">Age</label>
                <input type="texxt" class="form-control" id="age" name="age" value="{{ old('age') ?? $author->age }}">
                @error('age')
                    <p class="help text-danger">{{ $errors->first('age') }}</p>
                @enderror  
            </div>
            <div class="mb-3">
                <label for="title" class="form-label strong font-weight-bold">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country') ?? $author->country }}">
                @error('country')
                    <p class="help text-danger">{{ $errors->first('country') }}</p>
                @enderror  
            </div>

            <div class="mb-3">
                <label for="profile" class="form-label strong font-weight-bold">Profile Image</label>
                <input type="file" id="image" name="image">
                
            </div>
            @csrf
            @method('PATCH')
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>

        <div class="col-md-4">
            <div class="text-center">
                <!-- <img src="{{ asset('storage/'. $author->image) }}" class="rounded" alt="Profile" width="200" height="200"> -->
                @if($author->image === null)
                    <img src="{{ asset('storage/uploads/profile.jpg') }}" width="200" height="200">
                @else
                    <img src="{{ asset('storage/'. $author->image) }}" width="200" height="200">
                @endif
            </div>
            <div class="card mb-4 box-shadow mt-2">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Books Published ( {{ $booksOfAuthor->count() }} ) </h4>
                    <h1></h1>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-2">
                        @forelse($booksOfAuthor as $booksOfAuthors)
                        <li>- {{ $booksOfAuthors->title }}</li>
                        @empty
                            <li>No books written by author</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

</div>
 
  

@endsection