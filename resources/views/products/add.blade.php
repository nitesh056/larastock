@extends('layouts.app')
@section('title')
	Add Products 
@endsection
@section('content')
	<form action="/products" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Product Name:</label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea type="text" class="form-control" rows="5" name="description"></textarea>
		</div>
		<div class="form-group">
			<label for="rate">Rate:</label>
			<input type="number" class="form-control col-sm-2" name="rate">
		</div>
		<div class="form-group">
			<input type="file" class="form-control-file" name="image">
		</div>
		<br><br>
		<div class="form-group">
			<input type="submit" value="Add" class="btn btn-primary">
		</div>
	</form>
@endsection