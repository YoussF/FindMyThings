@extends('front.layouts.master')

@section('content')
<div class="reviews">
    <div class="rev">
        <div class="texts">
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