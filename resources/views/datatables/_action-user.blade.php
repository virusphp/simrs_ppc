{!! Form::button('<i class="c-icon fas fa-pencil-alt"></i>', [
'type' => 'button',
'class' => 'edit-user-btn btn btn-warning btn-sm btn-xs mx-1',
'data-idx' => $idx,
'data-name' => $name
]) !!}

{!! Form::button('<i class="c-icon fas fa-trash"></i>', [
'type' => 'button',
'class' => 'btn btn-danger btn-sm btn-xs mx-1',
'id' => 'delete-user',
'data-idx' => $idx,
'data-name' => $name
]) !!}