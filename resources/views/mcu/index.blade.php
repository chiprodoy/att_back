@extends('layouts.app')

@section('title', 'Data MCU')

@section('header')
    <h1 class="m-0">Data MCU</h1>
@endsection

@section('content')
<div class="card">
    @role('superadmin')
    <div class="card-header">
        <a href="{{ route('mcu.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah MCU</a>
    </div>
    @endrole
    <div class="card-body">
        <form method="GET" action="{{ route('mcu.index') }}" class="mb-3 row">
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Cari Nama User" value="{{ request('nama') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-3">
                <select name="tahun" class="form-control">
                    <option value="">-- Semua Tahun --</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">Filter</button>
            </div>
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal MCU</th>
                    <th>User</th>
                    @role('superadmin')
                    <th>Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($mcu as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mcu_date }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    @role('superadmin')
                    <td>
                        <a href="{{ route('mcu.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('mcu.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                    @endrole
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $mcu->links() }}
        </div>
    </div>
</div>
@endsection