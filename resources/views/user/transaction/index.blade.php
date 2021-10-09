@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
       
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">From balance</th>
                    <th scope="col">To balance</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
               @foreach($transactions as $transaction)
               <tr>
                   <td> {{ $transaction->amount }} </td>
                   <td>
                        @if($transaction->fromBalance)
                            {{ $transaction->fromBalance->displayName()}}
                        @endif  
                    </td>
                   <td>
                        @if($transaction->toBalance)
                            {{ $transaction->toBalance->displayName()}}
                        @endif 
                   </td>
                   <td> {{ $transaction->getType()}} </td>
                
               </tr>
               @endforeach
            </tbody>
        </table>
        <div>
            {{ $transactions->links() }}
        </div>
</div>

@endsection