@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center flex-column welcome-wrapper">
        <div class="row">
            <a class="btn btn-success" href="/admin/users/create">Create New User</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
               @foreach($users as $oneUser)
               <tr>
                   <td> {{ $oneUser->first_name }} </td>
                   <td> {{ $oneUser->last_name }} </td>
                   <td> {{ $oneUser->email }} </td>
                   <td> {{ $oneUser->getType() }} </td>
                   <td>
                        <a class="btn btn-primary" href="/admin/users/show/{{$oneUser->id}}">Show</a>
                        <a class="btn btn-success" href="/admin/users/edit/{{$oneUser->id}}">Edit</a>
                   </td>
               </tr>
               @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>
</div>

@endsection