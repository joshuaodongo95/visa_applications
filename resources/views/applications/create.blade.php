@extends('applications.default')

@section("module", "Visa Applications")

@section("submodule", "Add Visa Applications")
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
            <div class="card-header">Add Visa Applications 
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('applications.index') }}">Visa Applications </a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'applications.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Company:</strong>
                        {!! Form::text('company', null, array('placeholder' => 'Enter Company Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>Collection Date:</strong>
                                {!! Form::date('collection_date', null, array('placeholder' => 'Collection Date. / Transaction ID','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <strong>Agent:</strong>
                            <input type="text" name="agent" class="form-control" id="agent" value="{{Auth::user()->name}}"  disabled >
                        </div>
                    </div>
                    <table class="table table-sm table-striped" id="cart" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Item</th>
                            <th>No. of Passports</th>
                            <th>Unit Price</th>
                            <th>Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Visa Applications</th>
                            <th><input type="number" class="form-control" name="no_of_passports" id="no_of_passports" placeholder = "Number of passports" onChange="calc()"   ></th>
                            <th><input type="text" class="form-control" name="unit_cost" id="unit_cost" value="{{$fees->unit_cost}}" disabled   ></th>
                            <th><span id="total">0</span></th>
                        </tr>
                    </tbody>
                    </table>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>

                {!! Form::close() !!}
            </div>
@endsection