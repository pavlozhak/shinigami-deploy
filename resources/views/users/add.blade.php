@extends('base')

@section('page-title', 'Add Users')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <h3>Add User</h3>
            </div>
            <div class="col-4">

            </div>
        </div>

        @include('layouts.error')

        @include('layouts.success')

        <div class="row mt-3 mb-3">
            <div class="col-12">
                <img src="{{ asset('images/default-avatar.png') }}" alt="User avatar" title="User avatar" class="user-avatar-preview">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form method="post" action="{{  route('user-store') }}" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="avatar" id="inputAvatar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="inputEmail3" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password (min 8, max 20)</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" minlength="8" maxlength="20" id="inputPassword3" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputUsername">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i>
                                Create new one
                            </button>
                        </div>
                    </div>

                    @csrf

                </form>
            </div>
        </div>
    </div>

@endsection
