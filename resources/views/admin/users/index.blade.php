@extends('layouts.admin')

@section('content')
    <div class="p-4">
        <h1 class="py-1 mb-4 font-weight-bold" style="letter-spacing: -1px;">User Management</h1>

        @if ($message = session('success'))
            <div class="alert alert-success mb-4">
                <span>{{ $message }}</span>
            </div>
        @endif

        <div class="mb-5">
            <p class="font-weight-bold text-black-50">STATISTICS OVERVIEW</p>
            <div class="card">
                <div class="card-body p-0">
                    <div class="overview-cards">
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-50 mb-1" style="font-weight: 500;">New Users Today</p>
                                <h3 class="font-weight-bold">2,500</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-50 mb-1" style="font-weight: 500;">New Users Today</p>
                                <h3 class="font-weight-bold">2,500</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-50 mb-1" style="font-weight: 500;">New Users Today</p>
                                <h3 class="font-weight-bold">2,500</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-50 mb-1" style="font-weight: 500;">New Users Today</p>
                                <h3 class="font-weight-bold">2,500</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="font-weight-bold text-black-50">USER MANAGEMENT</p>
            <div class="card">
                <div class="card-body p-0">
                    <div class="px-4 py-3 d-flex align-items-center">
                        <h5 class="m-0 font-weight-bold">Users Table</h5>
                        <div class="ml-auto">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary px-3 py-2 font-weight-bolder">ADD NEW USER</a>
                        </div>
                    </div>
                    <div class="crud-table">
                        <table class="table table-hover w-100">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($users->items() as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-secondary font-weight-bold mr-2">EDIT</a>

                                            <button type="submit" class="btn btn-outline-danger font-weight-bold">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Tidak ada data.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
