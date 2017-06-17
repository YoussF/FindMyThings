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
                    <h4 class="title">Add Group</h4>
                </div>
                <div class="content">
                    <form method="POST" action="/admin/group" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="" name="description"></textarea>
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" value=1 >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" id="logo" name="logo" type="file" />
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Add</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection