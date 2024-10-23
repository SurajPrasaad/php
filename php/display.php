<?php
include 'db_connection.php'; // Include your database connection

// Fetch all user records from the database
$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo "Error retrieving records: " . mysqli_error($connection);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 2px groove black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>All Users...</h2>


        </div>
    <div class="right">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
        // Loop through all the fetched records and display them in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['emails'] . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='crudoperations.php?action=delete&id=" . $row['id'] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>

    <br>
    <a href="index.php">Back to CRUD Operations</a></div></div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
