@extends('applications.default')

@section("module", "Visa Applications")

@section("submodule", "Visa Applications")
@section('content')
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Visa Applications
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('applications.create') }}"> Add Visa Application</a>
                    </span>
                </div>
                <div class="card-body">
                @if(auth()->user()->can('application-list'))
                <div class="table-responsive">
                    <table class="table table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>#</th>
                                <th>Agent</th>
                                <th>No. of Passports</th>
                                <th>Total Cost</th>
                                <th>Submission Date</th>
                                <th>Collection Date</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>
                                        {{ $application->agent->name ?? '' }}
                                    </td>
                                    <td>{{ $application->no_of_passports }}</td>
                                    <td>{{ $application->total_cost }}</td>
                                    <td>{{ $application->created_at }}</td>
                                    <td>{{ $application->collection_date }}</td>
                                    <td>{{ $application->user->name }}</td>
                                    <td class="float-right">
                                        <a class="btn btn-success btn-sm" href="{{ route('applications.show',$application->id) }}">Show</a>
                                        @can('application-edit')
                                            <a class="btn btn-primary btn-sm" href="{{ route('applications.edit',$application->id) }}">Edit</a>
                                        @endcan
                                        @can('application-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['applications.destroy', $application->id],'style'=>'display:inline']) !!}
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
                @else
                    <div class="alert alert-info" role=""alert>
                        403 - User does not have the Right permissions to view this page
                    </div>
                @endif
        </div>
@endsection