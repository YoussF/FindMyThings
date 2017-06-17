@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'aeds'))
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="wp">Visible AED</h4>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table">
                            <tbody>
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'AED Name :',
                                                'element_value' => $aed->aedname
                                            ))                            
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Model :',
                                                'element_value' => $aed->model
                                            ))                            
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Street :',
                                                'element_value' => $aed->street_fr
                                            ))
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Number :',
                                                'element_value' => $aed->num
                                            ))
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Post code :',
                                                'element_value' => $aed->postcode
                                            ))
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Municipality :',
                                                'element_value' => $aed->municipality_fr
                                            ))
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Latitude :',
                                                'element_value' => $aed->lat
                                            ))   
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Longitude :',
                                                'element_value' => $aed->lon
                                            ))                                                                      
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'AED Expiration :',
                                                'element_value' => $aed->aedexpiration
                                            ))                                   
                                @include('admin.aeds.components.element', 
                                            array(
                                                'element_name' => 'Info Place :',
                                                'element_value' => $aed->infplace_fr
                                            ))                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection