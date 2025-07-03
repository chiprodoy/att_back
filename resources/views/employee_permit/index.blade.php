@extends('layouts.app')

@section('title', 'Employee Permit')

@section('header')
    <h1 class="m-0">Employee Permit</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('employee_permit.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Permit
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permits as $permit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permit->date_permit }}</td>
                    <td>{{ $permit->permit_status }}</td>
                    <td>{{ $permit->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('employee_permit.edit', $permit->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('employee_permit.destroy', $permit->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection