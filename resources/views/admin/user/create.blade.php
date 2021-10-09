@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">

{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST' ]) !!}
<div class="row">
    <div class="form-group">
        {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
{!! Form::label('last_name', 'Last Name') !!}
{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'Email') !!}
{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('password', 'Password') !!}
{!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
</div>

@endsection