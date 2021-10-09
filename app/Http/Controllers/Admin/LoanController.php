<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Models\Loan;
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

}