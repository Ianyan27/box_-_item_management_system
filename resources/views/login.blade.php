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

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

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
            <label>Email</label>
            <input type="email" name="email" class="form-input" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-input" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>

    <div class="divider">OR</div>

    <div class="google-container">
        <a href="{{ route('google.login') }}" class="btn btn-google">
            Continue with Google
        </a>
    </div>

    <div class="otp-container">
        <form method="POST" action="{{ route('otp.send') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" class="form-input" placeholder="Enter email for OTP" required>
            </div>

            <button type="submit" class="btn btn-otp">
                Send OTP
            </button>
        </form>
    </div>

    <div class="footer">
        Don’t have an account? 
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>

</body>
</html>