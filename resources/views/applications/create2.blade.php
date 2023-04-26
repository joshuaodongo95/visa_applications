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
                        <strong>Agent:</strong>
                        {!! Form::text('agent', null, array('placeholder' => 'Enter Agent Name','class' => 'typeahead form-control', 'id'=>'search')) !!}
                        
                    </div>
                    {!! Form::hidden('agent_id', null, array('placeholder' => 'Enter Agent Name','class' => 'form-control', 'id'=>'agent_id')) !!}
                    
                    <div class="form-group">
                        <strong>Created by:</strong>
                        <input type="text" name="created_by" class="form-control" id="created_by" value="{{Auth::user()->name}}"  disabled >
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
                            <th>
                                <input type="number" class="form-control" name="no_of_passports" id="no_of_passports" placeholder = "Number of passports" oninput="calc()"   ></th>
                            <th><input type="text" class="form-control" name="unit_cost" id="unit_cost" value="{{$fees->unit_price}}" disabled   ></th>
                            <th><span id="total">0</span></th>
                        </tr>
                    </tbody>
                    </table>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>

                {!! Form::close() !!}
            </div>
@endsection