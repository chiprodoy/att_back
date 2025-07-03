@extends('layouts.app')

@section('title', 'Tambah MCU')

@section('header')
    <h1 class="m-0">Tambah MCU</h1>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form method="POST" action="{{ route('mcu.store') }}">
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
                <label>Tanggal MCU</label>
                <input type="datetime-local" name="mcu_date" class="form-control" value="{{ $now ?? now()->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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