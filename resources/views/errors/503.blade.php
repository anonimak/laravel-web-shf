@extends('errors::layout')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('image')
    <img src="{{ asset('/img/svg/cleanup.svg') }}" width="600px" alt="" srcset="">
@endsection
@section('message', __($exception->getMessage() ?: 'Unfortunately this site is currently down for maintenance.'))
