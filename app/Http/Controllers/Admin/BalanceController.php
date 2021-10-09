<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends BaseAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'balances' => Balance::paginate(5)
        ];
        return view('admin.balance.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
