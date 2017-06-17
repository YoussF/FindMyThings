@extends('layouts.master')

@section('content')

<div class="container page_info">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

            <div class="panel-heading">Add group : </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="/group">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name * :</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description * :</label>

                        <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="intro" name="description"></textarea>
                        </div>
                    </div>
                    


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection