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
                        <div class="col-md-3 col-lg-3"><img class="img-show" src="{{ asset('images/employee.jpg') }}">
                        </div>
                        <div class="col-md-9 col-lg-9">
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                                    <h3 class="display-5 text-white">{{ $user->name }}</h3>
                                </div>
                                <div class="p-3 bg-show">
                                    <h6 class="text-white">{{ $user->email }}</h6>
                                </div>
                                <div class="d-flex flex-row text-white">
                                    <div class="p-4 bg-warning text-center skill-block">
                                        <h4>Employee</h4>
                                        <h6>Type</h6>
                                    </div>
                                    <div class="p-3 bg-success text-center skill-block">
                                        <h4>{{ $user->hours_worked }}</h4>
                                        <h6>Worked Hours</h6>
                                    </div>
                                    <div class="p-3 bg-primary text-center skill-block">
                                        <h4>{{ $user->category->type }}</h4>
                                        <h6>Category</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="d-inline-block w-75 mx-auto px-5 row" action="/payrolls" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn-small blue rounded-pill" class="py-2 mx-auto col"><i
                                class="fa-solid fa-file-invoice-dollar mx-2"></i>Generate Payroll</button>
                        @can('users.edit')
                        <div class="row w-50 mx-auto mt-3">
                            <div class="col">
                                <a href="/users/create" class="btn-floating btn-large waves-effect waves-light green mx-auto"><i
                                class="material-icons">add</i></a>
                            </div>
                            <div class="col">
                                <a href="/users/{{ $user->id }}/edit" class="btn-floating btn-large waves-effect waves-light teal lighten-2 mx-auto"><i
                                    class="material-icons">edit</i></a>
                            </div>
                            <div class="col">
                                <a href="/users/{{ $user->id }}/drop" class="btn-floating btn-large waves-effect waves-light red mx-auto"><i
                                    class="material-icons">delete_forever</i></a>
                            </div>
                        </div>
                        @endcan
                    </form>
                </div>


                <br /><br />
            </div>
            <div class="fixed-action-btn">
                <form action="/payrolls" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn-floating blue btn-large"><i
                            class="fa-solid fa-file-invoice-dollar"></i></button>
                </form>
                @can('users.edit')
                    <ul class="my-0">
                        <li><a href="/users/{{ $user->id }}/drop" class="btn-floating red btn-large"><i
                                    class="material-icons">delete_forever</i></a></li>
                        <li>
                            <a href="/users/{{ $user->id }}/edit" class="btn-floating btn-large teal lighten-2"><i
                                    class="large material-icons">edit</i></a>
                        </li>
                        <li><a href="/users/create" class="btn-floating green btn-large"><i class="material-icons">add</i></a></li>
                    </ul>
                @endcan
            </div>
            <script>
                $(document).ready(function() {
                    $('.fixed-action-btn').floatingActionButton();
                });
            </script>
        @else
            @include('components.no_auth_alert')
        @endcan
    @endsection
