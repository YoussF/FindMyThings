@extends('design.layout.master')

@section('left_menu')
    @include('design.layout.left_menu', array('current' => 'login'))
@endsection

@section('content')
    <style>


                body { height: 1200px; overflow: hidden; margin: 0; padding: 0;}

    </style>
    <div class="px-content">
        <div class="page-header">
          <h1>Login</h1>
        </div>
    <div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
        <h1>Need validation account</h1>
        <p class="lead">
            you have to validate your account to begin to use Citizen Map
        </p>
    </div>
@endsection