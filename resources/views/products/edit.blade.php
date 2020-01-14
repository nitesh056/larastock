@extends('layouts.app')
@section('title')
	Edit Products
@endsection
@section('content')
	<form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Product Name:</label>
			<input type="text" class="form-control" name="name" value="{{$product->name}}">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea type="text" class="form-control" rows="5" name="description">{{$product->description}}</textarea>
		</div>
		<div class="form-group">
			<label for="rate">Rate:</label>
			<input type="number" class="form-control col-sm-2" name="rate" value="{{$product->rate}}">
		</div>
		<div class="form-group">
			<input type="file" class="form-control-file" name="image">
		</div>
		<input name="_method" type="hidden" value="PUT">
		<div class="form-group">
			<input type="submit" value="Update" class="btn btn-primary">
		</div>
	</form>
@endsection