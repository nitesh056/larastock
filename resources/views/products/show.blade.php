@extends('layouts.app')
@section('title')
	{{$product->name}}
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h4 style="color:red;">Rs.{{$product->rate}}</h4>
			<h2>Qty: {{$product->quantity}}</h2>
			@if(!Auth::guest())
				<div class="row">
					<a href="/products/{{$product->id}}/edit" class="btn btn-primary m-1">Click to Edit</a>
					
					<form action="/products/{{$product->id}}" method="post" class="m-1">
						@csrf
						<input name="_method" type="hidden" value="DELETE">
						<input type="submit" value="Delete" class="btn btn-primary">
					</form>
				</div>
			@endif
			<hr>
			<p>{{$product->description}}</p>
		</div>
		<div class="col-sm-6">
			<img src="/storage/images/{{$product->image}}" class="img-fluid" alt="">
		</div>
	</div>
@endsection