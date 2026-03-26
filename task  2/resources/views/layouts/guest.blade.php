<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lazord') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 RTL -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            :root {
                --primary-color: #0f3d34; /* لون لازورد الغامق */
                --secondary-color: #28a745;
                --accent-color: #f8f9fa;
            }
            body {
                font-family: 'Cairo', sans-serif;
                background-color: #f3f4f6;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
            .auth-card {
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
                overflow: hidden;
                width: 100%;
                max-width: 450px;
                padding: 2rem;
            }
            .auth-logo {
                font-size: 2rem;
                font-weight: 800;
                color: var(--primary-color);
                text-align: center;
                margin-bottom: 1.5rem;
                display: block;
                text-decoration: none;
            }
            .btn-lazord {
                background-color: var(--primary-color);
                color: white;
                transition: all 0.3s;
            }
            .btn-lazord:hover {
                background-color: #0a2b24;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card">
                        <a href="/" class="auth-logo">
                            <i class="fas fa-tooth ms-2"></i> لازورد
                        </a>
                        
                        <!-- المحتوى المتغير -->
                        {{ $slot }}
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>