<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload - IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f87c7c;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-bottom: 2px solid #ddd;
        }
        .header img {
            max-width: 200px;
            height: auto;
        }
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .form-container h1 {
            margin-top: 0;
            color: #444;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: block;
            margin-top: 5px;
        }
        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-top: 2px solid #ddd;
        }
        .footer img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <header class="header">
        <img src="https://www.auf.edu.ph/images/auf-logo.png" alt="Angeles University Foundation">
    </header>

    <div class="form-container">
        <h1>Upload Audio File</h1>
        <form action="uploaded.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="audio_file">Select an audio file (MP3 only):</label>
                <input type="file" id="audio_file" name="audio_file" accept=".mp3">
            </div>
            <div class="form-group">
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <img src="aufccslogo.png" alt="College of Computing Studies">
    </footer>
</div>

</body>
</html>
