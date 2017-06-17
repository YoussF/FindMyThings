@extends('admin.layouts.master')

@section('title')
	Dashboard - Citizen Map
@endsection

@section('left_menu')
	@include('admin.layouts.left_menu', array('current' => 'groups'))
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
		    <div class="card">
		    	{{ $members->links() }}
		        <div class="content table-responsive table-full-width">
		            <table class="table table-hover table-striped">
		                <thead>
		                	<th>Name</th>
		                	<th>Actions</th>
		                </thead>
		                <tbody>
			                @foreach ($members as $member)
								<tr>
									<td>{{ $member->user()->getName() }}</td>
									<td>
										<a href="/admin/user/{{ $member->user()->id }}" class="btn btn-info" >
											<i class="pe-7s-look" ></i>
										</a>
										<button class="btn btn-danger remove" group-id="{{$member->group_id}}" relation-id="{{$member->id}}">
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
			var relationID = $(this).attr('relation-id');
			var groupID = $(this).attr('group-id');
			swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this member!",
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
						url : '/admin/member/' + relationID + '?_token=' + '{{ csrf_token() }}',
						type : 'DELETE',
						success : function(result){
							window.location.replace(result);
						}
					});
					swal("Deleted!", "Your member has been removed.", "success");
				}else {
					swal("Cancelled", "Your member is safe :)", "error");
				}
			});
		});
    </script>
@endsection

