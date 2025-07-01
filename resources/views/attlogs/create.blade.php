{{-- filepath: resources/views/attlogs/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buat Attendance Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Attendance Log</h2>
        <form method="POST" action="{{ route('attendence.store') }}">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Checklog Time</label>
                    <input type="datetime-local" name="checklog_time" class="w-full border rounded px-3 py-2" value="{{ old('checklog_time') }}">
                    @error('checklog_time') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Shift In</label>
                    <input type="datetime-local" name="shift_in" class="w-full border rounded px-3 py-2" value="{{ old('shift_in') }}">
                    @error('shift_in') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Shift Out</label>
                    <input type="datetime-local" name="shift_out" class="w-full border rounded px-3 py-2" value="{{ old('shift_out') }}">
                    @error('shift_out') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Checkin Time 1</label>
                    <input type="datetime-local" name="checkin_time1" class="w-full border rounded px-3 py-2" value="{{ old('checkin_time1') }}">
                    @error('checkin_time1') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Checkin Time 2</label>
                    <input type="datetime-local" name="checkin_time2" class="w-full border rounded px-3 py-2" value="{{ old('checkin_time2') }}">
                    @error('checkin_time2') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Checkout Time 1</label>
                    <input type="datetime-local" name="checkout_time1" class="w-full border rounded px-3 py-2" value="{{ old('checkout_time1') }}">
                    @error('checkout_time1') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Checkout Time 2</label>
                    <input type="datetime-local" name="checkout_time2" class="w-full border rounded px-3 py-2" value="{{ old('checkout_time2') }}">
                    @error('checkout_time2') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Check Type</label>
                    <input type="number" name="check_type" class="w-full border rounded px-3 py-2" value="{{ old('check_type') }}">
                    @error('check_type') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Late Tolerance</label>
                    <input type="number" name="late_tolerance" class="w-full border rounded px-3 py-2" value="{{ old('late_tolerance') }}">
                    @error('late_tolerance') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Early Tolerance</label>
                    <input type="number" name="early_tolerance" class="w-full border rounded px-3 py-2" value="{{ old('early_tolerance') }}">
                    @error('early_tolerance') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Sdays</label>
                    <input type="number" name="sdays" class="w-full border rounded px-3 py-2" value="{{ old('sdays') }}">
                    @error('sdays') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Late</label>
                    <input type="number" name="late" class="w-full border rounded px-3 py-2" value="{{ old('late') }}">
                    @error('late') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Early Checkin</label>
                    <input type="number" name="early_checkin" class="w-full border rounded px-3 py-2" value="{{ old('early_checkin') }}">
                    @error('early_checkin') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Overtime</label>
                    <input type="number" name="overtime" class="w-full border rounded px-3 py-2" value="{{ old('overtime') }}">
                    @error('overtime') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Early Checkout</label>
                    <input type="number" name="early_checkout" class="w-full border rounded px-3 py-2" value="{{ old('early_checkout') }}">
                    @error('early_checkout') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Check Log Status</label>
                    <input type="number" name="check_log_status" class="w-full border rounded px-3 py-2" value="{{ old('check_log_status') }}">
                    @error('check_log_status') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Departement Name</label>
                    <input type="text" name="departement_name" class="w-full border rounded px-3 py-2" value="{{ old('departement_name') }}">
                    @error('departement_name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
            </div>
            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('attendence.index') }}" class="mt-2 block text-center text-blue-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>