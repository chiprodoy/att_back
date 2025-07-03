@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    <h1 class="m-0">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="mb-4">Anda berhasil login.</p>
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
            <p class="mb-4">Anda berhasil login.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('attendence.index') }}" class="block bg-blue-600 text-white text-center py-4 rounded hover:bg-blue-700 transition">Lihat Data Kehadiran</a>
                <a href="{{ route('userinfo') }}" class="block bg-green-600 text-white text-center py-4 rounded hover:bg-green-700 transition">Lengkapi Data User Info</a>
                <a href="{{ route('mcu.index') }}" class="block bg-purple-600 text-white text-center py-4 rounded hover:bg-purple-700 transition">Data MCU</a>
                <a href="{{ route('employee_permit.index') }}" class="block bg-pink-600 text-white text-center py-4 rounded hover:bg-pink-700 transition">Data Employee Permit</a>
            </div>
        </div>
    </div>
@endsection