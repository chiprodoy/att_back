<!DOCTYPE html>
<html>
<head>
    <title>Edit Permit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8">
    <form method="POST" action="{{ route('employee_permit.update', $permit->id) }}" class="max-w-md mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Tanggal Permit</label>
            <input type="date" name="date_permit" class="w-full border rounded px-3 py-2" value="{{ old('date_permit', $permit->date_permit) }}">
            @error('date_permit') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label class="block">Status Permit</label>
            <input type="text" name="permit_status" class="w-full border rounded px-3 py-2" value="{{ old('permit_status', $permit->permit_status) }}">
            @error('permit_status') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('employee_permit.index') }}" class="ml-2 text-blue-600">Kembali</a>
    </form>
</body>
</html>