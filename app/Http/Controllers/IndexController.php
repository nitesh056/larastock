<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;

class indexController extends Controller
{
    public function index()
    {
    	$totalProductAmount = $this->getTotalProductAmount();
    	$totalPurchaseAmount = $this->getTotalPurchaseAmount();
    	$totalSaleAmount = $this->getTotalSaleAmount();
    	$totalTransaction = Transaction::count();
    	return view('index', compact('totalProductAmount','totalPurchaseAmount','totalSaleAmount', 'totalTransaction'));
    }

    public function getTotalProductAmount()
    {
    	$total = 0;
    	$products = Product::all();
    	foreach ($products as $product) {
    		$total += $product->getAmount();
    	}
    	return $total;
    }

    public function getTotalPurchaseAmount()
    {
    	$total = 0;
    	$transactions = Transaction::where('type', 'purchase')->get();
    	foreach ($transactions as $transaction) {
    		$total += $transaction->getAmount();
    	}
    	return $total;
    }

    public function getTotalSaleAmount()
    {
    	$total = 0;
    	$transactions = Transaction::where('type', 'sale')->get();
    	foreach ($transactions as $transaction) {
    		$total += $transaction->getAmount();
    	}
    	return $total;
    }
}
