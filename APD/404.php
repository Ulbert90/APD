<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .card {
        max-width: 400px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .fs-1 {
        font-size: 100px;
        color: #e74c3c;
        margin-bottom: 10px;
    }

    .error-message {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .back-home {
        text-decoration: none;
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .back-home:hover {
        background-color: #2980b9;
    }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="card">
            <div class="card-body">
                <div class="fs-1">404</div>
                <div class="error-message">Halaman tidak ditemukan</div>
                <a href="index.php" class="back-home">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- Optional: Tambahkan skrip Bootstrap JavaScript jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>