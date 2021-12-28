@extends('layouts.master-backend')

@section('title')
Roles
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card rounded-lg">
                    @include('backend.roles.partials._card-header')
                    <div class="card-body">
                        @include('backend.roles._table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ mix('css/form.css') }}">
@endpush

@push('scripts')

<script src="{{ mix('js/form.js') }}"></script>
{{-- config script validation,sweetalert2,etc --}}
@include('script.script-global')
@endpush