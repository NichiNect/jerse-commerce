@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<h1>Hello World!</h1>
@endsection