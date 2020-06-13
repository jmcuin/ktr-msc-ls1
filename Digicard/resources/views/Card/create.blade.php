@extends('layouts.app')

@section('content')

	<form method="POST" action="{{ route('Card.store') }}">
		{!! csrf_field() !!}
		<div class="container">
		    <h3 align="center">Card Register</h3>
			<div class="col-lg-12 well">
				<div class="row" align="center"> 
					<div class="col-sm-6">
						<label for="name">
							Name
							<input type="text" name="name" value="{{old('name')}}" class="form-control">
							{{ $errors -> first('name') }}
						</label>
					</div>
					<div class="col-sm-6">
						<label for="company">
							Company
							<input type="text" name="company" value="{{old('company')}}" class="form-control">
							{{ $errors -> first('company') }}
						</label>
					</div>
				</div>
			</div>
			<div class="col-lg-12 well">
				<div class="row" align="center"> 
					<div class="col-sm-6">
						<label for="email">
							E-mail
							<input type="text" name="email" value="{{old('email')}}" class="form-control">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-6">
						<label for="telephone">
							Telephone
							<input type="text" name="telephone" value="{{old('telephone')}}" class="form-control">
							{{ $errors -> first('telephone') }}
						</label>				
					</div>
				</div>
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