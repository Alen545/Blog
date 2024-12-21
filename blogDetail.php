<?php

include('db.php');

$sql = "SELECT blogs.id, blogs.title, blogs.content, blogs.image, blogs.created_at, blogs.author_id, users.username AS author_name 
        FROM blogs
        INNER JOIN users ON blogs.author_id = users.id
        ORDER BY blogs.created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <?php include('userNav.php'); ?>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center mb-8">All Blog Posts</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="Blog Image" class="w-full h-64 object-cover rounded-t-lg mb-4">
                    <h3 class="text-xl font-semibold mb-2"><?php echo $row['title']; ?></h3>
                    <p class="text-gray-700 mb-4"><?php echo substr($row['content'], 0, 150) . '...'; ?></p>
                    <p class="text-sm text-gray-500 mb-4">By <?php echo $row['author_name']; ?> on <?php echo date('F j, Y', strtotime($row['created_at'])); ?></p>

                    <div class="flex justify-between items-center">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition duration-200">
                            Like
                        </button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-md text-sm hover:bg-green-700 transition duration-200">
                            Comment
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include('indexFooter.php'); ?>

</body>
</html>

<?php
$conn->close(); 
?>
