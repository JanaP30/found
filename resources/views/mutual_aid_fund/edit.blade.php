@extends('layouts.app')

@section('content')
<div class="container mt-5">
   <div class="row d-flex justify-content-center">
      <selection class="col-5">
         <div class="card mb-3">
            <div class="card-body">
               <h5 class="card-title">Updates information of user</h5>
            </div>
         </div>
         <form class="update-user-form" action="{{url('/admin/mutual_aid_fund/'.$mutual_aid_fund->id)}}" method="POST">
            @csrf

            <div class="form-group">
               <label>First Name</label>
               <input value="{{$mutual_aid_fund->first_name}}" name="first_name" type="text" class="form-control"
                  placeholder="Enter the First name">
            </div>
            <div class="form-group">
               <label>Second Name</label>
               <input value="{{$mutual_aid_fund->last_name}}" name="last_name" type="text" class="form-control"
                  placeholder="Enter the Last name">
            </div>
            <div class="form-group">
               <label>Address</label>
               <input value="{{$mutual_aid_fund->address}}" name="address" type="text" class="form-control"
                  placeholder="Enter the Address">
            </div>
            <div class="form-group">
               <label>Phone number</label>
               <input value="{{$mutual_aid_fund->phone_number}}" name="phone_number" type="text" class="form-control"
                  placeholder="Enter the phone_number">
            </div>
            <input type="submit" class="btn btn-info" value="Update">
            <input type="reset" class="btn btn-warning" value="Reset">
         </form>
      </selection>
   </div>
</div>
@endsection