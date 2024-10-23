<?php
include "db_connection.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id= intval($_POST['id']);
    $name= $_POST['name'];
    $emails=$_POST['emails'];
    $query= "INSERT INTO user (id,name,emails) values ('$id','$name','$emails')";
    if(mysqli_query($connection,$query)){
        echo "<script>alert('New record added Successfully...');
        window.location.href='index.php';
    </script>";
        // echo "";
        // header("Location: index.php");
    }else{
        echo "Error: ".$query."<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left">
    <h2>Add a new user...</h2>
    </div>
    <div class="right">
    <form action="add.php" method="post">
        <div class="input">
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        </div>
        <div class="input">
        <label for="name">Name </label>
        <input type="text" name="name" id="name">
        </div>
        <div class="input">
        <label for="emails">Emails</label>
        <input type="text" name="emails" id="emails">
        </div>
        
        <button type="submit">Add User</button>
    </form>
    <a href="./index.php">Back to home</a>
    </div></div>
</body>
</html>