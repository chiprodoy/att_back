{{-- filepath: resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring @error('name') border-red-500 @enderror">
                @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring @error('email') border-red-500 @enderror">
                @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring @error('password') border-red-500 @enderror">
                @error('password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
        </form>
        <p class="mt-4 text-center text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a></p>
    </div>
</body>
</html>