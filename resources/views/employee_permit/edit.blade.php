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
                <label>Tanggal Permit</label>
                <input type="date" name="date_permit" class="form-control" value="{{ old('date_permit', $permit->date_permit) }}">
                @error('date_permit') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Status Permit</label>
                <input type="text" name="permit_status" class="form-control" value="{{ old('permit_status', $permit->permit_status) }}">
                @error('permit_status') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('employee_permit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection