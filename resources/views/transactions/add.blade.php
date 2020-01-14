@extends('layouts.app')
@section('title')
	Add Transactions
@endsection
@section('content')
	<form action="/transactions" method="post">
		@csrf
		<div class="form-group">
			<label for="from">Customer/Buyer Name:</label>
			<input type="text" class="form-control" name="from">
		</div>
		<div class="form-group">
			<label for="product">Product Name:</label>
			<select class="custom-select" name="product">
				<option value="" selected>Click to Select any Product</option>
				@foreach($products as $product)
					<option value="{{$product->id}}">{{$product->name}}</option>
				@endforeach
			</select>
			{{-- <input type="text" class="form-control" name="product"> --}}
		</div>
		<div class="form-group row">
			<label for="type" class="col-sm-1 col-form-label">Type</label>
			<div class="col-sm-3">
				<select class="custom-select" name="type">
					<option value="purchase" selected>Purchase</option>
					<option value="sale">Sales</option>
				</select>
			</div>
			<label for="quantity" class="col-sm-1 col-form-label">Quantity</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" name="quantity">
			</div>
			<label for="rate" class="col-sm-1 col-form-label">Rate:</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" name="rate">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Add" class="btn btn-primary">
		</div>
	</form>
@endsection