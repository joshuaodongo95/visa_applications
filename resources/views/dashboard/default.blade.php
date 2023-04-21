@extends('layouts.default')

@section('title', 'Dashboard')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('submodule')</li>
    </ol>
@endsection

{{--

 @section("content")
   The content for this "section" shall be filled by the children
 @endsenction

--}}