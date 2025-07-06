<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TASK MANAGER | @yield('title')</title>

    <!-- CSS & Font Imports -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Configuration -->
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

    <!-- Custom Styles -->
    <style>
        :root {
            --header-height: 4rem;
            --footer-height: 4rem;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: var(--header-height);
            padding-bottom: var(--footer-height);
            min-height: 100vh;
            background: linear-gradient(135deg, #fff0f6 0%, #ffe4e6 100%);
        }

        /* Fixed Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            height: var(--header-height);
        }

        /* Fixed Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            height: var(--footer-height);
        }

        /* Main Content */
        main {
            min-height: calc(100vh - var(--header-height) - var(--footer-height));
            padding: 1.5rem 0;
        }

        /* Status Badges */
        .badge {
            @apply px-3 py-1 rounded-full text-xs font-medium;
        }
        .badge.completed {
            @apply bg-green-100 text-green-800;
        }
        .badge.in-progress {
            @apply bg-yellow-100 text-yellow-800;
        }
        .badge.pending {
            @apply bg-blue-100 text-blue-800;
        }

        /* Task Card */
        .task-card {
            @apply bg-white rounded-lg shadow-sm border border-gray-100 transition-all duration-300;
        }
        .task-card:hover {
            @apply shadow-md transform -translate-y-0.5;
        }

        /* Custom Checkbox */
        .custom-checkbox {
            @apply appearance-none w-5 h-5 border-2 border-pink-500 rounded cursor-pointer relative;
        }
        .custom-checkbox:checked {
            @apply bg-pink-500;
        }
        .custom-checkbox:checked::after {
            content: "✓";
            @apply absolute text-white text-sm;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Buttons */
        .btn {
            @apply transition-all duration-300 font-medium rounded-lg;
        }
        .btn-pink {
            @apply bg-pink-500 text-white hover:bg-pink-600 shadow-pink;
        }
        .shadow-pink {
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
    </style>
</head>

<body class="text-gray-800">
    <!-- Fixed Header -->
    <header class="bg-pink-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold flex items-center">
                        <i class="fas fa-tasks mr-2"></i> TASK MANAGER
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="font-medium hidden sm:inline">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn bg-white text-pink-600 hover:bg-rose-100 px-4 py-1 text-sm">
                           <i class="fas fa-sign-out-alt mr-1"></i> <span class="hidden sm:inline">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="btn bg-white text-pink-600 hover:bg-rose-100 px-4 py-1 text-sm">
                           <i class="fas fa-sign-in-alt mr-1"></i> <span class="hidden sm:inline">Login</span>
                        </a>
                        <a href="{{ route('register') }}"
                           class="btn bg-pink-700 text-white hover:bg-pink-800 px-4 py-1 text-sm">
                           <i class="fas fa-user-plus mr-1"></i> <span class="hidden sm:inline">Register</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 mx-4 sm:mx-8 lg:mx-16 rounded-lg mb-4">
            <div class="flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <a href="{{ route('dashboard') }}" class="text-sm text-green-800 hover:text-green-900 ml-4">
                    <i class="fas fa-arrow-left mr-1"></i> Dashboard
                </a>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- Fixed Footer -->
    <footer class="bg-pink-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex flex-col md:flex-row justify-between items-center h-full py-2">
                <div class="text-sm mb-2 md:mb-0">
                    <i class="fas fa-id-badge mr-1"></i> L0123009 - IF A23 - Afilia Rahmadani
                </div>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/afiliailifa" target="_blank"
                       class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition"
                       aria-label="Instagram">
                       <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://id.linkedin.com/in/afilia-rahmadani-73bb09280" target="_blank"
                       class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition"
                       aria-label="LinkedIn">
                       <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Auto-hide flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(message => {
                setTimeout(() => {
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 300);
                }, 5000);
            });

            // Confirm before delete
            document.querySelectorAll('[data-confirm]').forEach(element => {
                element.addEventListener('click', (e) => {
                    if (!confirm(element.getAttribute('data-confirm'))) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>
