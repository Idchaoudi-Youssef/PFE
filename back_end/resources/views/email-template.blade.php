<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            font-size: 24px;
            color: #4CAF50;
            margin-top: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .info {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Contact Message</h1>

        <div class="info">
            <span class="label">Name:</span> {{ $nom }} {{ $prenom }}
        </div>
        <div class="info">
            <span class="label">Email:</span> {{ $email }}
        </div>
        <div class="info">
            <span class="label">Phone:</span> {{ $phone }}
        </div>
        <div class="info">
            <span class="label">Message:</span> {{ $commentaire }}
        </div>
    </div>
</body>
</html>