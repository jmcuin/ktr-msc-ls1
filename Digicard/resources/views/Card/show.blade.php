@extends('layouts.app')

@section('content')

		<div class="container">
		    <h3 align="center">My Card</h3>
			<div class="col-lg-12 well">
				<div class="row" align="center"> 
					<div class="col-sm-6">
						<span style="font-size: 15px; font-weight: bolder;">Name:</span> {{ $user -> name }}
					</div>
					<div class="col-sm-6">
						<span style="font-size: 15px; font-weight: bolder;">Company:</span> {{ $user -> company }}
					</div>
				</div>
			</div>
			<div class="col-lg-12 well">
				<div class="row" align="center"> 
					<div class="col-sm-6">
						<span style="font-size: 15px; font-weight: bolder;">E-mail:</span> {{ $user -> email }}
					</div>
					<div class="col-sm-6">
						<span style="font-size: 15px; font-weight: bolder;">Telephone:</span> {{ $user -> telephone }}				
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div style="float: right;"> 
					<a href="{{ route('Card.index') }}" class="btn btn-primary">Return</a>	
				</div>
			</div>
		</div>
@endsection