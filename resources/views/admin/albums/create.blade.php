@extends('layouts.admin')
@section('content')
    <div class="container">
        <form method="post" action="{{route('albums.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label class="form-label">Album Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="images[]" multiple>
                @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Categories</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
