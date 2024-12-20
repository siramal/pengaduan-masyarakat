<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .landing-container {
            display: flex;
            height: 100vh;
        }

        .orange-section {
            background-color: #f57c00;
            color: white;
            padding: 2rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .orange-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .orange-section p {
            margin: 1.5rem 0;
            line-height: 1.8;
        }

        .orange-section .btn {
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
        }


        .fab-icons {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .fab-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: #00564d;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .fab-icons a:hover {
            background-color: #003d36;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <!-- Section Oranye -->
        <div class="orange-section">
            <h1>Pengaduan Masyarakat</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi perspiciatis aut pariatur
                doloremque laborum quis in praesentium at, recusandae obcaecati dicta accusantium delectus
                asperiores illum minima veritatis iure quidem amet rerum fugit quaerat illo!
            </p>
            <a href="{{ route('login.page') }}" class="btn btn-primary">Bergabung</a>
        </div>
        <!-- Bagian Gambar -->
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
