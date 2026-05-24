<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary: #c4098ccb;
            --secondary: #dcf500cb;
            --accent: #4895ef;
            --text: #2b2d42;
            --light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 480px;
            padding: 2rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .login-header h2 {
            margin: 0.5rem 0;
            color: var(--secondary);
        }

        .login-form .form-group {
            margin-bottom: 1.2rem;
        }

        .login-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .login-form input {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.8rem;
            font-size: 1rem;
            width: 100%;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="{{ asset('admin/img/imc.png') }}" alt="Logo" class="login-logo">
                <h2>Login Sistem</h2>
                <p>Masukkan email dan password untuk melanjutkan</p>
            </div>
            <form class="login-form" method="POST" action="/authenticate">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary">Masuk</button>
            </form>

        </div>
    </div>
</body>
</html>
