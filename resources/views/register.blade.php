@extends('welcome')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			@if(session()->has('success'))
			<div class="alert altert-warning alert-dismissible fade show" role="alert">
				<strong>success</strong>{{session()->get('success')}}
				<button><span aria-hidden="true">&times;</span></button>
			</div>
			@endif
			<form action="{{route('submit.user')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="">name</label>
					<input type="text" class="form-controller" name="name">
				</div>
				<div class="form-group">
					<label for="">email</label>
					<input type="text" class="form-controller" name="name">
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="text" class="form-controller" name="name">
				</div>
			</form>
		</div>
	</div>
</div>