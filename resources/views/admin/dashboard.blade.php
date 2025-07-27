@extends('admin.component.layout')

@php
    $path = Str::after(Request::url(), 'admin/');
@endphp


@section('main')
    <h1>hello dashboard</h1>
@endsection
