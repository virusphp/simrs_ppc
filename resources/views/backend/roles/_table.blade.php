<table id="tabel-roles" width="100%" class="table table-sm table-hover table-striped">
    <thead>
        <tr class="bg-abu">
            <th>#</th>
            <th>Nama Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">
                    <i class="fas fa-eye"></i>
                </a>

                <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                {!! Form::button('<i class="fas fa-trash"></i>', [
                'class' => 'btn btn-sm btn-danger',
                'type' => 'btn btn-danger btn-sm btn-xs',
                'id' => 'delete-role',
                'data-idx' => $role->id,
                'data-name' => $role->name
                ]) !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>