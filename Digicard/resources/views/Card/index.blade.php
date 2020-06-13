@extends('layouts.app')

@section('content')
	<div class="col-med-8" align="center" style="overflow: auto;">
		<h1>
			Cards
		</h1>
				
		@if (session('info'))
    		<strong>
    			<div class="alert alert-success alert-dismissable">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('info') }}
    			</div>
    		</strong>
    	@endif
    	@if (session('error'))
    		<strong>
    			<div class="alert alert-danger alert-dismissable">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('error') }}
    			</div>
    		</strong>
    	@endif
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>
						Name
					</th>
					<th>
						Company
					</th>
					<th>
						Email
					</th>
					<th>
						Telephone
					</th>
					<th colspan="3" style="text-align: center;">
						Options
					</th>
				</tr>
			</thead>
			<tbody>
			@if($cards -> isEmpty())
					<tr>
						<td colspan="4" align="center">No data to show.</td>
					</tr>
				@else
					@foreach($cards as $card)
						<tr>
							<td>
								{{ $card -> name }}
							</td>
							<td>
								{{ $card -> company }}
							</td>
							<td>
								{{ $card -> email }}
							</td>
							<td>
								{{ $card -> telephone }}
							</td>
							<td>
								
							</td>
							<td>
								<a href="{{ route('Card.edit', $card -> id)}}" class="btn btn-primary">Edit</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Card.destroy', $card -> id)}}" class="delete" id="{{ $card  -> id }}">
									{!! method_field('DELETE') !!}
								 	{!! csrf_field() !!}
									<button type="submit" class="btn btn-danger">Remove</button>
								</form>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>	
	<div class="col-lg-12">
		<div style="float: right;">
			<a href="{{ route('ShareCard')}}" class="btn btn-primary">Share My Card</a><span style="width: 100px;"></span>
		</div>
		<div style="float: right;"> 
			<a href="{{ route('Card.create') }}" class="btn btn-primary pull-right">New</a>
		</div>
	</div>
	<div id="testmodal" class="modal fade" data-backdrop="false">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" class="pull-right">&times;</button>
	            </div>
	            <div class="modal-body">
	                <p><b>WARNING!!</b></p>
	                <p>Removing this record cannot be undone!</p>
	                <p>Are you sure you want to continue?</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" id="cancelado" data-dismiss="modal">Cancel</button>
	                <button type="button" class="btn btn-warning" id="continuado">Continue</button>
	            </div>
	        </div>
	    </div>
	</div>		
	<script>
	    $(".delete").on("submit", function(e){
	        $("#testmodal").modal('show');
	        var boton_id = $(this).closest("form").attr('id'); 

	        e.preventDefault();
	        boton_id = "#"+boton_id;
	        $('#testmodal .modal-footer button').on('click', function(event) {
	  			var $button = $(event.target);
	      		if($button[0].id == 'continuado')
	  				$(boton_id).submit();
	  			else
	  				$("#testmodal").modal('hide');		
			});
	    });
	</script>	
@endsection