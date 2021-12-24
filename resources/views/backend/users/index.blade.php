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
                    <div class="card-header d-flex-align-items-center pb-0">
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
                        <div class="row mb-3">
                            <div class="col-lg-12 d-inline-flex justify-content-end align-items-center">
                                <select class="form-control form-control-sm col-lg-3 m-1" id="status" name="status">
                                    <option value="ALL">STATUS</option>
                                    <option value="1">AKTIF</option>
                                    <option value="0">NONAKTIF</option>
                                </select>
                                <input type="text" class="form-control form-control-sm col-lg-3 m-1" id="term"
                                    name="term" placeholder="Pencarian">
                                <button type="button" id="search-btn" class="btn btn-sm btn-outline-primary mx-1"><i
                                        class="c-icon fas fa-search mx-2"></i></a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                @include('backend.users._table')
                            </div>
                        </div>
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