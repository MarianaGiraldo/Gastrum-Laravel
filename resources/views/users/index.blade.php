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
                @foreach($users as $user)
                    <tr class="table-light">
                        <td >{{$user->id}}</td>
                        <td >{{$user->name}} </td>
                        <td >{{$user->email}} </td>
                        <td >{{$user->hours_worked}} </td>
                        <td><a href="/users/{{$user->id}}" class="btn-small btn-success rounded-pill">View User</a></td>
                        @can('users.edit')
                        <td><a href="/users/{{$user->id}}" class="btn btn-warning rounded-pill py-0 px-3 text-center"><i class="fa-solid fa-pen-to-square" style="color: white;"></i></a></td>
                        <td><a href="/users/{{$user->id}}/drop" class="btn-small btn-danger rounded-pill py-0 px-3 text-center"><i class="fa-solid fa-trash-can"></i></a></td>
                        @endcan
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
@can('users.create')
<div class="fixed-action-btn">
    <a href="/users/create" class="btn-floating btn-large teal lighten-2">
        <i class="large material-icons">add</i>
    </a>
</div>
    <script>
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
        });
    </script>
@endcan
@else
<br><br>
@include('components.no_auth_alert')
@endcan
@endsection
