@extends('applications.default')

@section("module", "Agents")

@section("submodule", "Agents")
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
        <div class="card">
            <div class="card-header">Agents
                @can('agent-create')
                    <span class="float-right">
                            <a class="btn btn-primary" href="{{ route('agents.index') }}">Agents</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Company:</strong>
                        {{ $agent->company }}
                </div>
                <div class="lead">
                    <strong>Name:</strong>
                        {{ $agent->name }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $agent->email }}
                </div>
                <div class="lead">
                    <strong>Telephone:</strong>
                    {{ $agent->telephone }}
                </div>
                <div class="lead">
                    <strong>Telephone:</strong>
                    {{ $agent->address }}
                </div>
            </div>
        </div>
@endsection