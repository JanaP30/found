<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends BaseAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transactions' => Transaction::paginate(5)
        ];
        return view('admin.transaction.index', $data);
    }


   
    public function show(Transaction $transaction)
    {
        //
    }

   

}
