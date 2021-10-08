@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-2">
        <a href="/cash_register" class="btn btn-dark">Back to register</a>
    </div>
    <div class="card">


        <div class="row">
            <div class="col-6">
                <p>User</p>
            </div>
            <div class="col-6">
                <p><strong>{{$cash_register->user_id}}</strong></p>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Date of payment</p>
            </div>
            <div class="col-6">
                <p><strong>{{$cash_register->date_of_payment}}</strong></p>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>The amount of the deposit</p>
            </div>
            <div class="col-6">
                <p><strong>{{$cash_register->the_amount_of_the_deposit}}</strong></p>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Total amount</p>
            </div>
            <div class="col-6">
                <p><strong>{{$cash_register->total_amount}}</strong></p>

            </div>
        </div>
    </div>
</div>

@endsection