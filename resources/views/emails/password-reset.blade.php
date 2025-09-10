<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Reset Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #2d3748;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .verification-code {
            background-color: #f7fafc;
            border: 2px dashed #e2e8f0;
            border-radius: 8px;
            padding: 30px;
            margin: 30px 0;
            text-align: center;
        }
        .code {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            letter-spacing: 8px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
        }
        .warning {
            background-color: #fed7d7;
            border-left: 4px solid #fc8181;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .warning-icon {
            color: #e53e3e;
            font-weight: bold;
        }
        .footer {
            background-color: #f7fafc;
            padding: 30px;
            text-align: center;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #5a67d8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reset Password</h1>
            <p>{{ $appName ?? 'Studio Musik' }}</p>
        </div>

        <div class="content">
            <h2>Kode Verifikasi Reset Password</h2>
            <p>Halo,</p>
            <p>Kami menerima permintaan untuk mereset password akun Anda. Gunakan kode verifikasi berikut untuk melanjutkan proses reset password:</p>

            <div class="verification-code">
                <p style="margin: 0; font-size: 16px; color: #4a5568;">Kode Verifikasi Anda</p>
                <div class="code">{{ $code }}</div>
                <p style="margin: 10px 0 0 0; font-size: 14px; color: #718096;">Kode berlaku selama 10 menit</p>
            </div>

            <div class="warning">
                <p style="margin: 0;"><span class="warning-icon">⚠️</span> <strong>Penting:</strong></p>
                <ul style="margin: 10px 0 0 20px; padding: 0;">
                    <li>Jangan berikan kode ini kepada siapapun</li>
                    <li>Kode hanya berlaku selama 10 menit</li>
                    <li>Jika Anda tidak meminta reset password, abaikan email ini</li>
                </ul>
            </div>

            <p>Jika Anda tidak meminta reset password, silakan abaikan email ini dan password Anda akan tetap aman.</p>

            <p>Jika Anda mengalami kesulitan, silakan hubungi tim support kami.</p>

            <p>Terima kasih,<br>
            Tim {{ $appName ?? 'Studio Musik' }}</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis, mohon jangan membalas email ini.</p>
            <p>© {{ date('Y') }} {{ $appName ?? 'Studio Musik' }}. All rights reserved.</p>
            @if(isset($appUrl))
            <p><a href="{{ $appUrl }}" style="color: #667eea;">{{ $appUrl }}</a></p>
            @endif
        </div>
    </div>
</body>
</html>
