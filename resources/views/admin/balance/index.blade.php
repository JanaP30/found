@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Balance Owner</th>
                    <th scope="col">Type</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
               @foreach($balances as $oneBalance)
               <tr>
                   <td> 
                        @if($oneBalance->user)
                            {{ $oneBalance->user->first_name . ' ' . $oneBalance->user->last_name }}
                        @else
                            Platform Balance
                        @endif
                    </td>
                   <td> {{ $oneBalance->getType() }} </td>
                   <td> {{ $oneBalance->total }} </td>
                   <td></td>
               </tr>
               @endforeach
            </tbody>
        </table>
        <div>
            {{ $balances->links() }}
        </div>
</div>

@endsection