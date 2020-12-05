@extends('base')

@section('page-title', 'Users')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h3>Users</h3>
            </div>
            <div class="col-6">
                <a href="{{ route('user-add') }}" target="_parent" class="btn btn-light float-right">
                    <i class="fas fa-plus"></i>
                    Add new
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ (!is_null($user->avatar)) ? asset('avatars/' . $user->avatar) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="user-avatar-mini">
                            </td>
                            <td>
                                <a href="{{ route('user-profile', ['username' => $user->name]) }}" target="_parent">
                                    {{ '@' . $user->name }}
                                </a>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @foreach($user->roles as $role)

                                    @switch($role->name)

                                        @case('Admin')
                                            <span class="badge badge-success">{{ $role->name }}</span>
                                            @break

                                        @case('User')
                                            <span class="badge badge-warning">{{ $role->name }}</span>
                                            @break

                                        @default
                                            <span class="badge badge-secondary">No role</span>

                                    @endswitch

                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
