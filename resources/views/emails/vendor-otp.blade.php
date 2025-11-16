<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            background: #3b82f6;
            padding: 20px;
            text-align: center;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 30px 20px;
        }
        .otp-code {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            color: #3b82f6;
            margin: 30px 0;
            padding: 15px;
            background: #f8fafc;
            border: 2px dashed #3b82f6;
            border-radius: 8px;
            letter-spacing: 8px;
        }
        .footer {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-radius: 0 0 8px 8px;
        }
        .note {
            background: #fff3cd;
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>OTP Verification Code</h2>
        </div>
        
        <div class="content">
            <p>Hello,</p>
            
            <p>Your One-Time Password (OTP) for vendor verification is:</p>
            
            <div class="otp-code">
                {{ $otp }}
            </div>
            
            <div class="note">
                <strong>Note:</strong> This OTP is valid for 10 minutes. Please do not share this code with anyone.
            </div>
            
            <p>If you didn't request this verification, please ignore this email.</p>
            
            <p>Best regards,<br>Your Marketplace Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>