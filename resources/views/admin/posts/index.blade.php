@extends('layouts.admin')

@section('content')
    <div class="p-4">
        <h1 class="py-1 mb-4 font-weight-bold" style="letter-spacing: -1px;">Post Management</h1>

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
                                <p class="text-black-100 mb-1" style="font-weight: 500;">Total Posts</p>
                                <h3 class="font-weight-bold">{{ $totalPosts }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">New Posts This Month</p>
                                <h3 class="font-weight-bold">{{ $newPostsThisMonth }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">Active Posts Today</p>
                                <h3 class="font-weight-bold">{{ $activePostsToday }}</h3>
                            </div>
                        </div>
                        <div class="overview-card-wrapper">
                            <div class="overview-card-item">
                                <p class="text-black-100 mb-1" style="font-weight: 500;">New Posts Today</p>
                                <h3 class="font-weight-bold">{{ $newPostsToday }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p class="font-weight-bold text-black-50">POST MANAGEMENT</p>
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
