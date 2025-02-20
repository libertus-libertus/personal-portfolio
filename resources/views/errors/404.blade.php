<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1e1e2d;
            color: #ffffff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 50px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #cccccc;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            padding: 6px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-custom:hover {
            background-color: #388e3c;
            transform: scale(1.05);
        }

        .btn-container {
            margin-top: 20px;
        }

        .error-img {
            width: 100%;
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="error-container">
        <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png"
             alt="404 Error Illustration"
             class="error-img">
        <h1>404</h1>
        <p>Oops! Halaman yang kamu cari tidak ditemukan.</p>

        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn-custom">🔙 Go Back</a>
            <a href="{{ route('home') }}" class="btn-custom">🏠 Go to Home Page</a>
        </div>
    </div>
</body>

</html>
