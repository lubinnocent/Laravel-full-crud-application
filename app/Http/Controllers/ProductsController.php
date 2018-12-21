<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use Gate;

class ProductsController extends Controller
{
    
    public function index()
    {
       
        $products = Product::orderBy('product_id','desc')->paginate(8);
        return view('product.index')->with('products',$products);
    }


    public function store(Request $request)
    {
        $this->validate($request, ['product_name' => 'required', 
        'product_price' => 'required'
       ]);

        $data = new Product();
        $data->name = $request->input('product_name');
        $data->price = $request->input('product_price');
        $data->save();
        return back();  
    }


    public function update(Request $request)
    {
        $this->validate($request, ['product_name' => 'required', 
                                       'product_price' => 'required'
                                      ]);

        $data = Product::findOrFail($request->product_id);
        $data->name = $request->input('product_name');
        $data->price = $request->input('product_price');
        $data->save();
        return back()->with('success',$request->input('product_name').' updated');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->delete();
        return back()->with('success',$product->name. ' Deleted!');

    }
}
