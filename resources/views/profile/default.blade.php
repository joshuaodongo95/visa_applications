@extends('layouts.default')
@section('title', 'Visa Applications')

@section('breadcrumb')
    <ol class="breadcrumb">
        <!-- TODO-GRACE Figure out how to handle these urls -->
        <li class="breadcrumb-item  d-print-none"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active d-print-none" aria-current="page">@yield('submodule')</li>
    </ol>
@endsection

{{--

 @section("content")
   The content for this "section" shall be filled by the children
 @endsenction

--}}