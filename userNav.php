<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hamburger {
            display: none;
        }
        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex justify-between items-center p-4 bg-gray-800 text-white">
        <div class="text-xl font-bold">My Blog</div>

        <div class="hidden md:flex space-x-4">
            <a href="addBlog.php" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">Add Blog</a>
            <a href="login.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">Logout</a>
        </div>

        <div class="md:hidden flex items-center">
            <button id="hamburger" class="hamburger text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden bg-gray-800 text-white px-4 py-2 space-y-4 hidden">
        <a href="addBlog.php" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition w-full">Add Blog</a>
        <a href="login.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition w-full">Logout</a>
    </div>

    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
