@extends('layouts.app')

@section('title', 'Attendance Log List')

@section('header')
    <h1 class="m-0">Attendance Log</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('attendence.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Log
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Checklog Time</th>
                        <th>Shift In</th>
                        <th>Shift Out</th>
                        <th>Departement</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attlogs as $log)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $log->user->name ?? '-' }}</td>
                            <td>{{ $log->checklog_time }}</td>
                            <td>{{ $log->shift_in }}</td>
                            <td>{{ $log->shift_out }}</td>
                            <td>{{ $log->departement_name }}</td>
                            <td>
                                <a href="{{ route('attendence.edit', $log->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('attendence.destroy', $log->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($attlogs->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ada.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection