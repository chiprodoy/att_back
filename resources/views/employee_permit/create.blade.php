@extends('layouts.app')

@section('title', 'Tambah Permit')

@section('header')
    <h1 class="m-0">Tambah Permit</h1>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form method="POST" action="{{ route('employee_permit.store') }}">
            @csrf
            <div class="form-group">
                <label>Tanggal Permit</label>
                <input type="date" name="date_permit" class="form-control" value="{{ old('date_permit') }}">
                @error('date_permit') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Status Permit</label>
                <input type="text" name="permit_status" class="form-control" value="{{ old('permit_status') }}">
                @error('permit_status') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('employee_permit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection