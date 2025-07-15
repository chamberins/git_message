<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Auth') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover {
            transition: all 0.3s ease;
        }
        
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen gradient-bg flex items-center justify-center p-4">
    <!-- Background Decorations -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-white opacity-5 rounded-full animate-float"></div>
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-white opacity-10 rounded-full animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-md">
        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn-ripple');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.height, rect.width);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
    
    <style>
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>
