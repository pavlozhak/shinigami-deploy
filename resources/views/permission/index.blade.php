@extends('base')

@section('page-title', 'Permissions')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h3>Permissions</h3>
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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Group</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td>
                                {{ $permission->slug }}
                            </td>
                            <td>
                                {{ $permission->group }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('permission-edit', ['permission_id' => $permission->id]) }}" target="_parent"
                                       title="Edit" class="btn btn-warning">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <a role="button" class="btn btn-danger" id="permission-remove-btn" title="Remove"
                                       data-id="{{ $permission->id }}" data-toggle="modal"
                                       data-target="#permission-remove-modal">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('permission.modal.remove')

@endsection
