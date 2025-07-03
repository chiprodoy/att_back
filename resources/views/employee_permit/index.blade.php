{{-- filepath: c:\Users\mrizk\szli\resources\views\employee_permit\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Employee Permit')

@section('header')
    <h1 class="m-0">Employee Permit</h1>
@endsection

@section('content')
@php
    $statusList = [1 => 'Cuti', 2 => 'Sakit', 3 => 'Izin', 4 => 'Alfa'];
@endphp
<div class="card">
    <div class="card-header">
        <a href="{{ route('employee_permit.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Permit
        </a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('employee_permit.index') }}" class="row mb-3">
            <div class="col-md-3 mb-2">
                <input type="text" name="nama" class="form-control" placeholder="Cari Nama User" value="{{ request('nama') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-2 mb-2">
                <select name="tahun" class="form-control">
                    <option value="">Pilih Tahun</option>
                    @foreach(\App\Models\EmployeePermit::selectRaw('YEAR(date_permit) as year')->distinct()->pluck('year') as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <select name="status" class="form-control">
                    <option value="">Pilih Status</option>
                    @foreach($statusList as $key => $label)
                        <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <button type="submit" class="btn btn-info btn-block"><i class="fas fa-search"></i> Filter</button>
            </div>
            <div class="col-md-1 mb-2">
                <a href="{{ route('employee_permit.index') }}" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </form>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Tanggal Permit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permits as $permit)
                <tr>
                    <td>{{ ($permits->currentPage() - 1) * $permits->perPage() + $loop->iteration }}</td>
                    <td>{{ $permit->user->name ?? '-' }}</td>
                    <td>{{ $statusList[$permit->permit_status] ?? '-' }}</td>
                    <td>{{ $permit->date_permit ? \Carbon\Carbon::parse($permit->date_permit)->format('d-m-Y') : '-' }}</td>
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
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $permits->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection