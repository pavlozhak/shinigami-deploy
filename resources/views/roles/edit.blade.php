@extends('base')

@section('page-title', 'Edit Roles')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3>
                    Edit role
                </h3>
            </div>
        </div>

        @include('layouts.error')

        @include('layouts.success')

        <div class="row mt-3">
            <div class="col-12">
                <form action="{{ route('role-save') }}" method="post">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputName" value="{{ $role->name }}"
                                   minlength="2" maxlength="200" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSlug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control" id="inputSlug" value="{{ $role->slug }}"
                                   minlength="2" maxlength="200" required>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $role->id }}"/>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    @csrf
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <h3>
                    Permissions
                </h3>
            </div>
            <div class="col-6">
                <a href="{{ route('permission-add') }}" target="_parent" class="btn btn-light float-right">
                    <i class="fas fa-plus"></i>
                    Add new
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <form action="{{ route('role-set-permission') }}" method="post">

                    @foreach($groups as $group)
                        <h5>{{ ucfirst($group->group) }}</h5>

                        @foreach($permissions as $permission)

                            @if($permission->group == $group->group)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                           id="{{ 'checkbox_' . $permission->slug }}" name="{{ $permission->slug }}" value="{{ $permission->slug }}" {{ ($role->hasPermission($permission->slug)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ 'checkbox_' . $permission->slug }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endif

                        @endforeach

                        <hr>

                    @endforeach

                    <input type="hidden" name="id" value="{{ $role->id }}"/>

                    <div class="form-group row mt-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    @csrf
                </form>
            </div>
        </div>

    </div>

@endsection
