@extends('applications.default')

@section("module", "Fees")

@section("submodule", "Create a Fee")
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
        <div class="card">
            <div class="card-header">Create a Fee
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('fees.index') }}">Fees</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'fees.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Item:</strong>
                        {!! Form::text('item', null, array('placeholder' => 'Name of item','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Unit Price:</strong>
                        {!! Form::text('unit_price', null, array('placeholder' => 'Unit Price','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Discount:</strong>
                        <input type="number" name="discount" placeholder = "Discount" class = "form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
@endsection