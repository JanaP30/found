@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">

{!! Form::open(['route' => 'admin.deposits.store', 'method' => 'POST' ]) !!}
<div class="row">
    <div class="form-group">
        {!! Form::label('user_id', 'User') !!}
        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
{!! Form::label('date_of_deposit', 'Date Of Deposit') !!}
{!! Form::date('date_of_deposit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('amount', 'Amount') !!}
{!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
</div>

@endsection