<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK MANAGER | Afilia Rahmadani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pink: {
                            500: '#ec4899',
                            600: '#db2777',
                        },
                        rose: {
                            100: '#ffe4e6',
                            200: '#fecdd3',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #fff0f6 0%, #ffe4e6 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .welcome-card {
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }
        .btn-pink {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        .btn-pink:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
        }
        .floating {
            animation: floating 4s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="text-gray-800 flex flex-col min-h-screen">
    <!-- Main Content -->
    <div class="flex-grow flex items-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="welcome-card bg-white/90 rounded-3xl p-8 md:p-12 text-center">
                <!-- Logo and Title -->
                <div class="mb-8">
                    <div class="w-24 h-24 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tasks text-white text-4xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-pink-600 mb-2">
                        TASK MANAGER
                    </h1>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Kelola tugas Anda dengan lebih efisien dan terorganisir
                    </p>
                </div>

                <!-- Login/Signup Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
                    <a href="{{ route('login') }}"
                       class="btn-pink bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-8 rounded-full text-lg">
                       <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-white hover:bg-rose-100 text-pink-600 font-bold py-3 px-8 rounded-full text-lg border-2 border-pink-500">
                       <i class="fas fa-user-plus mr-2"></i>Sign Up
                    </a>
                </div>

                <!-- Simple Feature Icons -->
                <div class="flex justify-center space-x-6 mb-10">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-list-check text-pink-600 text-2xl"></i>
                        </div>
                        <span class="text-gray-700">Organize</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-bell text-pink-600 text-2xl"></i>
                        </div>
                        <span class="text-gray-700">Reminder</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-check-circle text-pink-600 text-2xl"></i>
                        </div>
                        <span class="text-gray-700">Track</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-pink-600 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Credit -->
                <div class="mb-4 md:mb-0">
                    <p class="font-medium">
                        L0123009 - IF A23 - Afilia Rahmadani
                    </p>
                </div>

                <!-- Social Media -->
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/afiliailifa" target="_blank"
                       class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition">
                       <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://id.linkedin.com/in/afilia-rahmadani-73bb09280" target="_blank"
                       class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition">
                       <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Decorative Elements -->
    <div class="fixed bottom-10 left-10 w-20 h-20 rounded-full bg-pink-200 opacity-40 floating"></div>
    <div class="fixed top-1/4 right-5 w-16 h-16 rounded-full bg-rose-200 opacity-40 floating" style="animation-delay: 1.5s;"></div>
    <div class="fixed bottom-1/3 right-1/4 w-12 h-12 rounded-full bg-pink-300 opacity-30 floating" style="animation-delay: 2.5s;"></div>
</body>
</html>
