@extends('applications.default')

@section("module", "Visa Applications")

@section("submodule", "Visa Applications")
@section('content')

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Visa Applications
                <span class="float-right">
                    <a class="btn btn-primary d-print-none" href="{{ route('applications.index') }}">Visa Applications</a>
                </span>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{ $application->agent->name ?? '' }}</strong>
                        <br>
                        {{ $application->agent->company ?? '' }}
                        <br>
                        {{ $application->agent->address ?? '' }}
                        <br>
                        {{ $application->agent->email ?? '' }}
                        <br>
                        {{ $application->agent->telephone ?? ''}}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Receipt #: 00{{$application->id ?? ''}}</em>
                    </p>
                    <p>
                        <em>Submission Date: {{$application->created_at ?? ''}}</em>
                    </p>
                    <p>
                        <em>Created by : {{$application->user->name ?? ''}}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>No. of Passports</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>{{$fees->item}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> {{$application->no_of_passports ?? ''}} </td>
                            <td class="col-md-1 text-center">{{$fees->unit_price}}</td>
                            <td class="col-md-1 text-center">{{$application->total_cost ?? ''}}</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td class="text-right">
                                <p>
                                    <strong>Subtotal:</strong>
                                </p>
                                <p>
                                    <strong>Tax:</strong>
                                </p>
                            </td>
                            <td class="text-center">
                                <p>
                                    <strong>{{$application->total_cost ?? ''}}</strong>
                                </p>
                                <p>
                                    <strong></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td class="text-right"><h4><strong>Total:</strong></h4></td>
                            <td class="text-center"><h4><strong>{{$application->total_cost ?? '' }}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <p> Thanks for your business! </p>
                </td>
          </div>
       </div>
       <button type="button" id="btnPrint" class="btn btn-success btn-lg btn-block d-print-none">
            Print Receipt <span class="glyphicon glyphicon-chevron-right "></span>
        </button>
@endsection