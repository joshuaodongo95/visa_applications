@extends('applications.default')

@section("module", "Agents")

@section("submodule", "Edit Agent")
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
        <div class="card-header">Edit Agent
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('agents.index') }}">Agents</a>
            </span>
        </div>
        <div class="card-body">
            {!! Form::model($agent, ['route' => ['agents.update', $agent->id],'method' => 'PATCH']) !!}
                
            <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Full Names','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Email Address:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email Address','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Telephone:</strong>
                    {!! Form::text('telephone', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Address:</strong>
                    {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection