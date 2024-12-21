<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fix the footer to the bottom of the screen */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        footer {
            margin-top: auto;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mx-auto">
        <p>&copy; <span id="currentYear"></span> Alen's Group. All rights reserved.</p>
    </footer>

    <!-- Script for Current Date -->
    <script>
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    </script>
</body>
</html>
