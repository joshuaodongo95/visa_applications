@extends('applications.default')

@section("module", "Fees")

@section("submodule", "Fees")
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Fees
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('fees.create') }}">Create Fee</a>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th>Item</th>
                            <th>Unit Price</th>
                            <th>Discount </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)
                            <tr>
                                <td>{{ $fee->item }}</td>
                                <td>{{ $fee->unit_price }}</td>
                                <td>{{ $fee->discount }} %</td>
                                <td class="float-right">
                                    <a class="btn btn-success btn-sm" href="{{ route('fees.show',$fee->id) }}">Show</a>
                                    @can('fees-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('fees.edit',$fee->id) }}">Edit</a>
                                    @endcan
                                    @can('fees-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['fees.destroy', $fee->id],'style'=>'display:inline']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection