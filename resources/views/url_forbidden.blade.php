<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '403 Forbidden' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --danger-color: #dc3545;
            --text-color: #2d2d2d;
            --bg-color: #f4f6f8;
        }
        body {
            background-color: var(--bg-color);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
        }
        .card {
            background: #fff;
            border: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 40px;
            max-width: 480px;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .illustration {
            width: 200px;
            margin-bottom: 20px;
        }
        .code {
            font-size: 72px;
            font-weight: 700;
            color: var(--danger-color);
            letter-spacing: 3px;
        }
        .message {
            font-size: 20px;
            font-weight: 500;
            color: #6c757d;
            margin-bottom: 15px;
        }
        .btn-home {
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-home:hover {
            transform: scale(1.05);
            background-color: #bb2d3b;
        }
        footer {
            position: absolute;
            bottom: 15px;
            font-size: 14px;
            color: #adb5bd;
        }
    </style>
</head>
<body>
    <div class="card">
        <!-- Ilustrasi SVG -->
        <svg class="illustration" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 260 200">
            <path fill="#dc3545" opacity=".15" d="M50 150c30-60 80-90 150-60 60 25 70 80 30 100H50z"/>
            <circle cx="130" cy="100" r="45" fill="#fff" stroke="#dc3545" stroke-width="8"/>
            <path stroke="#dc3545" stroke-linecap="round" stroke-width="8" d="M130 70v35"/>
            <circle cx="130" cy="125" r="5" fill="#dc3545"/>
        </svg>

        <div class="code">403</div>
        <div class="message">Akses Dilarang</div>
        <p>Anda tidak memiliki izin untuk mengakses halaman ini atau URL tidak ditemukan.</p>
        <a href="{{ url('/') }}" class="btn btn-danger btn-home mt-3">
            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
        </a>
    </div>

    <footer>
        &copy; {{ date('Y') }} PT. Qiprah Multi Service. All rights reserved.
    </footer>

    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
