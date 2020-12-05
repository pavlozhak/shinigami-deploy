@extends('base')

@section('page-title', 'Access denied')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Permission error</h1>
                    <p class="lead">You do not have permission to view this section</p>
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Go back home</a>
                </div>
            </div>
        </div>
    </div>

@endsection
