@extends('layouts.app')

@section('content')
{!! Form::open(['url' => 'cash_register/store', 'method' => 'post']) !!}
  @csrf
  <div class="container mt-5 pt-4">
    <div class="row">

      <div class="col">
        <input type="text" class="form-control" name='user_id' placeholder="User" aria-label="User">
      </div>

      <div class="col">
        <input type="text" class="form-control" name='date_of_payment' placeholder="Date of payment" aria-label="Date of payment">
      </div>

      <div class="col">
        <input type="number" class="form-control" name='the_amount_of_the_deposit' placeholder="The amount of the deposit" step='1' aria-label="The amount of the deposit">
      </div>

      <div class="col">
        <input type="number" class="form-control" name='total_amount' placeholder="Total amount" step='1' aria-label="Total amount">
      </div>

      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>

    </div>
  </div>

{!! Form::close() !!}
@endsection