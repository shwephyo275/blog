@extends('admin.layout.master')

@section('content')
    <h3>Content</h3>
    {{-- {{ auth()->guard('admin')->user()->name }}
    <a href="{{ url('admin/logout') }}">Logout</a> --}}
@endsection
