<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Clinic Melati - Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
        }
        
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            background-color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }
        
        .top-navbar {
            background-color: #3177b5;
            padding: 15px;
            color: white;
        }
        
        .nav-link {
            color: #333;
            padding: 12px 20px;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            background-color: #f8f9fa;
            color: #3177b5;
        }
        
        .nav-link.active {
            background-color: #3177b5;
            color: white;
        }
        
        .nav-link i {
            margin-right: 10px;
        }
        
        .welcome-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .menu-title {
            color: #6c757d;
            font-size: 0.85rem;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="top-navbar">
            <h4 class="mb-0">E-Clinic Melati</h4>
        </div>
        
        <div class="menu-title mt-3">Menu</div>
        
        <nav class="nav flex-column">
            <a class="nav-link active" href="#">
                <i class="bi bi-house-door"></i> Beranda
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-person-circle"></i> Admin
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-clipboard2-pulse"></i> Dokter
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-people"></i> User
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-key"></i> Ubah Password
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="nav-link text-danger border-0 w-100 text-start">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-card">
            <h4 class="mb-3">Home</h4>
            <p>Selamat Datang di Sistem Pakar dalam Mengidentifikasi Penyakit Kandungan Menggunakan Metode Forward Chaining</p>
            <p class="text-muted mb-0">Silahkan pilih menu disamping untuk melakukan pengolahan data</p>
        </div>
        
        <!-- Additional content cards can be added here -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people-fill text-primary"></i> Total Pasien</h5>
                        <h3 class="card-text">150</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-clipboard2-pulse-fill text-success"></i> Diagnosa Hari Ini</h5>
                        <h3 class="card-text">12</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-lines-fill text-warning"></i> Dokter Aktif</h5>
                        <h3 class="card-text">5</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>