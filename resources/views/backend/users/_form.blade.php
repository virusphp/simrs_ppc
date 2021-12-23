<div class="form-group">
    {!! Form::label('jenispemakai', 'Jenis Pemakai'); !!}
    <div class="col-md-12 col-form-label">
        <div class="form-check form-check-inline mr-1">
            {!! Form::radio('jenispemakai','pegawai',false,['class' => 'form-check-input','id'=>
            'jenispemakai_0','required','checked']) !!}
            {!! Form::label('jenispemakai_0','Pegawai',['class' => 'form-check-label']) !!}
        </div>
        <div class="form-check form-check-inline mr-1">
            {!! Form::radio('jenispemakai','pasien',false,['class' => 'form-check-input','id'=> 'jenispemakai_1']) !!}
            {!! Form::label('jenispemakai_1','Pasien',['class' => 'form-check-label']) !!}
        </div>
    </div>
    <small class="text-danger" id="err-jenispemakai" style="display:none"></small>
</div>
<div class="pasien-show" style="display:none">
    <div class="form-group">
        <input type="hidden" name="pasien_id" id="pasien_id" value="">
        {!! Form::label('nama_pasien', 'Nama Pasien'); !!}
        {!! Form::text('nama_pasien', null, ['autocomplete' => 'off','class' => 'form-control form-control-sm','id'=>
        'nama_pasien','placeholder' => 'Nama Pasien']) !!}
        <small class="text-danger" id="err-nama_pasien" style="display:none"></small>
        <small class="text-danger" id="err-pasien_id" style="display:none"></small>
    </div>
</div>
<div class="pegawai-show">
    <div class="form-group">
        <input type="hidden" name="pegawai_id" id="pegawai_id" value="">
        {!! Form::label('nama_pegawai', 'Nama Pegawai'); !!}
        {!! Form::text('nama_pegawai', null, ['autocomplete' => 'off','class' => 'form-control form-control-sm','id'=>
        'nama_pegawai','placeholder' => 'Nama Pegawai']) !!}
        <small class="text-danger" id="err-nama_pegawai" style="display:none"></small>
        <small class="text-danger" id="err-pegawai_id" style="display:none"></small>
    </div>
</div>

<div class="form-group">
    <label for="username">Username</label>
    {!! Form::text('username', null, array('autocomplete' => 'off','id' => 'username','placeholder' =>
    'Username','class' => 'form-control form-control-sm '.($errors->has('username') ? 'is-invalid' : ''))) !!}
    <small class="text-danger" id="err-username" style="display:none"></small>
    <small class="text-info">Username tanpa spasi</small>
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