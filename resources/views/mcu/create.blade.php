<!DOCTYPE html>
<html>
<head>
    <title>Tambah MCU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    <form method="POST" action="{{ route('mcu.store') }}" class="max-w-md mx-auto bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block">Tanggal MCU</label>
            <input type="date" name="mcu_date" class="w-full border rounded px-3 py-2" value="{{ old('mcu_date') }}">
            @error('mcu_date') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('mcu.index') }}" class="ml-2 text-blue-600">Kembali</a>
    </form>
</body>
</html>