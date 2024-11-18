<?php
include 'db.php';

// Fetch all students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student List</h2>
    <a href="create.php" class="add-button">Add Student</a>
    <table class="student-table">
        <thread>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thread>    

        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['middlename']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['section']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>"  class="edit-btn">Edit</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>"  class="delete-btn" onclick="return confirm('Are you sure? You want to delete this?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No Students Found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>



