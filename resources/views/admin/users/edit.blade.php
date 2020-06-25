@extends('layouts.admin')

@section('content')
    <div class="p-4">
        <h1 class="py-1 mb-4 font-weight-bold" style="letter-spacing: -1px;">User Management</h1>

        <div class="mb-5">
            <p class="font-weight-bold text-black-50">EDIT USER</p>
            <div class="card" style="max-width: 500px">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user-form-name">Name</label>
                            <input type="name" name="name" class="form-control" id="user-form-name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="user-form-email">Email address</label>
                            <input type="email" name="email" class="form-control" id="user-form-email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="user-form-type">Account Type</label>
                            <select class="form-control" name="type" id="user-form-type">
                                <option {{ $user->type === 'user' ? 'selected' : '' }} value="user">User</option>
                                <option {{ $user->type === 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user-form-password">Password</label>
                            <input type="password" name="password" class="form-control" id="user-form-password">
                        </div>
                        <div class="form-group">
                            <label for="user-form-confirm-password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="user-form-confirm-password">
                        </div>

                        <button type="submit" class="btn btn-primary px-3 font-weight-bold">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
