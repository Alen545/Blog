<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>
<body class="bg-gray-100">

    <?php include 'userNav.php'; ?>

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Add New Blog</h2>

        <form action="addBlog.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea id="content" name="content" rows="4" class="w-full border border-gray-300 p-2 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700">Author</label>
                <input type="text" id="author" name="author" value="<?php echo $user_name; ?>" class="w-full border border-gray-300 p-2 rounded" readonly>
                <input type="hidden" name="author_id" value="<?php echo $user_id; ?>">
            </div>

            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Blog</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        include 'db.php';

        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_id = $_POST['author_id']; 

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'uploads/' . $image_name;

            move_uploaded_file($image_tmp_name, $image_folder);
        } else {
            $image_folder = 'uploads/default.jpg'; 
        }

        $sql = "INSERT INTO blogs (title, content, image, author_id, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $image_folder, $author_id);

        if ($stmt->execute()) {
            echo "<script>alert('Blog added successfully!'); window.location.href = 'userHome.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <?php include 'indexFooter.php'; ?>

</body>
</html>
