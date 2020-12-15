@extends('includes.layouts')

@section('title')
Create New Book
@endsection


@section('content')

<div style="padding-top: 20px; padding-bottom: 20px">
  <h2>Add New Book</h5>
</div>

<div class="section">

    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ISBN" class="form-label">Initials</label>
            <input type="text" class="form-control @error('initials') is-invalid @enderror" value="{{ old('initials') }}" id="initials" name="initials" aria-describedby="isbn">

            @error('initials')
                <p class="help text-danger">{{ $errors->first('initials') }}</p>
            @enderror   
        </div>
        <div class="mb-3">
            <label for="Lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" id="lastname" name="lastname">

            @error('lastname')
                <p class="help text-danger">{{ $errors->first('lastname') }}</p>
            @enderror  
        </div>
        
        <div class="mb-3">
            <label for="title" class="form-label">Age</label>
            <input type="texxt" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}">
            @error('age')
                <p class="help text-danger">{{ $errors->first('age') }}</p>
            @enderror  
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Country</label>
            <input type="texxt" class="form-control  @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}">

            @error('country')
                <p class="help text-danger">{{ $errors->first('country') }}</p>
            @enderror  
        </div>

        <div class="mb-3">
            <label for="profile" class="form-label">Profile Image</label>
            <input type="file" id="image" name="image">
            
          </div>

        @csrf
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>
 
  

@endsection