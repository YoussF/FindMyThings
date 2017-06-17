@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'groups'))
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Users with default group : </h4>
                </div>
                <div class="content">
                    <form method="POST" action="/admin/members/invite/{{$current_group}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Members : </label>
                                    <input type="text" class="form-control" value="" name="email">
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-info btn-fill pull-right">Invite Member</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
