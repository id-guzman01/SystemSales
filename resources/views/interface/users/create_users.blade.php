@extends('adminlte::page')

@section('title', 'Registrar Usuarios')

@section('content_header')
    <h1>Registrar Usuarios</h1>
@stop

@section('content')
    <livewire:admin.users.create-users>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/create_users.css') }}">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop