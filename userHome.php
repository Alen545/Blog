<?php
include 'db.php'; 

$sql = "SELECT blogs.*, users.username FROM blogs JOIN users ON blogs.author_id = users.id ORDER BY blogs.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

   <?php include('userNav.php'); ?>

   <div class="container mx-auto p-6">
       <h2 class="text-2xl font-bold mb-6">Latest Blog Posts</h2>
       
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
           <?php if ($result->num_rows > 0): ?>
               <?php while ($row = $result->fetch_assoc()): ?>
                   <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                       <img src="<?php echo $row['image']; ?>" alt="Blog Image" class="w-full h-48 object-cover">
                       <div class="p-4">
                           <h3 class="text-xl font-semibold text-gray-800"><?php echo $row['title']; ?></h3>
                           <div class="mt-4 flex items-center">
                               <span class="text-gray-500">By <?php echo $row['username']; ?></span>
                           </div>
                           <a href="blogDetail.php?id=<?php echo $row['id']; ?>" class="text-blue-500 mt-4 inline-block">Read More</a>
                       </div>
                   </div>
               <?php endwhile; ?>
           <?php else: ?>
               <p>No blog posts found.</p>
           <?php endif; ?>
       </div>
   </div>

   <?php include('indexFooter.php'); ?>

</body>
</html>

<?php
$conn->close();
?>
