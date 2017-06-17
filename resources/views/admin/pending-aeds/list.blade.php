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
		    <div class="card">
		    	{{ $pendingAeds->links() }}
		        <div class="content table-responsive table-full-width">
		            <table class="table table-hover table-striped">
		                <thead>
		                	<th>AED Name</th>
		                	<th>Added by User</th>
		                	<th>From Group</th>
		                	<th>Permission</th>
		                	<th>Actions</th>
		                </thead>
		                <tbody>
			                @foreach ($pendingAeds as $aed)
								<tr>
									<td>{{ $aed->aedname }}</td>
									<td>{{ $aed->user->getName() }}</td>
									<td>{{ $aed->user->getGroupName() }}</td>
									<td>{{ $aed->user->getPermission() }}</td>
									<td>
										<a class="btn btn-info" href="/admin/pending-aed/{{$aed->id}}">
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

@section('scripts')
    <script type="text/javascript">
		$('.remove').click(function(e) {
			var groupID = $(this).attr('group-id');
			swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this group!",
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
						url : '/admin/group/' + groupID + '?_token=' + '{{ csrf_token() }}',
						type : 'DELETE',
						success : function(result){
							window.location.replace("/admin/pendingAeds");
						}
					});
					swal("Deleted!", "Your group has been deleted.", "success");
				}else {
					swal("Cancelled", "Your group is safe :)", "error");
				}
			});
		});
    </script>
@endsection

