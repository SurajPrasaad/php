<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == "add") {
        header("Location: add.php");
        exit;
    } elseif ($action == 'update') {
        header("Location: update.php");
        exit;
    } elseif ($action == 'delete') {
        header("Location: delete.php");
        exit;
    } elseif ($action == 'display') {
        // You might want to handle the display logic differently, for example:
        header("Location: display.php"); // Or refresh the current page to show results
        exit;
    }
}

// Alternatively, handle GET requests for actions like 'edit' and 'delete'
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action == 'edit' && isset($_GET['id'])) {
        // Handle the edit logic
        $id = $_GET['id'];
        header("Location: edit.php?id=$id");
        exit;
    } elseif ($action == 'delete' && isset($_GET['id'])) {
        // Handle delete logic directly here or redirect
        $id = $_GET['id'];
        // Perform the delete operation on the database
        $query = "DELETE FROM user WHERE id=$id";
        if(mysqli_query($connection, $query)){

        echo "<script>
        alert('Records Deleted Succeesfully');
        window.location.href='index.php';
        </script>";
        // header("Location: crudoperations.php");
            }
        }
    }
?>