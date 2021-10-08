@extends('layouts.app')

@section('content')

<div class="container mt-5">
<div class="row d-flex justify-content-center">
        <selection class="col-md-5">
            <div class="card mb-3">

                <div class="card-body">
                    <h5 class="card-title">Updates information of user</h5>


                </div>
            </div>
            {!! Form::open(['route' => ['cash-register-update', $cash_register->id], 'method' =>'POST']) !!}

            <div class="form-group">
                <label>User</label>
                <input value="{{$cash_register->user_id}}" name="user_id" type="text" class="form-control"
                    placeholder="Enter the User name">
            </div>
            <div class="form-group">
                <label>Date of payment</label>
                <input value="{{$cash_register->date_of_payment}}" name="date_of_payment" type="number"
                    class="form-control" placeholder="Enter the date of payment">
            </div>
            <div class="form-group">
                <label>The amount of the deposit</label>
                <input value="{{$cash_register->the_amount_of_the_deposit}}" name="the_amount_of_the_deposit"
                    type="number" class="form-control" placeholder="Enter the amount of the deposit">
            </div>
            <div class="form-group">
                <label>Total amount</label>
                <input value="{{$cash_register->total_amount}}" name="total_amount" type="number" class="form-control"
                    placeholder="Enter the total amount">
            </div>
            <input type="submit" class="btn btn-info" value="Update">
            <input type="reset" class="btn btn-warning" value="Reset">
            {!! Form::close() !!}
        </selection>
    </div>
</div>
@endsection