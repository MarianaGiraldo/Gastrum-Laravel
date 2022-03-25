@extends('layouts.app')
@section('content')
@can('users.show')


<div class="mx-5">

    <h1 class="display-4 mb-4">Employee Detail</h1>
    <div class="d-inline">
        <a href="/">Home</a>
        /
        <a href="/users">Employee List</a>
        /
        <p class="d-inline">Employee Detail</p>
        <div class="container mt-5 mb-5">
            <div class="row no-gutters">
                <div class="col-md-3 col-lg-3"><img class="img-show" src="{{asset('images/employee.jpg')}}"></div>
                <div class="col-md-9 col-lg-9">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                            <h3 class="display-5 text-white">{{$user->name}}</h3><i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i>
                        </div>
                        <div class="p-3 bg-show">
                            <h6 class="text-white">Employee</h6>
                        </div>
                        <div class="d-flex flex-row text-white">
                            <div class="p-4 bg-primary text-center skill-block">
                                <p>{{$user->email}}</p>
                                <h6>Email</h6>
                            </div>
                            <div class="p-3 bg-success text-center skill-block">
                                <h4>70%</h4>
                                <h6>Jquery</h6>
                            </div>
                            <div class="p-3 bg-warning text-center skill-block">
                                <h4>80%</h4>
                                <h6>HTML</h6>
                            </div>
                            <div class="p-3 bg-danger text-center skill-block">
                                <h4>75%</h4>
                                <h6>PHP</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <td><a href="/payroll/{{$user->id}}" class="btn-small btn-success rounded-pill">Generate Payroll</a></td>

</div>
@else
@include('components.no_auth_alert')
@endcan
@endsection
