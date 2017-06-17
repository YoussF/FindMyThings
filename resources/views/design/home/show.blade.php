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
          <h1>Pending AEDS</h1>
        </div>
    <div>
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-body">
    <div class="rev">
        <div class="texts">
             
            <div class="text_rev">
                <b>AED Name :</b> {{$pending->getName()}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>Model :</b> {{$pending->model}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>Street :</b>  {{$pending->street_fr}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>Number :</b>  {{$pending->num}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
               <b>Post code :</b> {{$pending->postcode}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>Municipality :</b> {{$pending->municipality_fr}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
               <b>Latitude :</b> {{$pending->lat}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>Longitude :</b> {{$pending->lon}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
                <b>AED Expiration :</b>  {{$pending->aedexpiration}}
            </div>
        </div>
    </div>
    <div class="rev">
        <div class="texts">
            <div class="text_rev">
               <b>Info Place :</b>  {{$pending->infplace_fr}}
            </div>
        </div>
    </div>    

    <div class="row">
        <p>
            &nbsp;
        </p>
    </div>
    @if($pending->getImageA()!=null)
    <div class="col-md-6">
        <img src="{{$pending->getImageA()}}" width="50%;">
    </div>
    @endif
    @if($pending->getImageB()!=null)
        <div class="col-md-6">
            <img src="{{$pending->getImageB()}}" width="50%;">
        </div>
    @endif
    @if($pending->getImageC()!=null)
        <div class="col-md-6">
            <img src="{{$pending->getImageC()}}" width="50%;">
        </div>
    @endif
    @if($pending->getImageD()!=null)
        <div class="col-md-6">
            <img src="{{$pending->getImageD()}}" width="50%;">
        </div>
    @endif
</div>
</div>
@endsection