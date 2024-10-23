<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATIONS!</title>
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
        <h2>CRUD OPERATIONS</h2>
        <form action="crudoperations.php" method="post">
            <button type="submit" name="action" value="add">Add</button>
            <!-- <button type="submit" name="action" value="update">Update</button>
            <button type="submit" name="action" value="delete">Delete</button> -->
            <button type="submit" name="action" value="display">Display</button>
        </form>
    </div>
    <div class="right">

        <h3>Records Lists</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Emails</th>
                <th>Actions</th>
            </tr>
            <?php
            include "db_connection.php";
            $result= mysqli_query($connection,"select * from user");
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['emails']."</td>";
                echo "<td>
                <a href='crudoperations.php?action=edit&id=".$row['id']."'>Edit</a> | <a href='crudoperations.php?action=delete&id=".$row['id']."'>Delete</a>
                </td>";
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>