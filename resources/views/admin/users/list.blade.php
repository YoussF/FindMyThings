@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'users'))
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
            <div class="card">
                <div class="content">
                	<div class="row filter-form">
		                <form method="POST" action="/admin/users/search">
		                    {{ csrf_field() }}
		                    <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="" name="name"  placeholder="Type a name" >
		                    </div>
		                    <div class="col-md-1">
		                        <button type="submit" class="btn btn-warning btn-fill">Find</button>
                            </div>
		                </form>
		            </div>
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		    <div class="card">
		    	{{ $users->links() }}
		        <div class="content table-responsive table-full-width">
		            <table class="table table-hover table-striped">
		                <thead>
		                    <th></th>
		                	<th>Name</th>
		                	<th>Group</th>
		                	<th>Actions</th>
		                </thead>
		                <tbody>
			                @foreach ($users as $user)
								<tr>
									<td>@if($user->isGoogle()) <i class="fa fa-google" aria-hidden="true"></i> @endif</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->getGroupName()}}</td>
									<td>
										<a class="btn btn-info" href="/admin/user/{{$user->id}}">
											<i class="pe-7s-look"></i>
										</a>
										<button class="btn btn-danger remove" user-id="{{$user->id}}">
											<i class="pe-7s-trash"></i>
										</button>
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

@section('scripts')
    <script type="text/javascript">
		$('.remove').click(function(e) {
			var userID = $(this).attr('user-id');
			swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this user!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, delete it!",
			  cancelButtonText: "No, cancel plx!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
					e.preventDefault();
					$.ajax({
						url : '/admin/user/' + userID + '?_token=' + '{{ csrf_token() }}',
						type : 'DELETE',
						success : function(result){
							window.location.replace("/admin/users");
						}
					});
					swal("Deleted!", "Your user has been deleted.", "success");
				}else {
					swal("Cancelled", "Your user is safe :)", "error");
				}
			});
		});
    </script>
@endsection