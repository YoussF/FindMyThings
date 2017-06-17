@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'scores'))
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
		    <div class="card">
		    	{{ $scores->links() }}
		        <div class="content table-responsive table-full-width">
		            <table class="table table-hover table-striped">
		                <thead>
		                	<th>Name</th>
		                	<th>Score</th>
		                	<th>Actions</th>
		                </thead>
		                <tbody>
			                @foreach ($scores as $score)
								<tr>
									<td>{{ $score->getName() }}</td>
									<td>{{ $score->getScore() }}</td>
									<td>
										<a href="/admin/score/{{$score->getId()}}" class="btn btn-info" >
											<i class="pe-7s-look" ></i>
										</a>
									</td>
								</tr>
							@endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
@endsection
