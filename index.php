<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/logo1.png">
    <title>Poliklinik</title>
    <!-- Link to External CSS File -->
    <link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #f5f5f5, #e0e0e0);
        }

        .navbar,
        .banner-section {
            background: #2B79BE;
            color: #fff;
            border-radius: 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff !important;
        }

        .banner-section {
            padding: 80px 20px;
            text-align: center;
            color: #fff;
        }

        .banner-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .banner-subtitle {
            font-size: 1.25rem;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-box:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background: #2B79BE;
            border: none;
        }

        .btn-primary:hover {
            background: #2B79BE;
        }

        .testimoni-section {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(245, 245, 245, 0.8));
            backdrop-filter: blur(10px);
            padding: 50px 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .testimonial-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg px-5">
        <a class="navbar-brand" href="./index.php">PoliklinikBK</a>
    </nav>

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="container">
            <h1 class="banner-title">
                Sistem Janji Temu Online Untuk Pasien - Dokter
            </h1>
            <h2 class="banner-subtitle">
                Poliklinik Sehat, Layanan Tepat, Kesehatan Anda Terjaga!
            </h2>
            <p class="banner-note">
                Bimbingan Karir 2024 Bidang Website
            </p>
        </div>
    </section>

    <!-- Login Section -->
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-5 mb-4">
                    <div class="login-box text-center p-4">
                        <img src="assets/images/sick.jpg" alt="Pasien" class="rounded-circle mb-3">
                        <h4>Login Pasien</h4>
                        <p>Apabila Anda seorang pasien, silakan login melalui link di bawah ini!</p>
                        <a href="loginUser.php" class="btn btn-primary">Login Pasien</a>
                    </div>
                </div>

                <div class="col-md-5 mb-4">
                    <div class="login-box text-center p-4">
                        <img src="assets/images/dokter.png" alt="Dokter" class="rounded-circle mb-3">
                        <h4>Login Dokter</h4>
                        <p>Apabila Anda seorang dokter, silakan login melalui link di bawah ini!</p>
                        <a href="login.php" class="btn btn-primary">Login Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
