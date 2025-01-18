<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pasien</title>
    <link rel="icon" type="image/png" href="../../asset/images/logo_dinus.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .registration-container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .registration-container h2 {
            text-align: center;
            font-size: 2rem;
            color: #2B79BE;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            border-radius: 25px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            transition: all 0.3s;
        }

        .form-group input:focus {
            border-color: #2B79BE;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button {
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            background: #2B79BE;
            border: none;
            color: white;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #69A79c;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #2B79BE;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h2>Registrasi Pasien</h2>
        <form action="pages/register/checkRegister.php" method="post" id="registerForm">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="no_ktp">Nomor KTP:</label>
                <input type="number" id="no_ktp" name="no_ktp" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP:</label>
                <input type="number" id="no_hp" name="no_hp" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>

        <div class="register-link">
            <p><b>Sudah punya akun?</b> <a href="../login/loginUser.php">Login disini</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
