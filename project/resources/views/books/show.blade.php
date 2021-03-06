@extends('includes.layouts')

@section('title')
Edit {{ $book->title}}
@endsection


@section('content')

<div style="padding-top: 20px; padding-bottom: 20px">
  <h2>Edit Book</h5>
</div>

<div class="section">

    <form class="form-horizontal" method="POST" action="">
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN #</label>
            <input type="text" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') ?? $book->isbn }}" id="isbn" name="isbn" aria-describedby="isbn">

            @error('isbn')
                <p class="text-danger">{{ $errors->first('isbn') }}</p>
            @enderror  
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ??$book->title }}"  id="title" name="title">
            @error('title')
                <p class="text-danger">{{ $errors->first('title') }}</p>
            @enderror  
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <select class="form-control" id="author_id" name="author_id">
                @foreach($authors as $author)
                <option value="{{ $author->id }}" 
                @if($author->id === $book->author->id)
                selected
                @endif
                >{{ $author->initials }} </option>
                @endforeach
            </select>


            @error('author_id')
                <p class="text-danger">{{ $errors->first('author_id') }}</p>
            @enderror  
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Number of Pages</label>
            <input type="text" class="form-control  @error('pages') is-invalid @enderror" value="{{ old('pages') ?? $book->pages }}"  id="pages" name="pages">

            @error('pages')
                <p class="text-danger">{{ $errors->first('pages') }}</p>
            @enderror 
        </div>
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>
 
  

@endsection