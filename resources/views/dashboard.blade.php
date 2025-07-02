{{-- filepath: resources/views/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between">
        <div class="font-bold text-lg">Dashboard</div>
        <div>
            <a href="{{ route('logout') }}" class="hover:underline">Logout</a>
        </div>
    </nav>
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
</body>
</html>