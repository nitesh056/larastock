@extends('layouts.app')
@section('title')
	Edit Transactions
@endsection
@section('content')
	<form action="/transactions/{{$transaction->id}}" method="post">
		@csrf
		<div class="form-group">
			<label for="from">Customer/Buyer Name:</label>
			<input type="text" class="form-control" name="from" value="{{$transaction->from}}">
		</div>
		<div class="form-group row">
			<label for="quantity" class="col-sm-1 col-form-label">Quantity</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" name="quantity" value="{{$transaction->quantity}}">
			</div>
			<label for="rate" class="col-sm-1 col-form-label">Rate:</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" name="rate" value="{{$transaction->rate}}">
			</div>
		</div>
		<input name="_method" type="hidden" value="PUT">
		<div class="form-group">
			<input type="submit" value="Add" class="btn btn-primary">
		</div>
	</form>
@endsection