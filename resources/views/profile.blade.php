@extends('layouts.app')
@section('title')
    {{Auth::user()->name}}
@endsection
@section('content')
    <br><br>
    <h3>Products added/edited by you</h3>
    <a href="products/create" class="btn btn-dark" style="margin: 10px 0;">Add More</a>
    @if(count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Quanity</th>
                    <th>Rate</th>
                    <th>Total Amount</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $num=1; ?>
                @foreach($products as $product)
                    <tr>
                        <td>{{$num++}}</td>
                        <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->rate}}</td>
                        <td>{{$product->getAmount()}}</td>
                        <td><a href="/products/{{$product->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/products/{{$product->id}}/delete" class="btn btn-primary btn-sm d-sm-inline-block">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="jumbotron"><h1>Product not found!!!</h1></div>
    @endif

    <br><br>
    <h3>Transaction Added by you</h3>
    <a href="transactions/create" class="btn btn-dark" style="margin: 10px 0;">Add transaction</a>
    @if(count($transactions) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Product Name</th>
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
