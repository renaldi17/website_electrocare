<div class="min-h-screen flex items-center justify-center bg-white">
    <div class="w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-cursive text-red-500">Electrocare <span class="font-sans">Sign Up</span></h1>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <div>
                <input type="text" name="name" id="name" required
                    class="w-full px-3 py-2 border-b-2 border-gray-300 focus:border-red-500 focus:outline-none"
                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="text" name="username" id="username" required
                    class="w-full px-3 py-2 border-b-2 border-gray-300 focus:border-red-500 focus:outline-none"
                    placeholder="Username" value="{{ old('username') }}">
                @error('username')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="tel" name="phone" id="phone" required
                    class="w-full px-3 py-2 border-b-2 border-gray-300 focus:border-red-500 focus:outline-none"
                    placeholder="Nomor Telepon" value="{{ old('phone') }}">
                @error('phone')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="email" name="email" id="email" required
                    class="w-full px-3 py-2 border-b-2 border-gray-300 focus:border-red-500 focus:outline-none"
                    placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border-b-2 border-gray-300 focus:border-red-500 focus:outline-none"
                    placeholder="Password">
                @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-32 bg-white text-red-500 rounded-full py-2 px-4 border-2 border-red-500 hover:bg-red-500 hover:text-white transition-colors">
                    Sign Up
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('viewLogin') }}" class="text-red-500 hover:underline">Login</a>
            </div>
        </form>
    </div>
</div>
