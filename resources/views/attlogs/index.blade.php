{{-- filepath: resources/views/attlogs/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Log List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Attendance Log</h1>
            <a href="{{ route('attendence.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Log</a>
        </div>
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">User</th>
                        <th class="px-4 py-2 border">Checklog Time</th>
                        <th class="px-4 py-2 border">Shift In</th>
                        <th class="px-4 py-2 border">Shift Out</th>
                        <th class="px-4 py-2 border">Departement</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attlogs as $log)
                        <tr>
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $log->user->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $log->checklog_time }}</td>
                            <td class="px-4 py-2 border">{{ $log->shift_in }}</td>
                            <td class="px-4 py-2 border">{{ $log->shift_out }}</td>
                            <td class="px-4 py-2 border">{{ $log->departement_name }}</td>
                            <td class="px-4 py-2 border flex gap-2">
                                <a href="{{ route('attendence.edit', $log->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                                <form action="{{ route('attendence.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($attlogs->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4">Data tidak ada.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>