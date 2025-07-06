<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Modern Task Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                        dark: '#1f2937',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7fb 100%);
            min-height: 100vh;
        }
        .task-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            height: 8px;
            border-radius: 4px;
        }
        .glow-btn {
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            transition: all 0.3s ease;
        }
        .glow-btn:hover {
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            transform: translateY(-2px);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="text-gray-800">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center py-16 md:py-28">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Manage Tasks <span class="text-primary">Smarter</span>,
                    <br>Not <span class="text-secondary">Harder</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                    TaskFlow helps you organize, prioritize, and complete tasks efficiently.
                    Focus on what matters most with our intuitive task management system.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('login') }}"
                       class="glow-btn bg-primary hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                       Get Started
                    </a>
                    <a href="#features"
                       class="bg-white hover:bg-gray-100 text-gray-800 font-bold py-3 px-8 rounded-full text-lg border border-gray-300 transition duration-300">
                       Learn More
                    </a>
                </div>
            </div>
        </div>

        <!-- Feature Cards -->
        <div id="features" class="py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Powerful Features</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Everything you need to manage your tasks effectively</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl p-8 task-card">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-tasks text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Intuitive Task Management</h3>
                    <p class="text-gray-600 mb-4">
                        Create, organize, and prioritize tasks with drag-and-drop simplicity.
                    </p>
                    <div class="mt-4">
                        <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm mr-2">
                            <i class="fas fa-check-circle mr-1"></i> Due Dates
                        </span>
                        <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-check-circle mr-1"></i> Priorities
                        </span>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl p-8 task-card">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bell text-secondary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Smart Reminders</h3>
                    <p class="text-gray-600 mb-4">
                        Never miss a deadline with customizable notifications and reminders.
                    </p>
                    <div class="mt-6">
                        <div class="flex items-center mb-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm">Email Notifications</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-sm">Push Notifications</span>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl p-8 task-card">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Productivity Insights</h3>
                    <p class="text-gray-600 mb-4">
                        Track your progress with visual reports and performance analytics.
                    </p>
                    <div class="mt-6">
                        <div class="mb-2">
                            <div class="flex justify-between text-sm mb-1">
                                <span>Task Completion</span>
                                <span>78%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-primary h-2.5 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>On-time Tasks</span>
                                <span>92%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 92%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Demo Section -->
        <div class="py-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="relative">
                    <div class="absolute top-0 left-0 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
                    <div class="absolute top-20 right-10 w-64 h-64 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
                    <div class="relative bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg">Today's Tasks</h3>
                            <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full">5 tasks</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Task 1 -->
                            <div class="flex items-start">
                                <input type="checkbox" class="mt-1 mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                                <div class="flex-1">
                                    <p class="font-medium">Design dashboard UI</p>
                                    <div class="flex items-center text-sm text-gray-500 mt-1">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>Due: Today 3:00 PM</span>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">High</span>
                            </div>

                            <!-- Task 2 -->
                            <div class="flex items-start">
                                <input type="checkbox" class="mt-1 mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                                <div class="flex-1">
                                    <p class="font-medium">Team meeting</p>
                                    <div class="flex items-center text-sm text-gray-500 mt-1">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>Due: Today 11:00 AM</span>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Medium</span>
                            </div>

                            <!-- Task 3 -->
                            <div class="flex items-start">
                                <input type="checkbox" class="mt-1 mr-3 h-5 w-5 text-primary rounded focus:ring-primary" checked>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-400 line-through">Send project report</p>
                                    <div class="flex items-center text-sm text-gray-400 mt-1">
                                        <i class="far fa-check-circle mr-1 text-green-500"></i>
                                        <span>Completed: Today 9:30 AM</span>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Low</span>
                            </div>
                        </div>

                        <div class="mt-8 pt-4 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium">Daily Progress</p>
                                    <p class="text-2xl font-bold text-primary">3/5 tasks</p>
                                </div>
                                <div class="relative">
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center bg-indigo-50">
                                        <span class="text-lg font-bold text-primary">60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 md:pl-12">
                <h2 class="text-3xl font-bold mb-6">
                    <span class="text-primary">Visualize</span> Your Productivity
                </h2>
                <p class="text-gray-600 mb-6">
                    Our interactive dashboard gives you a clear overview of your task progress,
                    upcoming deadlines, and performance metrics. Stay on top of your workload
                    without feeling overwhelmed.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Real-time progress tracking</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Customizable task views (list, board, calendar)</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Performance analytics and insights</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}"
                   class="inline-block glow-btn bg-gradient-to-r from-primary to-secondary text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                   Try Free for 30 Days
                </a>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Trusted by Thousands</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Join our community of productive individuals and teams</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-800 font-bold mr-4">SD</div>
                        <div>
                            <h4 class="font-bold">Sarah Johnson</h4>
                            <p class="text-gray-600 text-sm">Product Manager</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "TaskFlow has transformed how our team manages projects. We've seen a 40% increase in productivity since we started using it."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-800 font-bold mr-4">MK</div>
                        <div>
                            <h4 class="font-bold">Michael Kim</h4>
                            <p class="text-gray-600 text-sm">Freelancer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "As a freelancer juggling multiple clients, TaskFlow keeps me organized and ensures I never miss a deadline."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold mr-4">TR</div>
                        <div>
                            <h4 class="font-bold">Tara Rodriguez</h4>
                            <p class="text-gray-600 text-sm">Marketing Team Lead</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "The collaboration features have made team coordination seamless. We've reduced meeting times by 30%!"
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="py-16 text-center">
            <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-12 text-white">
                <h2 class="text-3xl font-bold mb-6">Ready to Transform Your Productivity?</h2>
                <p class="text-indigo-100 max-w-2xl mx-auto mb-8">
                    Join thousands of satisfied users and take control of your tasks today.
                    It's free to get started!
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}"
                       class="glow-btn bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                       Sign Up Free
                    </a>
                    <a href="{{ route('login') }}"
                       class="bg-transparent hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full text-lg border border-white transition duration-300">
                       Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TaskFlow</h3>
                    <p class="text-gray-400">
                        The modern task management solution for individuals and teams.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Product</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Features</a></li>
                        <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Integrations</a></li>
                        <li><a href="#" class="hover:text-white transition">Updates</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition">Tutorials</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Connect</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="text-gray-400">Subscribe to our newsletter</p>
                    <div class="mt-2 flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l-lg bg-gray-800 text-white w-full">
                        <button class="bg-primary hover:bg-indigo-700 px-4 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2023 TaskFlow. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Elements for Decoration -->
    <div class="fixed bottom-10 right-10 w-16 h-16 rounded-full bg-purple-200 opacity-30 floating"></div>
    <div class="fixed top-1/4 left-5 w-12 h-12 rounded-full bg-indigo-200 opacity-30 floating" style="animation-delay: 1s;"></div>
    <div class="fixed bottom-1/3 left-1/4 w-10 h-10 rounded-full bg-blue-200 opacity-30 floating" style="animation-delay: 2s;"></div>
</body>
</html>
