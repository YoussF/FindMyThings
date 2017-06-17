@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'users'))
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Profile</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{$user->firstname}}" disabled="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{$user->lastname}}" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" value="{{$user->email}}" disabled="">
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{$user->phone}}" disabled="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="content">
                    <div class="author">
						<img class="avatar border-gray" src="{{$user->getAvatar()}}" />
						<h4 class="title">{{$user->name}}</h4>
                        <p class="description text-center"> 
                            Group : {{$user->getGroupName()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection