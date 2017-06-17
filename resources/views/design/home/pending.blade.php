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
                   <table class="table table-striped">
                    <tbody>
                        @foreach($pendings as $pending)
                            <tr>
                                <td>{{$pending->getName()}}</td>
                                <td>    
                                    <a class="btn btn-primary btn-block btn-outline" href="/pending-aed/{{$pending->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
@endsection