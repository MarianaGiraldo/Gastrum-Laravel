@extends('layouts.app')
@section('content')
@can('users.index')
<div class="container listTable">
    <table class="table">
        <h1 class="display-3" style="text-align: center; padding-top: 15px;">Employees List</h1>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Hours</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    @foreach($users as $user)
                        <tr class="table-light">
                            <td >{{$user->id}}</td>
                            <td >{{$user->name}} </td>
                            <td >{{$user->email}} </td>
                            <td >{{$user->hours_worked}} </td>
                            <td><a href="/users/{{$user->id}}" class="btn-small btn-success rounded-pill">View User</a></td>
                            <td><a href="#" class="btn btn-warning" style="border-radius: 13px;"><img src="https://img.icons8.com/ios/50/000000/pencil.png" width="25px" /></a></td>
                            <td><a href="/users/{{$user->id}}/drop" class="btn-small btn-danger rounded-pill"><img src="https://img.icons8.com/ios/50/000000/delete--v1.png" width="25px" /></a></td>
                        </tr>
                    @endforeach

                </tr>
        </tbody>
    </table>
</div>
@else
<br><br>
@include('components.no_auth_alert')
@endcan
@endsection
