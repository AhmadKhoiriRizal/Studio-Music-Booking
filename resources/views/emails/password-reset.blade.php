<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Permintaan Reset Password</h2>
    <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>

    <p>Kode verifikasi Anda: <strong>{{ $code }}</strong></p>

    <p>Jika Anda tidak merasa meminta reset password, abaikan email ini.</p>

    <p>Terima kasih,<br>{{ config('app.name') }}</p>
</body>
</html>
