{{-- filepath: c:\Users\mrizk\szli\resources\views\mcu\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data MCU')

@section('header')
    <h1 class="m-0">Data MCU</h1>
@endsection

@section('content')
<div class="card">
    @role('superadmin')
    <div class="card-header">
        <a href="{{ route('mcu.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah MCU
        </a>
    </div>
    @endrole
    <div class="card-body">
        <form method="GET" action="{{ route('mcu.index') }}" class="row mb-3 align-items-end">
            <div class="col-md-3 mb-2">
                <input type="text" name="nama" class="form-control" placeholder="Cari Nama User" value="{{ request('nama') }}">
            </div>
            <div class="col-md-2 mb-2">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-2 mb-2">
                <select name="tahun" class="form-control">
                    <option value="">Pilih Tahun</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <button type="submit" class="btn btn-info btn-block"><i class="fas fa-search"></i> Filter</button>
            </div>
            <div class="col-md-2 mb-2">
                <a href="{{ route('mcu.index') }}" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>                    
                    <th>Tanggal MCU</th>
                    @role('superadmin')
                    <th>Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($mcu as $mcus)
                <tr>
                    <td>{{ ($mcu->currentPage() - 1) * $mcu->perPage() + $loop->iteration }}</td>
                    <td>{{ $mcus->user->name ?? '-' }}</td>                    
                    <td>{{ $mcus->mcu_date }}</td>
                    @role('superadmin')
                    <td>
                        <a href="{{ route('mcu.edit', $mcus->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('mcu.destroy', $mcus->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                    @endrole
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $mcu->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection