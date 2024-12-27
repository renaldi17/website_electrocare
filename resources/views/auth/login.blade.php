<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Electrocare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-red-500">
        <div class="max-w-md w-full px-6 py-8">
            <div class="text-center mb-8">
                <h1 class="text-white text-4xl font-cursive mb-1">Electrocare</h1>
                <span class="text-white text-5xl font-bold">Login</span>
            </div>

            @if (session('success'))
            <div class="mb-4 text-center text-green-500 font-medium">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <input id="email" 
                        class="w-full bg-transparent border-b border-white text-white placeholder-white"
                        type="email"
                        name="email"
                        placeholder="Email"
                        required autofocus value="{{ old('email') }}">
                    @error('email')
                    <p class="text-white text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <input id="password"
                        class="w-full bg-transparent border-b border-white text-white placeholder-white"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required>
                    @error('password')
                    <p class="text-white text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col items-start gap-4">
                    <button type="submit" class="bg-white text-red-500 px-8 py-2 rounded-md hover:bg-gray-100">
                        Login
                    </button>

                    <a href="{{ route('viewRegister') }}" class="text-white underline">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
