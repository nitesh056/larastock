@extends('layouts.app')
@section('title')
	Products
@endsection
@section('content')
	@if(!Auth::guest())
		<a href="products/create" class="btn btn-dark" style="margin: 10px 0;">Add Product</a>
	@endif
	<a href="products/export" class="btn btn-dark" style="margin: 10px 0;">Export</a>
	@if(count($products) > 0)
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Added/Last edited by</th>
					<th>Quanity</th>
					<th>Rate</th>
					<th>Total Amount</th>
					@if(!Auth::guest())
						<th>Edit</th>
					@endif
				</tr>
			</thead>
			<tbody>
				<?php $num=1; ?>
				@foreach($products as $product)
					<tr>
						<td>{{$num++}}</td>
						<td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
						<td>{{$product->User->name}}</td>
						<td>{{$product->quantity}}</td>
						<td>{{$product->rate}}</td>
						<td>{{$product->getAmount()}}</td>
						@if(!Auth::guest())
							<td><a href="/products/{{$product->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
							<a href="/products/{{$product->id}}/delete" class="btn btn-primary btn-sm d-sm-inline-block">Delete</a></td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="jumbotron"><h1>Product not found!!!</h1></div>
	@endif
@endsection