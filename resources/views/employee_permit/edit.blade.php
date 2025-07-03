@extends('layouts.app')

@section('title', 'Edit Permit')

@section('header')
    <h1 class="m-0">Edit Permit</h1>
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form method="POST" action="{{ route('employee_permit.update', $permit->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>User</label>
                <select name="USERID" class="form-control" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('USERID', $permit->USERID) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('USERID') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Permit</label>
                <input type="text" class="form-control" value="{{ $permit->date_permit ? \Carbon\Carbon::parse($permit->date_permit)->format('d-m-Y') : '-' }}" readonly>
            </div>
            <div class="form-group">
                <label>Status Permit</label>
                <select name="permit_status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="1" {{ old('permit_status', $permit->permit_status) == 1 ? 'selected' : '' }}>Cuti</option>
                    <option value="2" {{ old('permit_status', $permit->permit_status) == 2 ? 'selected' : '' }}>Sakit</option>
                    <option value="3" {{ old('permit_status', $permit->permit_status) == 3 ? 'selected' : '' }}>Izin</option>
                    <option value="4" {{ old('permit_status', $permit->permit_status) == 4 ? 'selected' : '' }}>Alfa</option>
                </select>
                @error('permit_status') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('employee_permit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection