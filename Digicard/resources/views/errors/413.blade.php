@extends('layouts.app')

@section('content')
<div align="center">
	
	<h2>We're sorry. This page is not availabe!</h2>
	<a href="{{ route('Card.index') }}" class="btn btn-primary">OK</a>
</div>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection