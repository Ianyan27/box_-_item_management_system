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
        <p class="subtitle">Register new account</p>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input 
                    type="text"
                    name="name"
                    class="form-input"
                    placeholder="Full Name"
                    required
                    >
            </div>

            <div class="form-group">
                <input 
                    type="email" 
                    name="email" 
                    class="form-input"
                    placeholder="Email"
                    required>
            </div>

            <div class="form-group">
                <input 
                    type="password" 
                    name="password" 
                    class="form-input"
                    placeholder="Password"
                    required>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="footer">
            Already have an account? 
            <a href="{{ route('/') }}">Login</a>
        </div>
    </div>
</body>
</html>