<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="{{ asset('css/otp/styles.css') }}">
</head>
<body>

<div class="container">
    <h2 class="title">🔐 Verify OTP</h2>
    <p class="subtitle">Enter the 6-digit code sent to your email</p>

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <input type="hidden" name="email" value="{{ session('email') }}">

        <input 
            type="text" 
            name="otp" 
            class="otp-input"
            maxlength="6"
            placeholder="------"
            required
        >

        <button type="submit" class="btn">Verify</button>
    </form>

    <div class="resend">
        Didn’t receive code? 
        <a href="#">Resend</a>
    </div>
</div>

</body>
</html>