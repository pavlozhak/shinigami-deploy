@extends('base')

@section('page-title', 'Edit Permission')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3>
                    Edit permission
                </h3>
            </div>
        </div>

        @include('layouts.error')

        @include('layouts.success')

        <div class="row mt-3">
            <div class="col-12">
                <form action="{{ route('permission-save') }}" method="post">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputName" value="{{ $permission->name }}"
                                   minlength="2" maxlength="200" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSlug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control" id="inputSlug" value="{{ $permission->slug }}"
                                   minlength="2" maxlength="200" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputGroup" class="col-sm-2 col-form-label">Group</label>
                        <div class="col-sm-10">
                            <input type="text" name="group" class="form-control" id="inputGroup" value="{{ $permission->group }}"
                                   minlength="2" maxlength="200" required>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $permission->id }}"/>

                    <div class="form-group row">
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
