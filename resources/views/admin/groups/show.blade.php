@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'groups'))
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Group Info :</h4>
                </div>
                <div class="content">
                    <form method="POST" action="/admin/group/{{$group->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{$group->getName()}}" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" name="description">{!! nl2br(e($group->getDescription())) !!}</textarea>
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" value=1 @if($group->getStatus() == 1) checked="" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <img src="{{$group->getLogo()}}" width="50%">
                                    <input class="form-control" id="logo" name="logo" type="file" />
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Group</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="content">
                        <div class="author">
                            <h4 class="title">Group Members ({{$count_members}}) : </h4>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach($members as $member)
                                            <tr>
                                                <td>{{$member->user()->getName()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($count_members > 0)
                                <div>
                                     <a href="/admin/members/{{$group->id}}"  class="btn btn-info btn-fill">
                                        All Group Members
                                    </a>
                                </div>
                            @endif
                            <div>
                                <a href="/admin/members/add/{{$group->id}}"  class="btn btn-success btn-fill">
                                    Add Members
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="content">
                        <div class="author">
                            <h4 class="title">Pending Members ({{$count_pendings}}) : </h4>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach($pendings as $pending)
                                            <tr>
                                                <td>{{$pending->email}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection