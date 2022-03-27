@extends('layouts.app')
@section('content')
    @can('users.drop')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <div class="card-panel bg-light w-50 m-auto  rounded h-auto">
            <h2 class="header center-align">Delete User: {{$dropUser->name}} {{$dropUser->id}} </h2>
            <div class="row center container m-auto">
                <div class="card orange accent-2">
                    <form action="{{ route('users.destroy', $dropUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-content white-text">
                            <span for="delete" class="card-title">¿Are you sure you want to delete that user? </span>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn red lighten-2">Delete</button>
                            <a href="/users" class="waves-effect waves-light btn blue lighten-3" role="button">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @else
        @include('components.no_auth_alert')
    @endcan
@endsection
