<?php
include 'db.php';

$message = ''; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    $sql = "INSERT INTO students (firstname, middlename, lastname, age, address, course, section) 
            VALUES ('$firstname', '$middlename', '$lastname', '$age', '$address', '$course', '$section')";
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='message success'>New student added successfully!</div>";
    } else {
        $message = "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="containers">
    <h2>Add New Student</h2>
    
    <!-- Display the success/error message -->
    <?php if ($message) echo $message; ?>

    <form method="POST" action="create.php">
        <table>
            <tr>
                <td><input type="text" name="firstname" placeholder="First Name" required></td>
            </tr>
            <tr>
                <td><input type="text" name="middlename" placeholder="Middle Name" required></td>
            </tr>
            <tr>
                <td><input type="text" name="lastname" placeholder="Last Name" required></td>
            </tr>
            <tr>
                <td><input type="number" name="age" placeholder="Age" required></td>
            </tr>
            <tr>
                <td><input type="text" name="address" placeholder="Address" required></td>
            </tr>
            <tr>
                <td><input type="text" name="course" placeholder="Course" required></td>
            </tr>
            <tr>
                <td><input type="text" name="section" placeholder="Section" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Add Student</button> <br> <br>
                    <a href="index.php" class="add-button1">Student List</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
