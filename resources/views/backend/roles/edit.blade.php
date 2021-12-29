@extends('layouts.master-backend')
@section('title')
Edit Roles
@endsection
@section('content')
<div class="container-fluid">
	<div class="fade-in">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="float-left">
							<h4>Edit Role</h4>
						</div>
						<div class="float-right">
							<a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> Back</a>
						</div>
					</div>


					{!! Form::model($role, array('route' => ['roles.update', $role->id], 'method'=>'PATCH', 'id' =>
					'user-form')) !!}
					<div class="card-body">
						@include('backend.roles._form')
					</div>

					<div class="card-footer">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<button type="submit" class="btn btn-sm btn-warning">Update</button>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
@include('backend.roles.scripts-form')
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('lib/icheck/square/orange.css') }}">
<style>
	.permissions {
		margin-right: 10px;
	}
</style>
@endpush