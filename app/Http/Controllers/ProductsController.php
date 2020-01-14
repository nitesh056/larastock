<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Product;
use App\User;
use App\Transaction;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     * Middleware of auth for this controller with exception for index and show.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','export']]);
    }

    /**
     * Display a listing of products.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.add');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().".".$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = 0;
        if ($request->input('rate') == '') {
            $product->rate = 0;
        } else {
            $product->rate = $request->input('rate');
        }
        $product->user_id = auth()->user()->id;
        $product->image = $fileNameToStore;
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified product in a certain view.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if ($request->input('rate') == '') {
            $product->rate = 0;
        } else {
            $product->rate = $request->input('rate');
        }
        $product->user_id = auth()->user()->id;

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().".".$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $product->image = $fileNameToStore;
        }
        $product->save();
        return redirect('/products/'.$product->id)->with('success','Updated Successfully!!');
    }

    /**
     * Show the choice for deleting the specified product with its transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        return view('products.delete')->with('product',$product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $transactions = Transaction::where('product_id', $id)->get();
        foreach ($transactions as $transaction) {
            $transaction->delete();
        }
        if($product->image != 'noimage.jpg'){
            Storage::delete('public/images/'.$product->image);
        }
        $product->delete();
        return redirect('/products')->with('success','Product Deleted Successfully!!');
    }

    /**
     * Downloads all the data for product in xlsx format.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return (new ProductsExport())->download('products-'.date('Y-m-d',time()).'.xlsx');
    }
}
