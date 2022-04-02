@extends('layouts.admin')
@section('content')
<h1 class="text-center">Albums Dashboard</h1>
<div class="container">
<table class="table text-center">
<thead>
<tr>
    <th scope="col">ID</th>
    <th scope="col">Album</th>
    <th scope="col">Category</th>
    <th scope="col">Images</th>
    <th scope="col">Controls</th>

</tr>
</thead>
<tbody>
@foreach ($albums as $album)
<tr>
    <th scope="row">{{$album->id}}</th>
    <td>{{$album->name}}</td>
    <td>{{$album->category_id}}</td>
    <td><img style="width:5vw; hieght:5vh" src="{{$album->id}}" alt=""></td>
    <td>
        <a href="{{route('albums.show',$album->id)}}" class="btn btn-success">Show</a>
        @if (Auth::user()->role_id==1)
        <a href="{{route('albums.edit',$album->id)}}" class="btn btn-warning">Edit</a>
        <form action="{{route('albums.destroy',$album->id)}}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete" />
        </form>
@else
@endif

    </td>
</tr>
@endforeach
</tbody>
</table>
<a class="mt-3 btn btn-primary" href="{{route('albums.create')}}">
Add Albums
</a>
</div>
@endsection
