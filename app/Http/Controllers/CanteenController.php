<?php

namespace App\Http\Controllers;

use App\Models\canteen;
use App\Models\User;
use Illuminate\Http\Request;

class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $canteens=canteen::all();

        return view('canteen.index',compact('users','canteens'));
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
            'cname' => 'required',
        ]);
        
        $canteen=new canteen();
        $canteen->canteen_name=$request->cname;
        $canteen->user_id=$request->uid;
        $canteen->owner_name=$request->oname;
        $canteen->owner_number=$request->onumber;
        $canteen->save();
        return redirect()->back()->with('success','Canteen Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function show(canteen $canteen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function edit($canteen)
    {
        $canteen_name=canteen::where('id',$canteen)->first();
        $users=User::all();
        return view('canteen.edit',compact('canteen_name','users')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, canteen $canteen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function destroy(canteen $canteen)
    {
        //
    }
}
