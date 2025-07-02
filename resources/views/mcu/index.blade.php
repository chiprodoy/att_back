{{-- filepath: resources/views/mcu/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>MCU List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    <a href="{{ route('mcu.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah MCU</a>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <table class="mt-4 w-full border">
        <thead>
            <tr>
                <th class="border px-2">#</th>
                <th class="border px-2">Tanggal MCU</th>
                <th class="border px-2">User</th>
                <th class="border px-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mcu as $item)
            <tr>
                <td class="border px-2">{{ $loop->iteration }}</td>
                <td class="border px-2">{{ $item->mcu_date }}</td>
                <td class="border px-2">{{ $item->user->name ?? '-' }}</td>
                <td class="border px-2">
                    <a href="{{ route('mcu.edit', $item->id) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('mcu.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>