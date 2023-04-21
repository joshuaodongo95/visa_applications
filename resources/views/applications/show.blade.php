@extends('applications.default')

@section("module", "Visa Applications")

@section("submodule", "Visa Application")
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Visa Application
            @can('application-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('applications.index') }}">Visa Applications</a>
                </span>
            @endcan
        </div>
        <div class="card-body">
            <div class="lead">
                <strong>Company:</strong>
                {{ $application->company }}
            </div>
            <div class="lead">
                <strong>No. of Passports:</strong>
                {{ $application->no_of_passports }}
            </div>
            <div class="lead">
                <strong>Total Cosr:</strong>
                {{ $application->cost }}
            </div>
            <div class="lead">
                <strong>Agent:</strong>
                {{ $application->agent }}
            </div>
            <div class="lead">
                <strong>Submission Date:</strong>
                {{ $application->created_at }}
            </div>
            
            <div class="lead">
                <strong>Collection Date:</strong>
                {{ $application->collection_date }}
            </div>
        </div>
    </div>
@endsection