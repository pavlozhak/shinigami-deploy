@extends('base')

@section('page-title', 'Profile @' . $user->name)

@section('content')

    <div class="container mt-4">

        <div class="row">
            <div class="col-12">
                <img src="{{ (!is_null($user->avatar)) ? asset('avatars/' . $user->avatar) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="user-avatar-preview mx-auto d-block">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <h1 class="display-4">{{ '@' . $user->name }}</h1>
                <div class="dropdown-divider"></div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">

            </div>
        </div>

    </div>

@endsection
