<?php

namespace App\Http\Controllers;

use App\Models\Mutual_aid_fund;
use Illuminate\Http\Request;

class MutualAidFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['mutual_aid_funds']=Mutual_aid_fund::get();
        
        return view('mutual_aid_fund.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mutual_aid_fund.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mutual_aid_fund= new Mutual_aid_fund();

        $mutual_aid_fund->first_name=$request->first_name;
        $mutual_aid_fund->last_name=$request->last_name;
        $mutual_aid_fund->address=$request->address;
        $mutual_aid_fund->phone_number=$request->phone_number;
        $mutual_aid_fund->save();
        return redirect('/admin/mutual_aid_fund')->withSuccess('Successfully created a user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mutual_aid_fund  $mutual_aid_fund
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['mutual_aid_fund']=Mutual_aid_fund::findOrFail($id);

        return view('mutual_aid_fund.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mutual_aid_fund  $mutual_aid_fund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['mutual_aid_fund']=Mutual_aid_fund::findOrFail($id);

        return view('mutual_aid_fund.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mutual_aid_fund  $mutual_aid_fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id) 
    {
        
        $mutual_aid_fund = Mutual_aid_fund::findOrFail($id);
        $mutual_aid_fund->update([
        'first_name'=>$request->first_name,
       'last_name'=>$request->last_name,
       'address'=>$request->address,
       'phone_number'=>$request->phone_number
        
    ]);
        return redirect('/admin/mutual_aid_fund')->withSuccess('Successfully update a user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mutual_aid_fund  $mutual_aid_fund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mutual_aid_fund = Mutual_aid_fund::findOrFail($id);
        $mutual_aid_fund->delete();
        return redirect('/admin/mutual_aid_fund')->withSuccess('Successfully delete a user');
    }
}
