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
		    <div class="card">
		    	{{ $aeds->links() }}
		        <div class="content table-responsive table-full-width">
		            <table class="table table-hover table-striped">
		                <thead>
		                	<th>Name</th>
		                	<th>Actions</th>
		                </thead>
		                <tbody>
			                @foreach ($aeds as $aed)
								<tr>
									<td>{{ $aed->aedname }}</td>
									<td>
										<a href="/admin/aed/{{$aed->id}}" class="btn btn-info" >
											<i class="pe-7s-look" ></i>
										</a>
										<button class="btn btn-danger remove" aed-id="{{$aed->id}}">
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
			var aedID = $(this).attr('aed-id');
			swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this aed!",
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
						url : '/admin/aed/' + aedID + '?_token=' + '{{ csrf_token() }}',
						type : 'DELETE',
						success : function(result){
							window.location.replace("/admin/aeds");
						}
					});
					swal("Deleted!", "Your aed has been deleted.", "success");
				}else {
					swal("Cancelled", "Your aed is safe :)", "error");
				}
			});
		});
    </script>
@endsection

