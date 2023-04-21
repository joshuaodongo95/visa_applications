@extends('applications.default')

@section("module", "Roles")

@section("submodule", "Role")
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
        <div class="card">
            <div class="card-header">Roles
                @can('role-create')
                    <span class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}">Roles</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                        {{ $role->name }}
                </div>
                <div class="lead">
                    <strong>Permissions:</strong>
                    @if(!empty($role->getPermissionNames()))
                        @foreach($role->getPermissionNames() as $val)
                          <label class="badge badge-dark">{{ $val }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
@endsection