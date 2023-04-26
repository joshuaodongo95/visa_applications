@extends('applications.default')

@section("module", "Fees")

@section("submodule", "Edit Fees")
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
        <div class="card-header">Edit Fees
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('fees.index') }}">Fees</a>
            </span>
        </div>
        <div class="card-body">
            {!! Form::model($fee, ['route' => ['fees.update', $fee->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('item', null, array('placeholder' => 'Name of Item','class' => 'form-control')) !!}
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
    </div>
@endsection