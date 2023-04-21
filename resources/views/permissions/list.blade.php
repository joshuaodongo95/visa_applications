@extends('applications.default')

@section("module", "Permissions")

@section("submodule", "permissions")
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
          <div class="card-header">Permissions
            <span class="float-right">
              <a class="btn btn-primary" href="{{ route('permissions.create') }}">Create Permission</a>
            </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-striped" id="dataTable" width="100%" >
                <thead>
                  <tr>
                    <th class="d-none d-sm-none d-md-table-cell" scope="col"> #</th>
                    <th scope="col">Name</th>
                    <th class="d-none d-sm-none d-md-table-cell" scope="col">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($permissions as $permission)
                    <tr>
                      <td>{{ $permission->id }}</td>
                      <td>{{ $permission->name }}</td>
                      <td>
                        <a class="btn btn-success btn-sm" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                           @can('role-edit')
                              <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
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