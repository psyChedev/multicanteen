<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ingredients;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function index($c)
    {
        $canteen=$c;
        $ingredients=Ingredients::where('canteen_id',$c)->get();
        $products=Product::where('canteen_id',$c)->get();
        return view('products.add',compact('ingredients','canteen','products'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pname' => 'required',
            'pimage' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image='storage/'.$request->pimage->store('products','public');
        $product = new Product();
        $product->Product_Name = $request->pname;
        $product->Product_Image = $image;
        $product->canteen_id = $request->cid;
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully');
    }
}
