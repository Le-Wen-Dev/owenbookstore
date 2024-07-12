<!-- send_otp_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Send OTP</title>
</head>
<body>
    <div>
        @if (session('message'))
            <div>{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('send.otp') }}">
            @csrf
            <label for="email">Enter your email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <button type="submit">Send OTP</button>
        </form>
    </div>
</body>
</html>
