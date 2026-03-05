<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --color-pink: #ff69b4;
            --color-pink-light: #ffb6c1;
            --color-pink-dark: #ff1493;
            --color-white: #ffffff;
            --color-gray-light: #f8fafc;
            --color-gray: #e2e8f0;
            --color-gray-dark: #94a3b8;
            --color-text: #1e293b;
            --color-text-muted: #64748b;
            --gradient-pink: linear-gradient(135deg, var(--color-pink) 0%, #ff9acb 100%);
            --shadow-sm: 0 10px 30px -10px rgba(255,105,180,0.2);
            --shadow-lg: 0 20px 40px -15px rgba(255,105,180,0.3);
            --transition-smooth: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--color-gray-light);
            color: var(--color-text);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(255, 105, 180, 0.03);
            border-radius: 50%;
            animation: float 20s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-gray-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--color-pink);
            border-radius: 10px;
            border: 3px solid var(--color-gray-light);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--color-pink-dark);
        }

        /* Text Utilities */
        .gradient-text {
            background: var(--gradient-pink);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Card Styles */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
        }

        .hover-card {
            transition: all 0.3s var(--transition-smooth);
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-sm);
            border-color: var(--color-pink);
        }

        /* Button Styles */
        .btn-pink {
            background: var(--gradient-pink);
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s var(--transition-smooth);
        }

        .btn-pink::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-pink:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline-pink {
            border: 2px solid var(--color-pink);
            color: var(--color-pink);
            background: transparent;
            transition: all 0.3s var(--transition-smooth);
        }

        .btn-outline-pink:hover {
            background: var(--gradient-pink);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
            border-color: transparent;
        }

        /* Badge Styles */
        .badge-pink {
            background: linear-gradient(135deg, rgba(255,105,180,0.1) 0%, rgba(255,154,203,0.1) 100%);
            color: var(--color-pink);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            border: 1px solid rgba(255,105,180,0.2);
        }

        /* Animation Classes */
        .animate-in {
            animation: fadeInUp 0.8s var(--transition-smooth) forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        .delay-5 { animation-delay: 0.5s; }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation" id="bgAnimation"></div>