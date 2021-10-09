<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Http\Requests\CreateDepositRequest;
use App\Models\Balance;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends BaseAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'deposits' => Deposit::paginate(5)
        ];
        return view('admin.deposit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [
            'users' => User::where('type', '!=', User::$_TYPE_ADMIN)->pluck('email', 'id')
        ];

        return view('admin.deposit.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepositRequest $request)
    {
        $input = $request->input();
        $selectedUser = User::findOrFail($input['user_id']);

        if($selectedUser->isAdmin()){
            return back();
        }
        $dateOfDeposit = $input['date_of_deposit'];
        $amount = $input['amount'];
        $balance = Balance::where('user_id', $selectedUser->id)->where('type', Balance::$_TYPE_AVAILABLE)->firstOrFail();
        $totalAfterDeposit = $balance->total + $amount;
        $deposit = Deposit::create([
            'user_id' =>  $selectedUser->id,
            'date_of_deposit' =>$dateOfDeposit,
            'amount' => $amount 
        ]);
        $balance->update([
            'total' => $totalAfterDeposit
        ]);
        Transaction::create([
            'user_id' => $selectedUser->id,
            'amount' => $amount,
            'to_balance_id' => $balance->id,
            'type' => Transaction::$_TYPE_DEPOSIT,
            'transactionable_id' => $deposit->id,
            'transactionable_type' => Deposit::class
        ]);
        

        return redirect('/admin/deposits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

}
