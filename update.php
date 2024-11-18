<?php
include 'db.php';

$id = $_GET['id']; // Get the student ID from the URL

// Fetch the student's current data to display in the form
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect updated data from the form
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    // SQL query to update the student's data in the database
    $sql = "UPDATE students SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', address='$address', course='$course', section='$section' WHERE id=$id";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the student list page after a successful update
        header("Location: index.php");
        exit(); // Make sure to exit after a header redirect
    } else {
        // Display an error message if the update fails
        echo "<div class='message error'>Error updating record: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="containers">
    <h2>Update Student</h2>

    <form method="POST">
        <table>
            <tr>
                <td><input type="text" name="firstname" value="<?php echo $student['firstname']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="middlename" value="<?php echo $student['middlename']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="lastname" value="<?php echo $student['lastname']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="number" name="age" value="<?php echo $student['age']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="address" value="<?php echo $student['address']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="course" value="<?php echo $student['course']; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="section" value="<?php echo $student['section']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Update Student</button>  <br> <br>
                    <a href="index.php" class="add-button1">Student List</a>
                </td>
            </tr>
        </table>   
    </form>
</div>
</body>
</html>
