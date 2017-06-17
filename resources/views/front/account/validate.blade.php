@extends('front.layouts.master')

@section('content')
    <div class="reviews">
        @foreach($validates as $validate)
            <div class="rev">
                <div class="texts">
                    <b>AED Name :</b> 
                    <div class="text_rev">
                        {{$validate->getName()}}
                        <a class="btn btn-success pull-right" href="/validate-aed/{{$validate->id}}">
                           <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection