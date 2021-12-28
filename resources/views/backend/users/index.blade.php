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
                    @include('backend.users.partials._card-header')
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