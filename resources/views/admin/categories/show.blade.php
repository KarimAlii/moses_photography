@extends('layouts.admin')
@section('content')
<h1 class="text-center mb-3">Showen Category</h1>
<div class="container">
<table class="table table-success table-striped text-center rounded-3 ">
<thead>
<tr>
    <th scope="col">ID</th>
    <th scope="col">Category</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">{{$category->id}}</th>
    <td>{{$category->category}}</td>
</tr>
</tbody>
</table>
<a href="{{route('categories.index')}}" class="btn btn-primary">Categories Dashboard</a>
</div>
@endsection
