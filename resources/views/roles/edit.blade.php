@extends('applications.default')

@section("module", "Roles")

@section("submodule", "Edit Role")
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Edit role
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Roles</a>
            </span>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'PATCH']) !!}
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                <strong>Permissions:</strong>
                <br/>
                @foreach($permission as $value)
                <label>
                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}
                </label>
                @endforeach
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection