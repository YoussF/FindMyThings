@extends('layouts.master')

@section('content')

<div class="container page_info">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Change group : </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert" style="margin-top: 25px;text-align: center;">
                        User profile updated
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="/changeRole/{{$user->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="col-md-4 control-label">Choose a group * :</label>
                        <div class="col-md-6">
                          <select class="form-control" id="sel1" name="group">
                            <option value=""  >-- Select a group</option>
                            @foreach($groups as $group)
                                <option value={{ $group->id}}>{{ $group->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection