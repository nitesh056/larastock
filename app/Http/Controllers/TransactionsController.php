<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;
use App\Transaction;
use App\Product;
use App\User;

class TransactionsController extends Controller
{
    /**
     * Create a new controller instance.
     * Middleware of auth for this controller with exception for index, purchases and sales.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'purchases', 'sales']]);
    }

    /**
     * Display a listing of the transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Displays all purchases data.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchases()
    {
        $transactions = Transaction::where('type', 'purchase')->orderBy('created_at', 'desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Displays all sales data.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        $transactions = Transaction::where('type', 'sale')->orderBy('created_at', 'desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('transactions.add', compact('products'));
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->input('product'));

        // this is for validation of quantity input
        if ($request->input('type')=='sale') {
            $lessThan = '|lte:'.$product->quantity;
        }else{
            $lessThan = '';
        }
        $this->validate($request, [
            'from' => 'required',
            'type' => 'required',
            'product' => 'required',
            'quantity' => 'required|gt:0'.$lessThan,
            'rate' => 'required|gt:0'
        ],[
            'quantity.lte' => $product->quantity.' '.$product->name.' in the stock. Product Quantity will go negative with Quantity = '.$request->input('quantity').'. So, the updated quantity should be less than or equal to '.$product->quantity
        ]);

        $transaction = new Transaction();
        $transaction->from = $request->input('from');
        $transaction->type = $request->input('type');
        $transaction->product_id = $request->input('product');
        $transaction->quantity = $request->input('quantity');
        $transaction->rate = $request->input('rate');
        $transaction->user_id = auth()->user()->id;

        if ($transaction->type == 'purchase') {
            $product->quantity += $transaction->quantity;
            $product->rate = $transaction->rate;
        }else{
            $product->quantity -= $transaction->quantity;
        }
        
        $transaction->save();
        $product->save();
        return redirect('/transactions');
    }

    /**
     * Show the form for editing the specified transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.edit')->with('transaction',$transaction);
    }

    /**
     * Update the specified transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $product = Product::find($transaction->product_id);

        // this is for validation of quantity input
        if ($transaction->type == 'sale' && $transaction->quantity < $request->input('quantity')){
            $quantityValidation = '|lte:'.($product->quantity + $transaction->quantity);
        }elseif($transaction->type == 'purchase' && $transaction->quantity > $request->input('quantity')) {
            $quantityValidation = '|gte:'.($transaction->quantity - $product->quantity);
        }

        $this->validate($request, [
            'from' => 'required',
            'quantity' => 'required'.$quantityValidation,
            'rate' => 'required'
        ],[
            'quantity.lte' => $product->quantity.' '.$product->name.' in the stock. Product Quantity will go negative with Quantity = '.$request->input('quantity').'. So, the updated quantity should be less than or equal to '.($transaction->quantity + $product->quantity),
            'quantity.gte' => $product->quantity.' '.$product->name.' in the stock. Product Quantity will go negative with Quantity = '.$request->input('quantity').'. So, the updated quantity should be greater than or equal to '.($transaction->quantity - $product->quantity)
        ]);

        
        if ($transaction->type == 'purchase') {
            $product->quantity = $product->quantity - $transaction->quantity + $request->input('quantity');
        }else{
            $product->quantity = $product->quantity + $transaction->quantity - $request->input('quantity');
        }
        $product->save();

        $transaction->from = $request->input('from');
        $transaction->quantity = $request->input('quantity');
        $transaction->rate = $request->input('rate');
        $transaction->user_id = auth()->user()->id;
        $transaction->save();
        return redirect('/transactions')->with('success','Updated Successfully!!');
    }

    /**
     * Remove the specified transaction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $product = Product::find($transaction->product_id);
        if ($transaction->type == 'sale') {
            $product->quantity += $transaction->quantity;
        }else{
            $product->quantity -= $transaction->quantity;
        }
        $product->save();
        $transaction->delete();
        return redirect('/transactions')->with('success','Deleted Successfully!!');
    }
    
    /**
     * Downloads the data in xlsx format.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return (new TransactionsExport())->download('transaction-'.date('Y-m-d',time()).'.xlsx');
    }
}
