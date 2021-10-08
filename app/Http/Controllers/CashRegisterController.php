<?php

namespace App\Http\Controllers;

use App\Models\cash_register;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CashRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cash_register']=Cash_register::get();
        return view('cash_register.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cash_register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cash_register= new cash_register();
        $cash_register->user_id=$request->user_id;
        $cash_register->date_of_payment=Carbon::parse($request->date_of_payment);
        $cash_register->the_amount_of_the_deposit=$request->the_amount_of_the_deposit;
        $cash_register->total_amount=$request->total_amount;
        $cash_register->save();
        return redirect('/cash_register')->withSuccess('Successfully registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['cash_register']=Cash_register::findOrFail($id);
        return view('cash_register.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cash_register']=Cash_register::findOrFail($id);
        return view('cash_register.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cash_register = cash_register::findOrFail($id);
        $cash_register->update([
        'user_id'=>$request->user_id,
        'date_of_payment'=>Carbon::parse($request->date_of_payment),
        'the_amount_of_the_deposit'=>$request->the_amount_of_the_deposit,
        'total_amount'=>$request->total_amount
        ]);
        return redirect('/cash_register')->withSuccess('Successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
