<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">
</head>
<body>

<div class="container">
    <h1 class="title">Welcome back 👋</h1>
    <p class="subtitle">Login to your BoxVault account</p>

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-input"
                value="{{ old('email') }}"
                placeholder="you@example.com"
                required>
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-input"
                placeholder="••••••••"
                required>
        </div>

        <button type="submit" class="btn">Login</button>
        
        <div style="margin-top: 15px;">
            <a href="{{ route('google.login') }}" class="btn" style="background-color: #db4437;">
                Continue with Google
            </a>
        </div>
    </form>

    <div class="footer">
        Don’t have an account? 
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>

</body>
</html>