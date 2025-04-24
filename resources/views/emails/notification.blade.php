<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body style="margin:0;padding:0;background-color:#171919;font-family:Rowdies, serif;">

    <div style="max-width:600px;margin:0 auto;background-color:#171919;padding:20px;">

        <div style="text-align:center;padding-bottom:10px;color:#dddddd;">
            <h1 style="margin:0;font-size:36px;line-height:44px;font-weight:600;">
                Goodtimes
            </h1>
        </div>

        <div style="color:#dddddd;padding:10px 25px;">
            <h1 style="margin:0;font-size:42px;line-height:44px;font-weight:600;">
                Let's create something amazing!
            </h1>
        </div>

        <div style="color:#dddddd;padding:10px 25px;font-size:22px;line-height:24px;">
            <p style="margin:0;">Welcome to Goodtimes, {{ $user->name }}! Before we get started, please confirm your
                email address.</p>
        </div>

        <div style="padding:20px 25px;text-align:left;">
            <a href="{{ $verificationUrl }}" target="_blank"
                style="background-color:#ffffff;color:#000000;padding:10px 25px;text-decoration:none;font-size:16px;border-radius:4px;display:inline-block;">
                Confirm my Email
            </a>
        </div>
    </div>

    <div style="background-color:#000000;text-align:center;padding:20px 0;color:#999999;font-size:14px;">
        <div style="padding:5px 0;">
            <a href="https://github.com/Rulyrahman"
                style="color:#fff;text-decoration:none;margin:0 5px;">District607</a> |
            <a href="https://www.instagram.com/rulyrahmanh/"
                style="color:#fff;text-decoration:none;margin:0 5px;">Rulyrahman</a>
        </div>
        <div style="padding:5px 0;">Yogyakarta, Indonesia</div>
    </div>

</body>

</html>
