@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date Of Deposit</th>
                    <th scope="col">Amount</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
               @foreach($deposits as $oneDeposit)
               <tr>
                   <td> {{ $oneDeposit->date_of_deposit }} </td>
                   <td> {{ $oneDeposit->amount }} </td>
                   <td></td>
               </tr>
               @endforeach
            </tbody>
        </table>
        <div>
            {{ $deposits->links() }}
        </div>
</div>

@endsection