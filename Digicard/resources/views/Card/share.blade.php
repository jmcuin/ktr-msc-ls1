@extends('layouts.app')

@section('content')

	<form method="POST" action="{{ route('CardShared') }}">
		{!! csrf_field() !!}
		<div class="container">
		    <h3 align="center">Card Share</h3>
			<div class="col-lg-12 well">
				<div class="row" align="center"> 
					<div class="col-sm-4">
						Name: {{ $owner -> name }}
					</div>
					<div class="col-sm-4">
						Company: {{ $owner -> company }}
					</div>
					<div class="col-sm-4">
						Share with: 
						<select name="user">
							<option value="0">Select a user to share card with:</option>
							<@foreach($users as $user)
								<option value="{{ $user -> id }}">{{ $user -> name }}	
								</option>	
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div style="height: 50px;">
				
			</div>
			<div class="col-lg-12">
				<div style="float: right;"> 
					<input type="submit" value="Save" class="btn btn-primary" >
					<a href="{{ route('Card.index') }}" class="btn btn-primary">Return</a>	
				</div>
			</div>
		</div>		
	</form>
@endsection