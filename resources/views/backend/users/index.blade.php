@extends('layouts.master-backend')

@section('title')
User
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div id="tabel-message-success" class="alert alert-success">
                    <!-- success message -->
                </div>
                <div id="tabel-message-error" class="alert alert-danger">
                    <!-- success message -->
                </div>
                <div class="card rounded-lg">
                    <div class="card-header">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item float-left">
                                <h4>Daftar User</h4>
                            </li>
                            <li class="list-inline-item float-right">
                                <div class="d-none d-md-block">
                                    <button id="add-user" class="add-user-btn btn btn-sm btn-primary mb-3 mr-auto">
                                        <i class="c-icon fa fa-plus"></i>
                                        Tambah User
                                    </button>
                                </div>
                                <div class="d-md-none float-right">
                                    <button class="add-user-btn btn btn-sm btn-primary mb-3">
                                        <i class="fas fa-plus"></i>

                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @include('backend.users._table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.users.modal-user')
@endsection

@push('css')
<link rel="stylesheet" href="{{ mix('css/form.css') }}">
@endpush

@push('scripts')

<script src="{{ mix('js/form.js') }}"></script>
{{-- config script validation,sweetalert2,etc --}}
@include('script.script-global')
{{-- this page script --}}
@include('backend.users.scripts')
@endpush