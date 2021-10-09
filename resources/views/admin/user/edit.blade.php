@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">

{!! Form::open(['route' => ['admin.users.update', $selectedUser->id], 'method' => 'POST' ]) !!}
<div class="row">
    <div class="form-group">
        {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name', $selectedUser->first_name, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
{!! Form::label('last_name', 'Last Name') !!}
{!! Form::text('last_name', $selectedUser->last_name, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
</div>

@endsection