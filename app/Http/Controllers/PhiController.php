<?php

namespace App\Http\Controllers;

use App\Models\phi;
use App\Models\Product;
use App\Models\Ingredients;
use Illuminate\Http\Request;

class PhiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($p)
    {
        $table_ingredients=array();
        $phi=0;
        $products=Product::where('id',$p)->get();
        $cid="";
        foreach($products as $p){
           $cid=$p->canteen_id;
           $phi=$p->id;
        }
        $count=0;
        $phis=phi::where('product_id',$phi)->get();
        foreach($phis as $phi){
            $temp=Ingredients::where('id',$phi->ingredient_id)->get();
            foreach($temp as $t){
                $table_ingredients[$count]=$t->ingredient_name;
                $count=$count+1;
            }
        }
        $ingredients=Ingredients::where('canteen_id',$cid)->get();
        return view('phi.add',compact('p','products','ingredients','phis','table_ingredients'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pid' => 'required',
        ]);
        
        foreach($request->iname as $key=>$value){
          $phi=new phi();
          $phi->product_id= $request->pid;
          $phi->ingredient_id=$request->iname[$key];
          $phi->quantity=$request->inq[$key];
          $phi->measurement=$request->imeasure[$key];
          $phi->save();
        }

        return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phi  $phi
     * @return \Illuminate\Http\Response
     */
    public function show(phi $phi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phi  $phi
     * @return \Illuminate\Http\Response
     */
    public function edit(phi $phi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phi  $phi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phi $phi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phi  $phi
     * @return \Illuminate\Http\Response
     */
    public function destroy(phi $phi)
    {
        //
    }
}
