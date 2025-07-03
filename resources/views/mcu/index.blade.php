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
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal MCU</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mcu as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mcu_date }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('mcu.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('mcu.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection