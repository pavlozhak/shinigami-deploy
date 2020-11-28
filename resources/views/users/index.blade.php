@extends('base')

@section('page-title', 'Users')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <h3>Users</h3>
            </div>
            <div class="col-4">
                <a href="{{ route('user-add') }}" target="_parent" class="btn btn-light">
                    <i class="fas fa-plus"></i>
                    Add new
                </a>
            </div>
        </div>
    </div>

@endsection
