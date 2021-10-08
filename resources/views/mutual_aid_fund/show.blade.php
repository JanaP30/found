@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-2">
        <a href="/admin/mutual_aid_fund" class="btn btn-dark">Back to users</a>
    </div>
    <div class="card p-4">
        <div class="row">
            <div class="col-6">
                <p>First Name</p>
            </div>
            <div class="col-6">
                <p><strong>{{$mutual_aid_fund->first_name}}</strong></p>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Last Name</p>
            </div>
            <div class="col-6">
                <p><strong>{{$mutual_aid_fund->last_name}}</strong></p>
    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p> Address</p>
            </div>
            <div class="col-6">
                <p><strong>{{$mutual_aid_fund->address}}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="m-0">Phone Number</p>
            </div>
            <div class="col-6">
                <p class="m-0"><strong>{{ $mutual_aid_fund->phone_number}}</strong></p>
    
            </div>
        </div>
    </div>
</div>
    

@endsection