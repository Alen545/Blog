<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed top-0 w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="text-blue-600 text-xl font-bold">My Blog</a>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="about.php" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                    <a href="login.php" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                </div>
                <!-- Mobile Hamburger Icon -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <a href="about.php" class="block text-gray-700 hover:text-blue-600 px-4 py-2 font-medium">About</a>
            <a href="login.php" class="block text-gray-700 hover:text-blue-600 px-4 py-2 font-medium">Login</a>
        </div>
    </nav>

    <!-- Toggle Menu Script -->
    <script>
        const menuToggle = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>
</body>
</html>
