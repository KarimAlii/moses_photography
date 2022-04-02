@extends('layouts.admin')
@section('content')
<h1 class="text-center">Edit {{$album->name}}'s Name </h1>
<div class="container">
        <form method="post" action="{{route('albums.update',$album->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label class="form-label">Album Name</label>
                <input type="text" class="form-control @error('name') is invalid @enderror" name="name" value="{{$album->name}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Album Category</label>
                <input type="text" class="form-control @error('name') is invalid @enderror" name="category_id" value="{{$album->category_id}}">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
