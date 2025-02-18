
<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            border: 1px solid #e0e0e0;
        }
        .header {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
        </div>
        <div class="content">
        
            {!! nl2br(e($data)) !!}
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
          
        </div>
    </div>
</body>
</html>