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
                                <p class="text-black-100 mb-1" style="font-weight: 500;">Total Users</p>
                                <h3 class="font-weight-bold">{{ $totalUsers }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">New Users This Month</p>
                                <h3 class="font-weight-bold">{{ $newUsersThisMonth }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">Active Users Today</p>
                                <h3 class="font-weight-bold">{{ $activeUsersToday }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">New Users Today</p>
                                <h3 class="font-weight-bold">{{ $newUsersToday }}</h3>
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
                    <div class="crud-table">
                        {{ $dataTable->table(['class' => 'table table-hover']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
