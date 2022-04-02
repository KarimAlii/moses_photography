@extends('layouts.admin')
@section('content')
<h1 class="text-center mb-3">Showen Product</h1>
<div class="container">
<table class="table table-success table-striped text-center rounded-3 ">
<thead>
<tr>
    <th scope="col">ID</th>
    <th scope="col">Product</th>
    <th scope="col">Price</th>
    <th scope="col">Image</th>
    <th scope="col">Category</th>

</tr>
</thead>
<tbody>
<tr>
<th scope="row">{{$product->id}}</th>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->image}}</td>
    <td>{{$product->category_id}}</td>

</tr>
</tbody>
</table>
<a href="{{route('products.index')}}" class="btn btn-primary">Products Dashboard</a>
</div>
@endsection
