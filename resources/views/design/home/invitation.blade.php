@extends('design.layout.master')

@section('left_menu')
    @include('design.layout.left_menu', array('current' => 'pending'))
@endsection

@section('content')
    <style>


                body { height: 1200px; overflow: hidden; margin: 0; padding: 0;}

    </style>
    <div class="px-content">
        <div class="page-header">
          <h1>Group invitation</h1>
        </div>
    <div>
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <b>You have an inventation to join a Group:</b> 
            <div class="text_rev">
                <p>
                    Name : {{$group->getName()}}
                </p>
                <p>
                    Description :
                    {!! nl2br(e($group->getDescription())) !!}
                </p>
                <p>
                    <a class="btn btn-success" href="/join/{{$group->id}}">
                        <i class="fa fa-plus" aria-hidden="true"></i> JOIN
                    </a>
                </p>
                
            </div>
        </div>
    </div>
</div>
@endsection