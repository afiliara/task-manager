<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager - Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold mb-4">Welcome to Task Manager</h1>
            <p class="text-lg text-gray-600">Organize your tasks, stay productive, and achieve more.</p>
        </div>

        <div class="flex space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-green-500 text-white rounded shadow hover:bg-green-600 transition">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-500 text-white rounded shadow hover:bg-gray-600 transition">
                    Register
                </a>
            @endauth
        </div>
    </div>

</body>
</html>
