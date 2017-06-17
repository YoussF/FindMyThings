@extends('design.layout.master')

@section('left_menu')
	@include('design.layout.left_menu', array('current' => 'map'))
@endsection

@section('content')
	{!! $r['js'] !!}
	{!! $r['html'] !!}
@endsection
