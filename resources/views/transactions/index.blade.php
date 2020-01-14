@extends('layouts.app')
@section('title')
	Transactions
@endsection
@section('content')
	@if(!Auth::guest())
		<a href="/transactions/create" class="btn btn-dark" style="margin: 10px 0;">Add transaction</a>
	@endif
	<a href="/transactions/export" class="btn btn-dark" style="margin: 10px 0;">Export all</a>

	<br>
	<div class="btn-group">
		<a href="/transactions" class="btn btn-secondary">All</a>
		<a href="/transactions/purchases" class="btn btn-secondary">Purchases</a>
		<a href="/transactions/sales" class="btn btn-secondary">Sales</a>
	</div>
	<br><br>
	@if(count($transactions) > 0)
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Product Name</th>
					<th>Added By</th>
					<th>Created At</th>
					<th>Type</th>
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
				@foreach($transactions as $transaction)
					<tr>
						<td>{{$num++}}</td>
						<td>{{$transaction->from}}</td>
						<td>{{$transaction->product->name}}</td>
						<td>{{$transaction->user->name}}</td>
						<td>{{$transaction->created_at}}</td>
						<td>{{$transaction->type}}</td>
						<td>{{$transaction->quantity}}</td>
						<td>{{$transaction->rate}}</td>
						<td>{{$transaction->getAmount()}}</td>
						@if(!Auth::guest())
							<td><a href="/transactions/{{$transaction->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
								
								<form action="/transactions/{{$transaction->id}}" method="post" class="d-sm-inline-block">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<input type="submit" value="Delete" class="btn btn-primary btn-sm">
								</form>
							</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="jumbotron"><h1>Transaction not found!!!</h1></div>
	@endif
@endsection