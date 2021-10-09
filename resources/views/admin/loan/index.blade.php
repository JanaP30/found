@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
       
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach($loans as $loan)
               <tr>
                   <td> 
                        {{ $loan->user->first_name . ' ' . $loan->user->last_name }}
                    </td>
                   <td> {{ $loan->amount }} </td>
                   <td> {{ $loan->getStatus()}} </td>
                
               </tr>
               @endforeach
            </tbody>
        </table>
        <div>
            {{ $loans->links() }}
        </div>
</div>

@endsection