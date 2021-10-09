<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Balance;
use App\Models\Loan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoanController extends BaseAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'loans' => $this->user->loans()->paginate(5)
        ];
        return view('user.loan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userBalance = Balance::where('user_id', $this->user->id)
                                ->where('type', Balance::$_TYPE_AVAILABLE)
                                ->firstOrFail();

        if($userBalance->total <= 0){
            return redirect('/loans');
        }

        $totalAvailableSum = Balance::where('type', Balance::$_TYPE_AVAILABLE)->sum('total');
       
        
        if($totalAvailableSum <= 0){
            return redirect('/loans');
        }

        $totalSumPart =  $totalAvailableSum * 0.2;
        $userMax = $userBalance->total * 3;

        $maxAmount = min($totalSumPart, $userMax);

        $data = [
            'max_amount' => $maxAmount
        ];

        return view('user.loan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRequest $request)
    {
        $input = $request->input();
        $amount = $input['amount'];
        $description = $input['description'];
        $reservationBalance = Balance::where('type', Balance::$_TYPE_RESERVED)->firstOrFail();
        $userBalance = Balance::where('user_id', $this->user->id)
                                ->where('type', Balance::$_TYPE_AVAILABLE)
                                ->firstOrFail();

        if($userBalance->total <= 0){
            return redirect('/loans');
        }

        $totalAvailableSum = Balance::where('type', Balance::$_TYPE_AVAILABLE)->sum('total');
        $availableBalances = Balance::where('type', Balance::$_TYPE_AVAILABLE)
                                    ->where('user_id', '!=', $this->user->id)->get();
        if($totalAvailableSum <= 0){
            return redirect('/loans');
        }

        $totalSumPart =  $totalAvailableSum * 0.2;
        $userMax = $userBalance->total * 3;

        $maxAmount = min($totalSumPart, $userMax);

        if($amount > $maxAmount){
            return redirect('/loans');
        }

        $loan = Loan::create([
            'user_id' => $this->user->id,
            'amount' => $amount,
            'status' => Loan::$_STATUS_PENDING,
            'description' => $description,
        ]);


        
        $amountFromLoggedUser = min($userBalance->total, $amount);
        $totalAvailableSum = $totalAvailableSum - $amountFromLoggedUser;
        $userBalance->update([
            'total' => $userBalance->total - $amountFromLoggedUser
        ]);
        Transaction::create([
            'user_id' => $this->user->id,
            'amount' => $amountFromLoggedUser,
            'from_balance_id' => $userBalance->id,
            'to_balance_id' => $reservationBalance->id,
            'type' => Transaction::$_TYPE_RESERVATION,
            'transactionable_id' => $loan->id,
            'transactionable_type' => Loan::class
        ]);
        $reservationBalance->update([
            'total' => $reservationBalance->total + $amountFromLoggedUser 
        ]);

        if($amount >= $amountFromLoggedUser){
            foreach ($availableBalances as $balance) {
                $percent = $balance->total * 100 / $totalAvailableSum;
                $amountFromUser = $amount * $percent / 100;
                if($amountFromUser > 0){
                    $balance->update([
                        'total' => $balance->total - $amountFromUser
                    ]);
                    Transaction::create([
                        'user_id' => $balance->user->id,
                        'amount' => $amountFromUser,
                        'from_balance_id' => $balance->id,
                        'to_balance_id' => $reservationBalance->id,
                        'type' => Transaction::$_TYPE_RESERVATION,
                        'transactionable_id' => $loan->id,
                        'transactionable_type' => Loan::class
                    ]);
                    $reservationBalance->update([
                        'total' => $reservationBalance->total + $amountFromUser 
                    ]);
                }
                
            }
        }
        
        return redirect('/loans');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    
}
