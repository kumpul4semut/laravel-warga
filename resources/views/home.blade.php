@extends('master')

@section('konten')
    <h1>Dashboard</h1>
    <h4>Selamat Datang <b>{{ Auth::user()->name }}</b></h4>
@endsection