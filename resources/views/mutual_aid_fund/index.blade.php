@extends('layouts.app')

@section('content')
<!-- <caption>List of users</caption> -->

<div class="container h-100 d-flex flex-column align-items-center mt-5 pt-5">
  <div class="btns-wrapper w-100 d-flex justify-content-between flex-row">
    <a href="/admin/mutual_aid_fund/create">Create user</a>
    <a href="/cash_register">CASH REGISTER</a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">First Name</th>
          <th></th>
          <th scope="col">Last Name</th>
          <th scope="col">Address</th>
          <th scope="col">Phone number</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($mutual_aid_funds as $one_fund)
        <tr>
          <td scope="row"></td>
          <td>{{ $one_fund->first_name }}</td>
          <td></td>
          <td>{{ $one_fund->last_name }}</td>
          <td>{{ $one_fund->address }}</td>
          <td>{{ $one_fund->phone_number}}</td>
          <td>
            <a href="/admin/mutual_aid_fund/{{$one_fund->id }}/edit" class="btn btn-primary btn-sm">Edit </a>
            <a href="/admin/mutual_aid_fund/{{$one_fund->id }}" class="btn btn-primary btn-sm">Show </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection