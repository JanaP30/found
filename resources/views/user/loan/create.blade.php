@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
<div class="row">
    <p>Max Amount to loan: {{$max_amount}}</p>
</div>
{!! Form::open(['route' => 'user.loans.store', 'method' => 'POST' ]) !!}
<div class="row">
    <div class="form-group">
        {!! Form::label('amount', 'Amount') !!}
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
{!! Form::label('description', 'Description') !!}
{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
</div>

@endsection