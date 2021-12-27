<div class="form-group">
    <label for="name">Nama</label>
    {!! Form::text('name', null, array('autocomplete' => 'off','id' => 'name','placeholder' =>
    'name','class' => 'form-control form-control-sm '.($errors->has('name') ? 'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-name" style="display:none"></small>
</div>

<div class="form-group">
    <label for="username">Username</label>
    {!! Form::text('username', null, array('autocomplete' => 'off','id' => 'username','placeholder' =>
    'Username','class' => 'form-control form-control-sm '.($errors->has('username') ? 'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-username" style="display:none"></small>
    <small class="text-info">Username tanpa spasi</small>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email'); !!}
    {!! Form::text('email', null, ['autocomplete' => 'off','class' => 'form-control form-control-sm','id'=>
    'email','placeholder' => 'example@mail.com']) !!}
    <small class="text-danger" id="err-email" style="display:none"></small>
</div>

<div class="form-group">
    {!! Form::label('roles', 'Roles'); !!}
    {!! Form::select('roles', ['' => '--Pilih--']+Spatie\Permission\Models\Role::pluck('name',
    'name')->all(), null, ['width' =>
    '100%', 'id' => 'roles', 'class' => 'form-control form-control-sm select2bs4'.($errors->has('roles')
    ?
    'is-invalid' : '')]) !!}
    <small class="text-danger" id="err-email" style="display:none"></small>
</div>

<div class="form-group">
    <label for="password">Password</label>
    {!! Form::password('password', array('autocomplete' => 'off','id'=> 'password','placeholder' => 'Password','class'
    => 'form-control form-control-sm '.($errors->has('password') ? 'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-password" style="display:none"></small>
</div>

<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    {!! Form::password('password_confirmation', array('placeholder' => 'Password Confirmation', 'id' =>
    'password_confirmation','class' => 'form-control form-control-sm '.($errors->has('password_confirmation') ?
    'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-password_confirmation" style="display:none"></small>
</div>