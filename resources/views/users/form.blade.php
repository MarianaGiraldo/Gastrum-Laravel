@extends('layouts.app')
@section('content')
    @can('users.create')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <div @class('w-75 mx-auto')>
            <div class="wrapper">
                @if(!isset($user))
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                @else
                    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                        @csrf
                        @method('put')
                @endif
                        <h2></h2>
                <section>
                    <div class="inner">
                        <div class="image-holder">
                            <img src="{{ asset('images/form-wizard-1.jpg') }}" alt="">
                        </div>
                        <div class="form-content">
                            <div class="form-header">
                                <h3>{{ __('Form User') }}</h3>
                            </div>
                            <div class="form-row">
                                <div class="form-holder">
                                    <input placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="@isset($user){{ $user->name }}@endisset" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input placeholder="Your Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="
                                    @isset($user)
                                        {{ $user->email }}
                                    @endisset "  required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required style="background-color: white">
                                        @isset($user)
                                        <script>
                                            $(document).ready(function() {
                                                $('#category option[value="{{$user->category_id}}"]').prop('selected', true)
                                            });
                                        </script>
                                        @endisset
                                        <option disabled selected>Category</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                    </select>

                                    <input placeholder="Hours worked" id="hours_worked" type="number" class="form-control @error('hours_worked') is-invalid @enderror" name="hours_worked" value="@isset($user){{ $user->hours_worked }}@endisset" min="10" max="120" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-holder">
                                        <input placeholder="Password" id="password" type="password" class="form-control d-inline-block @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        </div>
        <!-- JQUERY -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

        <!-- JQUERY STEP -->
        <script src="{{ asset('js/jquery.steps.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

    @else
        @include('components.no_auth_alert')
    @endcan
@endsection
