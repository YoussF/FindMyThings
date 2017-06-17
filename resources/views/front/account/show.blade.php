@extends('front.layouts.master')

@section('content')
<div class="reviews">
    <div class="rev">
        <div class="texts">
            <b>AED Name :</b> 
            <div class="text_rev">
                {{$pending->getName()}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Model :</b> 
            <div class="text_rev">
                {{$pending->model}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Street :</b> 
            <div class="text_rev">
                {{$pending->street_fr}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Number :</b> 
            <div class="text_rev">
                {{$pending->num}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Post code :</b> 
            <div class="text_rev">
                {{$pending->postcode}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Municipality :</b> 
            <div class="text_rev">
                {{$pending->municipality_fr}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Latitude :</b> 
            <div class="text_rev">
                {{$pending->lat}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Longitude :</b> 
            <div class="text_rev">
                {{$pending->lon}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>AED Expiration :</b> 
            <div class="text_rev">
                {{$pending->aedexpiration}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <b>Info Place :</b> 
            <div class="text_rev">
                {{$pending->infplace_fr}}
            </div>
        </div>
    </div>
</div>
@endsection