@extends('layouts.app')

@section('content')

<form action="{{url('admin/mutual_aid_fund')}}" method="post">
  <div class="container mt-5 pt-4">

    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mb-3">
        <input type="text" class="form-control" name='first_name' placeholder="First name" aria-label="First name">
      </div>
    
      <div class="col-12 col-md-6 col-lg-3 mb-3">
        <input type="text" class="form-control" name='last_name' placeholder="Last name" aria-label="Last name">
      </div>
    
      <div class="col-12 col-md-6 col-lg-3 mb-3">
        <input type="text" class="form-control" name='address' placeholder="Address" aria-label="Address">
      </div>
    
      <div class="col-12 col-md-6 col-lg-3 mb-3">
        <input type="text" class="form-control" name='phone_number' placeholder="Phone number"
          aria-label="Phone number">
      </div>
    
      <div class="col-12 d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </div>

    @csrf
      
  </div>
</form>

@endsection