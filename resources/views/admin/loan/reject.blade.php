@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">

{!! Form::open(['route' => ['admin.loan.reject', $loan->id], 'method' => 'POST' ]) !!}
<div class="row">
    <div class="form-group">
        {!! Form::label('reject_reason', 'Reject Reason') !!}
        {!! Form::text('reject_reason', null, ['class' => 'form-control']) !!}
    </div>
</div>
{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
</div>

@endsection