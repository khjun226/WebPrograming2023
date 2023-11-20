<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .info {
            margin-top: 20px;
        }

        .info label {
            font-weight: bold;
            color: #555;
        }

        .info span {
            font-weight: normal;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Info</h1>
        <div class="info">
            <label>Username:</label>
            <span><?php echo $_POST['username']; ?></span><br>
            <label>Password:</label>
            <span><?php echo $_POST['password']; ?></span>
        </div>
    </div>
</body>
</html>
