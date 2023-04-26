@extends('applications.default')

@section("module", "Fees")

@section("submodule", "Fees")
@section('content')
    <div class="card">
        <div class="card-header">Fees
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('fees.index') }}">Fees</a>
                </span>
        </div>
        <div class="card-body">
            <div class="lead">
                <strong>Name:</strong>
                {{ $fee->item }}
            </div>
            <div class="lead">
                <strong>Unit Price:</strong>
                {{ $fee->unit_price }}
            </div>
            <div class="lead">
                <strong>Discount:</strong>
                {{ $fee->discount }}
            </div>
    </div>
        
@endsection