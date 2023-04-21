@extends('applications.default')

@section("module", "Roles")

@section("submodule", "Roles")
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
          <div class="card-header">Roles
            <span class="float-right">
              <a class="btn btn-primary" href="{{ route('roles.create') }}">Create Role</a>
            </span>
          </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-sm table-striped" id="dataTable" width="100%" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Permissions</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Permissions</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                    @if(!empty($role->getPermissionNames()))
                        @foreach($role->getPermissionNames() as $val)
                          <label class="badge badge-dark">{{ $val }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                      @can('role-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                      @endcan
                      @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection