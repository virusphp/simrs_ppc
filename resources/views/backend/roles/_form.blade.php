<div class="col-md-12">
	<div class="form-group">
		<label for="name">Nama Role</label>
		{!! Form::text('name', null, array('autocomplete' => 'off','id' => 'name','placeholder' =>
		'Nama Roles','class' => 'form-control form-control-sm '.($errors->has('name') ? 'is-invalid' : ''))) !!}
		<small class="text-danger" id="err-name" style="display:none"></small>
	</div>

	<div class="form-group">
		<table class="table">
			<tr>
				<th><input type="checkbox" value="1" class="all"> Grant All</th>
				<th>Module Name</th>
				<th>Access</th>
			</tr>
			@forelse (config('menus') as $module)
			<tr>
				<td><input type="checkbox" value="1" name="checkModule[]" class="check-modules">
					Select All</td>
				<td>{{ $module['display_name'] }}</td>
				<td>
					@forelse ($module['action'] as $permission)
					<label class="permissions" for="{{ $permission }}">
						<input type="checkbox" value="{{ $permission.'-'.$module['name'] }}" class="check-access"
							name="permissions[]" {{ $role->hasPermissionTo($permission.'-'.$module['name']) ?
						'checked' : '' }}>
						{{ ucwords($permission) }}
					</label>
					@empty
					There is no permission for this module
					@endforelse
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="2">No Roles</td>
			</tr>
			@endforelse
		</table>
	</div>
</div>