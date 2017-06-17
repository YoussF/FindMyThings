@extends('front.layouts.master')

@section('content')
    <div class="reviews">
        @foreach($pendings as $pending)
            <div class="rev">
                <div class="texts">
                    <b>AED Name :</b> 
                    <div class="text_rev">
                        {{$pending->getName()}}
                        <a class="btn btn-success pull-right" href="/pending-aed/{{$pending->id}}">
                           <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection