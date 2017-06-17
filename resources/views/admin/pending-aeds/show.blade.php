@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'pending-aed'))
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
                @if (session('error'))
    <div class="alert alert-success">
       The first AED creates must have lon and lat validated
    </div>
@endif
            <div class="card ">
                <div class="header">
                    <h4 class="title">Pending AED
                        @if($isNewAed == 1)
                            <a href="/admin/validate/{{$pendingAed->id}}"  class="btn btn-info btn-fill pull-right">
                                <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                PUSH AED
                            </a>
                        @else
                            <a href="/admin/complete/{{$pendingAed->id}}"  class="btn btn-info btn-fill pull-right">
                                <i class="fa fa-clone" aria-hidden="true"></i>
                                Complete AED
                            </a>
                        @endif
                    </h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table">
                            <thead>
                                <th>VALIDATED by user</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>

                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'AED Name :',
                                            'element_value' => $pendingAed->aedname,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'aedname',
                                            'element_status' => $pendingAed->aedname_v,
                                            'current' => $aedname,
                                            'elemnt_new' => $isNewAed
                                        ))                            
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Model :',
                                            'element_value' => $pendingAed->model,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'model',
                                            'element_status' => $pendingAed->model_v,
                                            'current' => $model,
                                            'elemnt_new' => $isNewAed
                                        ))                            
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Street :',
                                            'element_value' => $pendingAed->street_fr,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'street_fr',
                                            'element_status' => $pendingAed->street_fr_v,
                                            'current' => $street_fr,
                                            'elemnt_new' => $isNewAed
                                        ))
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Number :',
                                            'element_value' => $pendingAed->num,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'num',
                                            'element_status' => $pendingAed->num_v,
                                            'current' => $num,
                                            'elemnt_new' => $isNewAed
                                        ))
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Post code :',
                                            'element_value' => $pendingAed->postcode,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'postcode',
                                            'element_status' => $pendingAed->postcode_v,
                                            'current' => $aedexpiration,
                                            'elemnt_new' => $isNewAed
                                        ))
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Municipality :',
                                            'element_value' => $pendingAed->municipality_fr,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'municipality_fr',
                                            'element_status' => $pendingAed->municipality_fr_v,
                                            'current' => $municipality_fr,
                                            'elemnt_new' => $isNewAed
                                        ))
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Latitude :',
                                            'element_value' => $pendingAed->lat,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'lat',
                                            'element_status' => $pendingAed->lat_v,
                                            'current' => $lat,
                                            'elemnt_new' => $isNewAed
                                        ))   
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Longitude :',
                                            'element_value' => $pendingAed->lon,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'lon',
                                            'element_status' => $pendingAed->lon_v,
                                            'current' => $lon,
                                            'elemnt_new' => $isNewAed
                                        ))                                                                      
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'AED Expiration :',
                                            'element_value' => $pendingAed->aedexpiration,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'aedexpiration',
                                            'element_status' => $pendingAed->aedexpiration_v,
                                            'current' => $aedexpiration,
                                            'elemnt_new' => $isNewAed
                                        ))                                   
                            @include('admin.pending-aeds.components.element', 
                                        array(
                                            'element_name' => 'Info Place :',
                                            'element_value' => $pendingAed->infplace_fr,
                                            'element_id' => $pendingAed->id,
                                            'element_key' => 'infplace_fr',
                                            'element_status' => $pendingAed->infplace_fr_v,
                                            'current' => $infplace_fr,
                                            'elemnt_new' => $isNewAed
                                        )) 
                      
                            </tbody>
                        </table>



                    </div>
                        <div class="row">
                            @if($pendingAed->getImageA()!=null)
                            <div class="col-md-6">
                                <b>Image 1</b>  <br>
                                <img src="{{$pendingAed->getImageA()}}" width="50%;">
                            
                                @if($pendingAed->img_a_v != 1 && $pendingAed->img_a_v != 2 )
                                    <a href="/admin/aed/validate/{{$pendingAed->id}}/img_a" class="btn btn-info" >
                                        <i class="pe-7s-back-2"></i>
                                    </a>
                                @endif

                                @if($pendingAed->img_a_v != 1 && $pendingAed->img_a_v != 2 && $isNewAed == 1)
                                    <a href="/admin/aed/refuse/{{$pendingAed->id}}/img_a" class="btn btn-danger">
                                        <i class="pe-7s-close"></i>
                                    </a>
                                @endif
                                
                                @if($pendingAed->img_a_v == 1 )
                                    &nbsp; <em class="btn btn-info btn-fill" disabled>Validated</em>
                                @endif

                                @if($pendingAed->img_a_v == 2)
                                    &nbsp; <em class="btn btn-danger btn-fill" disabled>Refused</em>
                                @endif
                            </div>
                            @endif
                            @if($pendingAed->getImageB()!=null)
                                <div class="col-md-6">
                                    <b>Image 2</b>  <br>
                                    <img src="{{$pendingAed->getImageB()}}" width="50%;">
                                
                                    @if($pendingAed->img_b_v != 1 && $pendingAed->img_b_v != 2 )
                                        <a href="/admin/aed/validate/{{$pendingAed->id}}/img_b" class="btn btn-info" >
                                            <i class="pe-7s-back-2"></i>
                                        </a>
                                    @endif

                                    @if($pendingAed->img_b_v != 1 && $pendingAed->img_b_v != 2 && $isNewAed == 1)
                                        <a href="/admin/aed/refuse/{{$pendingAed->id}}/img_b" class="btn btn-danger">
                                            <i class="pe-7s-close"></i>
                                        </a>
                                    @endif
                                    
                                    @if($pendingAed->img_b_v == 1 )
                                        &nbsp; <em class="btn btn-info btn-fill" disabled>Validated</em>
                                    @endif

                                    @if($pendingAed->img_b_v == 2)
                                        &nbsp; <em class="btn btn-danger btn-fill" disabled>Refused</em>
                                    @endif
                                </div>
                            @endif
                            @if($pendingAed->getImageC()!=null)
                                <div class="col-md-6">
                                    <b>Image 3</b>  <br>
                                    <img src="{{$pendingAed->getImageC()}}" width="50%;">
                                
                                    @if($pendingAed->img_c_v != 1 && $pendingAed->img_c_v != 2 )
                                        <a href="/admin/aed/validate/{{$pendingAed->id}}/img_c" class="btn btn-info" >
                                            <i class="pe-7s-back-2"></i>
                                        </a>
                                    @endif

                                    @if($pendingAed->img_c_v != 1 && $pendingAed->img_c_v != 2 && $isNewAed == 1)
                                        <a href="/admin/aed/refuse/{{$pendingAed->id}}/img_c" class="btn btn-danger">
                                            <i class="pe-7s-close"></i>
                                        </a>
                                    @endif
                                    
                                    @if($pendingAed->img_c_v == 1 )
                                        &nbsp; <em class="btn btn-info btn-fill" disabled>Validated</em>
                                    @endif

                                    @if($pendingAed->img_c_v == 2)
                                        &nbsp; <em class="btn btn-danger btn-fill" disabled>Refused</em>
                                    @endif

                                </div>
                            @endif
                            @if($pendingAed->getImageD()!=null)
                                <div class="col-md-6">
                                    <b>Image 4</b>  <br>
                                    <img src="{{$pendingAed->getImageD()}}" width="50%;">
                                
                                    @if($pendingAed->img_d_v != 1 && $pendingAed->img_d_v != 2 )
                                        <a href="/admin/aed/validate/{{$pendingAed->id}}/img_d" class="btn btn-info" >
                                            <i class="pe-7s-back-2"></i>
                                        </a>
                                    @endif

                                    @if($pendingAed->img_d_v != 1 && $pendingAed->img_d_v != 2 && $isNewAed == 1)
                                        <a href="/admin/aed/refuse/{{$pendingAed->id}}/img_d" class="btn btn-danger">
                                            <i class="pe-7s-close"></i>
                                        </a>
                                    @endif
                                    
                                    @if($pendingAed->img_d_v == 1 )
                                        &nbsp; <em class="btn btn-info btn-fill" disabled>Validated</em>
                                    @endif

                                    @if($pendingAed->img_d_v == 2)
                                        &nbsp; <em class="btn btn-danger btn-fill" disabled>Refused</em>
                                    @endif
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection