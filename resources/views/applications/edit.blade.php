@extends('applications.default')

@section("module", "Visa Applications")

@section("submodule", "Edit Visa Application")
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
            <div class="card-header">Edit Visa Application
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('applications.index') }}">Visa Applications</a>
                </span>
            </div>
             <div class="card-body">
                {!! Form::model($application, ['route' => ['applications.update', $application->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>Company:</strong>
                            {!! Form::text('company', null, array('placeholder' => 'Enter Company Name','class' => 'form-control')) !!}
                    </div>
                            
                    <div class="form-group">
                        <strong>No. of Passports:</strong>
                                {!! Form::number('no_of_passports', null, array('placeholder' => 'Number of Passports','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Collection Date:</strong>
                        {!! Form::date('collection_date', null, array('placeholder' => 'Collection Date. / Transaction ID','class' => 'form-control')) !!}
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
@endsection