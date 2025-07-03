@extends('layouts.app')

@section('title', 'Edit MCU')

@section('header')
    <h1 class="m-0">Edit MCU</h1>
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form method="POST" action="{{ route('mcu.update', $mcu->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>User</label>
                <select name="USERID" class="form-control select2" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $mcu->USERID == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('USERID') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal MCU</label>
                <input type="datetime-local" name="mcu_date" class="form-control" value="{{ \Carbon\Carbon::parse($mcu->mcu_date)->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('mcu.index') }}" class="btn btn-secondary">Kembali</a>
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