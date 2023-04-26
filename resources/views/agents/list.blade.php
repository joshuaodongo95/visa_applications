@extends('applications.default')

@section("module", "Agents")

@section("submodule", "Agents")
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
          <div class="card-header">Agents
            <span class="float-right">
              <a class="btn btn-primary" href="{{ route('agents.create') }}">Add Agent</a>
            </span>
          </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-sm table-striped" id="dataTable" width="100%" >
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Company</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($agents as $agent)
                  <tr>
                    <td>{{ $agent->company }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->telephone }}</td>
                    <td>{{ $agent->address }}</td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{ route('agents.show',$agent->id) }}">Show</a>
                      @can('agent-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('agents.edit',$agent->id) }}">Edit</a>
                      @endcan
                      @can('agent-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['agents.destroy', $agent->id],'style'=>'display:inline']) !!}
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