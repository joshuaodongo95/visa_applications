@extends('applications.default')

@section("module", "Users")

@section("submodule", "Users")
@section('content')
    <div class="card">
        <div class="card-header">User
            @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
                </span>
            @endcan
        </div>
        <div class="card-body">
            <div class="lead">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
            <div class="lead">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
            <div class="lead">
                <strong>Password:</strong>
                    ********
            </div>
            <div class="lead">
                <strong>Role:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $val)
                        <label class="badge badge-dark">{{ $val }}</label>
                    @endforeach
                @endif
            </div>
    </div>
        
@endsection