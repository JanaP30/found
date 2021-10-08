@extends('layouts.app')

@section('content')
<div class="container mt-5">

  <div class="btns-wrapper d-flex justify-content-center flex-row">
    <a href="/cash_register/create ">Create Payment</a>
  </div>
  <table class="table table-hover">

    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">User</th>
        <th></th>
        <th scope="col">Date of payment</th>
        <th scope="col">The amount of the deposit</th>
        <th scope="col">Total amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cash_register as $one_fund)

      <tr>
        <td scope="row"></td>
        <td>{{ $one_fund->user_id }}</td>
        <td></td>
        <td>{{ $one_fund->date_of_payment}}</td>
        <td>{{ $one_fund->the_amount_of_the_deposit}}</td>
        <td>{{ $one_fund->total_amount}}</td>
        <td>
          <a href="/cash_register/edit/{{$one_fund->id }}" class="btn btn-primary btn-sm">Edit </a>
          <a href="/cash_register/show/{{$one_fund->id }}" class="btn btn-primary btn-sm">Show </a>
        </td>


      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection