<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Include Navigation -->
    <?php include 'indexNav.php'; ?>

    <!-- Register Form Section -->
    <section class="flex justify-center items-center min-h-screen bg-gray-100 py-6">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-semibold text-gray-800 text-center">Register</h1>
            <form action="register_action.php" method="POST" class="mt-6 space-y-6">
                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Register Button -->
                <div>
                    <button type="submit" class="w-full mt-4 bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 focus:outline-none">Register</button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="login.php" class="text-blue-600 hover:text-blue-800">Login</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include 'indexFooter.php'; ?>

</body>
</html>
