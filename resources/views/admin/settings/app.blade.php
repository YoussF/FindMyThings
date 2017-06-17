@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'dashboard'))
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4">
            <div class="card center">
                <div class="header">
                   <p class="text-muted">
                   		<i class="pe-7s-users max_icon_size"></i> <br>
						{{$users_count}}
                   </p>
                </div>
                <div class="content center">
                	<p class="text-muted">
						<a href="/admin/users"  class="btn btn-success btn-fill">
	                		MANAGE USERS
	                	</a>
                	</p>
                </div>
            </div>
        </div>
		<div class="col-md-4">
            <div class="card center">
                <div class="header">
                   <p class="text-muted">
                   		<i class="pe-7s-keypad max_icon_size"></i> <br>
						{{$groups_count}}
                   </p>
                </div>
                <div class="content center">
                	<p class="text-muted">
						<a href="/admin/groups"  class="btn btn-success btn-fill">
	                		MANAGE GROUPS
	                	</a>
                	</p>
                </div>
            </div>
        </div>
		<div class="col-md-4">
            <div class="card center">
                <div class="header">
                   <p class="text-muted">
                   		<i class="pe-7s-map max_icon_size" ></i> <br>
						{{$aeds_count}}
                   </p>
                </div>
                <div class="content center">
                	<p class="text-muted">
						<a href="/admin/aeds"  class="btn btn-success btn-fill">
	                		MANAGE AEDS
	                	</a>
                	</p>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
			    <div class="header">
			        <p class="category">
			        	<i class="fa fa-file"></i>
			        	Logs
			        </p>
			    </div>
			    <div class="content table-responsive table-full-width">
			        <table class="table table-hover">
			            <tbody>
							@foreach($logs as $log)
								<tr>
									<td>{{$log->action}}</td>
									<td>{{$log->user->name}}</td>
									<td>{{$log->created_at->diffForHumans()}}</td>
								</tr>
							@endforeach
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
			    <div class="header">
			        <p class="category">
			        	<i class="pe-7s-map"></i>
			        	PENDING AEDS :
			        </p>
			    </div>
			    <div class="content table-responsive table-full-width">
			        <table class="table table-hover">
			            <tbody>
							@foreach($pendings_aeds as $aed)
								<tr>
									<td>{{$aed->user->name}} : </td>
									<td>{{$aed->aedname}}</td>
									<td>{{$aed->created_at->diffForHumans()}}</td>
								</tr>
							@endforeach
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>
@endsection