<div class="pasien-show" style="display:none">
    <div class="form-group">
        {!! Form::label('name', 'Nama Pengguna'); !!}
        {!! Form::text('name', null, ['autocomplete' => 'off','class' => 'form-control form-control-sm','id'=>
        'name','placeholder' => 'Nama Pengguna']) !!}
        <small class="text-danger" id="err-name" style="display:none"></small>
    </div>
</div>

<div class="form-group">
    <label for="username">Username</label>
    {!! Form::text('username', null, array('autocomplete' => 'off','id' => 'username','placeholder' =>
    'Username','class' => 'form-control form-control-sm '.($errors->has('username') ? 'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-username" style="display:none"></small>
    <small class="text-info">Username tanpa spasi</small>
</div>

<div class="pegawai-show">
    <div class="form-group">
        {!! Form::label('email', 'Email'); !!}
        {!! Form::text('email', null, ['autocomplete' => 'off','class' => 'form-control form-control-sm','id'=>
        'email','placeholder' => 'example@mail.com']) !!}
        <small class="text-danger" id="err-email" style="display:none"></small>
    </div>
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