<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Selamat Datang!</title>
</head>
<body style="font-family: 'Poppins', Arial, sans-serif; background-color: #fff5f7; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 30px auto; background-color: #ffffff; border-radius: 16px; box-shadow: 0 4px 12px rgba(255, 182, 193, 0.3); overflow: hidden;">
        <tr>
            <td style="background: linear-gradient(135deg, #ffb6c1, #ffcdd2); padding: 20px 0; text-align: center;">
                <h1 style="color: white; margin: 0; font-size: 28px;">✨ Selamat Datang, {{ $user->name }}! ✨</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px; color: #444; text-align: center;">
                <p style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
                    Terima kasih sudah bergabung di <strong style="color: #ff6f91;">{{ config('app.name') }}</strong> 💖<br>
                    Kami super senang kamu ada di sini! 🎀
                </p>

                <p style="font-size: 15px; color: #666; line-height: 1.6;">
                    Yuk mulai petualangan barumu sekarang~ 🌸  
                    Jelajahi fitur kami dan temukan hal-hal seru di dalamnya!
                </p>

                <a href="{{ url('/') }}" 
                   style="display: inline-block; margin-top: 25px; padding: 12px 28px; 
                          background-color: #ff8fab; color: white; text-decoration: none; 
                          border-radius: 25px; font-weight: bold; box-shadow: 0 4px 8px rgba(255, 182, 193, 0.3);">
                    Mulai Sekarang 💫
                </a>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff0f5; text-align: center; padding: 15px;">
                <small style="color: #888;">Email ini dikirim otomatis via Mailtrap Sandbox 💌<br>
                &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</small>
            </td>
        </tr>
    </table>
</body>
</html>
