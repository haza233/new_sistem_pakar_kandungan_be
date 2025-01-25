<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Kandungan - Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f5f8fa;
        }
        .login-container {
            max-width: 400px;
            margin-top: 5%;
        }
        .brand-name {
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            background-color: #e91e63;
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
        .form-control:focus {
            border-color: #e91e63;
            box-shadow: 0 0 0 0.25rem rgba(233, 30, 99, 0.25);
        }
        .btn-login {
            background-color: #e91e63;
            border: none;
            padding: 10px 20px;
        }
        .btn-login:hover {
            background-color: #d81b60;
        }
        .medical-icon {
            font-size: 3rem;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="text-center mb-4">
            <h2 class="brand-name">Sistem Pakar Kandungan</h2>
        </div>
        
        <div class="card login-card">
            <div class="login-header text-center">
                <i class="medical-icon">👩‍⚕️</i>
                <h4 class="mt-2">Login Sistem</h4>
            </div>
            
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login.process') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" required 
                                placeholder="Masukkan email anda">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" required
                                placeholder="Masukkan password">
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-login text-white">Masuk</button>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <p class="text-muted">Belum punya akun? <a href="#" class="text-decoration-none">Daftar</a></p>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>