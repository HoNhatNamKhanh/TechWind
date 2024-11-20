<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            font-size: 26px;
            margin-bottom: 25px;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 10px;
        }

        p {
            font-size: 15px;
            color: #34495e;
            margin-bottom: 15px;
        }

        p strong {
            color: #2c3e50;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #bdc3c7;
            margin-top: 30px;
        }

        .info {
            background-color: #ecf0f1;
            border-left: 5px solid #2980b9;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .info p {
            margin: 5px 0;
            font-size: 16px;
        }

        .info p strong {
            display: inline-block;
            width: 80px;
            color: #2980b9;
        }

        .footer p {
            margin: 0;
            font-style: italic;
        }
    </style>

</head>

<body>

    <div class="container">
        <h1>{{ $subject }}</h1>

        <div class="info">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
        </div>

        <div class="info">
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <p><strong>Comments:</strong></p>
            <p>{{ $comments }}</p>
        </div>

        <div class="footer">
            <p>Thank you for your message!</p>
        </div>
    </div>

</body>

</html>