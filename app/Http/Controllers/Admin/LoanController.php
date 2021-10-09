<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Http\Requests\RejectLoan;
use App\Models\Balance;
use App\Models\Loan;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
            'loans' => Loan::paginate(5)
        ];
        return view('admin.loan.index', $data);
    }

   
    public function show(Loan $loan)
    {
        //
    }

    public function approveLoan($id){
        $loan = Loan::findOrFail($id);
        if(!$loan->isInPendingStatus()){
            return redirect('/admin/loans');
        }

        $reservationBalance = Balance::where('type', Balance::$_TYPE_RESERVED)->firstOrFail();

        $loan->update([
            'status' => Loan::$_STATUS_APPROVED
        ]);

        $reservationBalance->update([
            'total' => $reservationBalance->total - $loan->amount
        ]);

        Transaction::create([
            'user_id' => $loan->user_id,
            'amount' => $loan->amount,
            'from_balance_id' => $reservationBalance->id,
            'type' => Transaction::$_TYPE_LOAN,
            'transactionable_id' => $loan->id,
            'transactionable_type' => Loan::class
        ]);

        return redirect('/admin/loans');
    }

    public function rejectLoan($id){
        $loan = Loan::findOrFail($id);
        if(!$loan->isInPendingStatus()){
            return redirect('/admin/loans');
        }
        
        $data = [
            'loan' => $loan
        ];

        return view('admin.loan.reject', $data);
    }

    public function postRejectLoan(RejectLoan $request, $id){
        $loan = Loan::findOrFail($id);
        if(!$loan->isInPendingStatus()){
            return redirect('/admin/loans');
        }
        $input = $request->input();
        $rejectReason = $input['reject_reason'];

        $loan->update([
            'status' => Loan::$_STATUS_REJECTED,
            'admin_response' => $rejectReason
        ]);

        foreach ($loan->transactions as $tx) {
            Transaction::create([
                'user_id' => $tx->user_id,
                'amount' => $tx->amount,
                'from_balance_id' => $tx->to_balance_id,
                'to_balance_id' => $tx->from_balance_id,
                'type' => Transaction::$_TYPE_REFUND,
                'transactionable_id' => $loan->id,
                'transactionable_type' => Loan::class
            ]);

            $tx->fromBalance->update([
                'total' => $tx->fromBalance->total + $tx->amount
            ]);

            $tx->toBalance->update([
                'total' => $tx->toBalance->total - $tx->amount
            ]);
        }

        return redirect('/admin/loans');
    }

}