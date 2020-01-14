@extends('layouts.welcome')
@section('content')
	<main class="py-4 container">
		<div class="container text-sm-center py-5">
			<h1 class="display-1">Welcome to<br>larastock</h1>
			@if(Auth::guest())
				<a href="/login" class="btn btn-outline-primary">Login</a>
				<a href="/register" class="btn btn-outline-primary">Register</a>
				<br>
			@endif
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-3">
				<h2>Product:</h2>
				<div class="card shadow">
					<div class="card-body">
						<h4 class="card-title">Total Amount</h4>
						<p class="card-text">
							<h3 class="font-weight-bold text-primary">Rs. {{$totalProductAmount}}</h3>
						</p>
						<a href="/products" class="card-link">See Products</a>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<h2>Transaction:</h2>
				<div class="card-group shadow">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Purchases</h4>
							<p class="card-text">
								<h3 class="font-weight-bold text-primary">Rs. {{$totalPurchaseAmount}}</h3>
							</p>
							<a href="/transactions/purchases" class="card-link">See all Purchases</a>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Sales</h4>
							<p class="card-text">
								<h3 class="font-weight-bold text-primary">Rs. {{$totalSaleAmount}}</h3>
							</p>
							<a href="/transactions/sales" class="card-link">See all Sales</a>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">No. of transaction</h4>
							<p class="card-text">
								<h3 class="font-weight-bold text-primary">{{$totalTransaction}}</h3>
							</p>
							<a href="/transactions" class="card-link">See all Transaction</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection