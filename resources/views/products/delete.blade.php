@extends('layouts.app')
@section('title')
	Delete Products
@endsection
@section('content')
	<h1>Delete Product</h1>
	<form action="/products/{{$product->id}}" method="post">
		@csrf
		Are you sure you want to delete <strong>{{$product->name}}</strong>? It will erase all the transactions related to this product!!!
		<br>
		<a href="/products" class="btn btn-secondary">Cancel</a>
		<input name="_method" type="hidden" value="DELETE">
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>
@endsection