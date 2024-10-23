<?php
include 'db_connection.php'; // Include the database connection file

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user's data based on the ID
    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Handle the form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update the user data in the database
    $update_query = "UPDATE user SET name = '$name', emails = '$email' WHERE id = $id";

    if (mysqli_query($connection, $update_query)) {
        echo "<script>alert('User updated successfully!');
            window.location.href='index.php';
        </script>";
        // header("Location: index.php"); // Redirect to the CRUD operations page after updating
        // exit;
        
    } else {
        echo "Error updating user: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="left">
    <h2>Edit User...</h2>
    </div>
    <div class="right">
    <form action="" method="POST">
        <div class="input">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>
        </div>
        <div class="input">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['emails']); ?>" required><br><br>
        </div>
        <button type="submit">Update</button>
    </form>

    <a href="index.php">Back to CRUD operations</a>
    </div></div>
</body>
</html>
