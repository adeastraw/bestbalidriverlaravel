<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Best Bali Driver</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-forest-950 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-forest-800 space-y-6">
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h1 class="font-display text-2xl font-bold text-forest-900">
                Best Bali Driver
            </h1>
            <p class="text-xs text-sand-500 uppercase tracking-widest font-semibold">
                Admin Content Management
            </p>
        </div>

        @if($errors->any())
            <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1.5">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', 'admin@bestbalidriver.com') }}" required 
                       class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" name="password" id="password" required 
                       class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
            </div>

            <div class="flex items-center justify-between text-xs text-sand-600">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm rounded-xl shadow-md transition-colors">
                Sign In to Dashboard
            </button>
        </form>

        <div class="p-3 rounded-xl bg-cream-100 border border-sand-200 text-center text-xs text-sand-600">
            <span class="block font-medium text-forest-900">Default Admin Credentials:</span>
            <span>admin@bestbalidriver.com / password</span>
        </div>

        <div class="text-center">
            <a href="{{ route('home') }}" class="text-xs text-emerald-700 hover:underline">
                ← Return to Public Website
            </a>
        </div>
    </div>
</body>
</html>
