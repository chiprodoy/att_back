<!DOCTYPE html>
<html>
<head>
    <title>Employee Permit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8">
    <a href="{{ route('employee_permit.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Permit</a>
    <table class="mt-4 w-full border">
        <thead>
            <tr>
                <th class="border px-2">#</th>
                <th class="border px-2">Tanggal</th>
                <th class="border px-2">Status</th>
                <th class="border px-2">User</th>
                <th class="border px-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permits as $permit)
            <tr>
                <td class="border px-2">{{ $loop->iteration }}</td>
                <td class="border px-2">{{ $permit->date_permit }}</td>
                <td class="border px-2">{{ $permit->permit_status }}</td>
                <td class="border px-2">{{ $permit->user->name ?? '-' }}</td>
                <td class="border px-2">
                    <a href="{{ route('employee_permit.edit', $permit->id) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('employee_permit.destroy', $permit->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>