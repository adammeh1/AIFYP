<?php
    // Connect to MySQL database
    $db = mysqli_connect("localhost", "root", "", "reviews");

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];

    // Insert review into the database
    $query = "INSERT INTO reviews (title, content, rating) VALUES ('$title', '$content', '$rating')";
    if (mysqli_query($db, $query)) {
        header("Location: index.php"); // Redirect to the homepage
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
?>
