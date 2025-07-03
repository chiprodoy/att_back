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
                <label>User</label>
                <select name="USERID" class="form-control select2" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('USERID') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('USERID') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Permit</label>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" readonly>
            </div>
            <div class="form-group">
                <label>Status Permit</label>
                <select name="permit_status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="1" {{ old('permit_status') == 1 ? 'selected' : '' }}>Cuti</option>
                    <option value="2" {{ old('permit_status') == 2 ? 'selected' : '' }}>Sakit</option>
                    <option value="3" {{ old('permit_status') == 3 ? 'selected' : '' }}>Izin</option>
                    <option value="4" {{ old('permit_status') == 4 ? 'selected' : '' }}>Alfa</option>
                </select>
                @error('permit_status') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('employee_permit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Cari user...",
            allowClear: true
        });
    });
</script>