<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Electrocare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .login-button {
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="login-card bg-white p-6 max-w-md w-full">
            <div class="text-center mb-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/image/logoec.png') }}" height="50" width="50" alt="Logo" class="mx-auto">
                </div>
                <h2 class="text-red-500 text-3xl font-bold">Login</h2>
            </div>

            @if (session('success'))
            <div class="mb-4 text-center text-green-500 font-medium">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <input id="email" class="form-control" type="email" name="email" placeholder="Email" required autofocus value="{{ old('email') }}">
                    @error('email')
                    <p class="text-danger text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                    @error('password')
                    <p class="text-danger text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col items-start gap-4">
                    <button type="submit" class="btn btn-danger login-button w-full">
                        Login
                    </button>

                    <a href="{{ route('viewRegister') }}" class="text-danger underline text-center">
                        Belum punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
