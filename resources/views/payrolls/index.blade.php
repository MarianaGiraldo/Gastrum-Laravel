@extends('layouts.app')
@section('content')
    @can('payroll.index')
        <div class="container listTable">
            <table class="table">
                <h1 class="display-3" style="text-align: center; padding-top: 15px;">Payroll List</h1>
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Total paid</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payrolls as $payroll)
                    <tr class="table-light">
                        <td >{{$payroll->id}}</td>
                        <td >{{$payroll->user->name}} </td>
                        <td >{{$payroll->total_paid}} </td>
                        <td><a href="/payrolls/{{$payroll->id}}" class="btn-small btn-success rounded-pill">View Payroll</a></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <br><br>
        @include('components.no_auth_alert')
    @endcan
@endsection
