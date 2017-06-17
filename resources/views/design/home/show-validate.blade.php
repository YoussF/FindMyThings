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
    <div class="reviews">
        <div class="rev">
            <div class="texts">
                <b>AED Name :</b> 
                <div class="text_rev">
                    {{$pending->getName()}}
                    @if($pending->aedname_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Model :</b> 
                <div class="text_rev">
                    {{$pending->model}} - 
                    @if($pending->model_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Street :</b> 
                <div class="text_rev">
                    {{$pending->street_fr}}
                    @if($pending->street_fr_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Number :</b> 
                <div class="text_rev">
                    {{$pending->num}}
                    @if($pending->num_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Post code :</b> 
                <div class="text_rev">
                    {{$pending->postcode}}
                    @if($pending->postcode_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Municipality :</b> 
                <div class="text_rev">
                    {{$pending->municipality_fr}}
                    @if($pending->municipality_fr_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Latitude :</b> 
                <div class="text_rev">
                    {{$pending->lat}}
                    @if($pending->lat_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Longitude :</b> 
                <div class="text_rev">
                    {{$pending->lon}}
                    @if($pending->lon_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>AED Expiration :</b> 
                <div class="text_rev">
                    {{$pending->aedexpiration}}
                    @if($pending->aedexpiration_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="rev">
            <div class="texts">
                <b>Info Place :</b> 
                <div class="text_rev">
                    {{$pending->infplace_fr}}
                    @if($pending->infplace_fr_v == 1)
                        <span style="color:blue;" class="pull-right">Validated</span>
                    @else
                        <span style="color:red;" class="pull-right">Refused</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection