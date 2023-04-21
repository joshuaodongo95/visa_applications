@extends('layouts.default')
@section('title', 'Permissions')

@section('breadcrumb')
    <ol class="breadcrumb">
        <!-- TODO-GRACE Figure out how to handle these urls -->
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('submodule')</li>
    </ol>
@endsection

{{--

 @section("content")
   The content for this "section" shall be filled by the children
 @endsenction

--}}