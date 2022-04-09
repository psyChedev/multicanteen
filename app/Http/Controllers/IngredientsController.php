<?php

namespace App\Http\Controllers;
use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function index($c)
    {
        $ingredients=Ingredients::where('canteen_id',$c)->get();
        $canteen=$c;
        return view('ingredients.index',compact('canteen','ingredients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'iname' => 'required',
            'iqty' => 'required',
            'imeasure' => 'required',
        ]);

        $ingredient=new Ingredients();
        $ingredient->canteen_id=$request->cid;
        $ingredient->ingredient_name=$request->iname;
        $ingredient->ingredient_quantity=$request->iqty;
        $ingredient->measurement=$request->imeasure;
        $ingredient->save();
        return redirect()->back()->with('success','Ingredient Added Successfully');

    }
}
