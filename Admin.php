<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <!-- Tambahan CSS -->
    <style>
        body {
            padding-top: 100px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(245, 245, 245, 1));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .login-box {
            width: 400px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }

        .card {
            border: none;
        }

        .btn-primary {
            background-color: #2B79BE;
            border: none;
        }

        .btn-primary:hover {
            background-color: #69a79c;
        }

        .btn-back {
            background-color: #f8f9fa;
            color: #2B79BE;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 25px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background-color: #e0e0e0;
            color: #69a79c;
        }

        .logo-image img {
            display: block;
            margin: 0 auto 15px;
            width: 100px;
        }

        .form-control {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 10px 20px;
        }

        .form-control:focus {
            border-color: #2B79BE;
            box-shadow: 0 0 5px rgba(97, 94, 252, 0.5);
        }
    </style>
</head>

<body>
    <button class="btn-back" onclick="window.location.href='index.php'">&larr; Kembali ke Halaman Awal</button>

    <div class="login-box">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4 logo-image">
                    <img src="assets/images/logo.png" alt="Logo">
                    <!-- Logo or any image -->
                    <h5 class="mt-3">Login Admin</h5>
                </div>
                <form action="pages/login/checkLogin.php" method="post" id="loginForm">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            id="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
</script>
</body>

</html>