<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Student+deleted+successfully!");
    } else {
        header("Location: index.php?message=Error+deleting+record");
    }
}
exit;
