@extends('layouts.app')
@section('content')
    @can('index')
        {{ Auth::user()->cans }}
        <h1>Welcome to Gastrom S.A. PayRoll Software</h1>
    @else
        @include('components.no_auth_alert')
    @endcan
@endsection
