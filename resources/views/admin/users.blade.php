@extends('layouts.admin')

@section('content')
<div class="p-4">
    <h1 class="mb-4">Users</h1>

    <s-data-table
        :fields="[
            {key: 'name', label: 'Nama'},
            {key: 'email', label: 'Email'},
            {key: 'type', label: 'Tipe'}
        ]"
        url="/api/users"
    ></s-data-table>
</div>
@endsection