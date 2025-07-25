<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Buku Tamu Pemkab Gunungkidul</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro:wght@400&family=ABeeZee:wght@400&family=ADLaM+Display:wght@400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #00A700 0%, #193919 100%);
            font-family: 'ABeeZee', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .main-container {
            position: relative;
            min-height: 100vh;
            padding: 20px 0;
        }

        .background-accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .welcome-section {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .welcome-title {
            font-family: 'ADLaM Display', serif;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin: 20px 0;
            line-height: 1.2;
        }

        .welcome-image {
            width: 200px;
            height: 190px;
            margin-bottom: 20px;
        }

        .government-logo {
            width: 70px;
            height: 90px;
        }

        .welcome-description {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container {
            background: #E8F5E8;
            border-radius: 100px 0 0 100px;
            transition: border-radius 0.3s ease;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 2000px;
            height: auto;
        }

        /* .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }   
            /* .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        } */

        @keyframes shimmer {

            0%,
            100% {
                transform: translateX(-50%) translateY(-50%) rotate(0deg);
            }

            50% {
                transform: translateX(-50%) translateY(-50%) rotate(180deg);
            }
        }

        .form-label {
            font-weight: 600;
            color: #2E7D32;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .form-control,
        .form-select {
            border-radius: 25px;
            border: 2px solid #E8F5E8;
            padding: 12px 20px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
            background: white;
        }

        .btn-submit {
            background: linear-gradient(135deg, #2E7D32 0%, #4CAF50 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 12px 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(46, 125, 50, 0.4);
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 100%);
        }

        .photo-section {
            background: #E8F5E8;
            border-radius: 20px;
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-preview {
            width: 200px;
            height: 200px;
            border-radius: 15px;
            border: 3px solid #E8F5E8;
            object-fit: cover;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .btn-capture {
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-capture:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
            background: linear-gradient(135deg, #FF5252 0%, #FF6B6B 100%);
        }

        .photo-label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: #2E7D32;
            font-size: 0.9rem;
        }

        .contact-section {
            text-align: center;
            padding: 30px 0;
            color: white;
            position: relative;
            z-index: 2;
        }

        .contact-item {
            display: inline-flex;
            align-items: center;
            margin: 0 20px;
            font-size: 0.9rem;
        }

        .contact-item i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        .alert {
            border-radius: 15px;
            border: none;
            font-weight: 500;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .alert-success {
            background: linear-gradient(135deg, #4CAF50 0%, #66BB6A 100%);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #F44336 0%, #FF6B6B 100%);
            color: white;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #4CAF50 0%, #66BB6A 100%);
            color: white;
            border: none;
        }

        .camera-view {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-camera {
            background: linear-gradient(135deg, #4CAF50 0%, #66BB6A 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .btn-camera:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        @media (max-width: 768px) {
            .form-container {
                border-radius: 30px 30px 0 0;
                padding: 20px;
                max-width: 100%;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .photo-preview {
                width: 150px;
                height: 150px;
            }

            .contact-item {
                margin: 10px 0;
                display: block;
            }
        }
    </style>
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>