<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST OF CLASSES</title>
</head>
<body>
    <form method="POST">
        <label for="course_Code">Course Code:</label>
        <input type="text" id="course_Code" name="course_Code" required>
        <input type="submit" name="SearchClasses" value="Search Classes">
    </form>
</body>
</html>
<?php
if (array_key_exists('SearchClasses', $_POST)) {
    $course_Code = $_POST['course_Code'];
    
    // Use SQL to retrieve data for the entered course code
    $search_query = "SELECT * FROM class WHERE CourseID = '$course_Code';";
    $result = $connection->query($search_query);
    
    if ($result) {
        
        // Display the results in a table
        echo "<table border='1'>
              <tr>
                <th>Course Code</th>
                <th>Instructor</th>
                <th>Room</th>
                <th>Schedule</th>
                <th>No. of Students</th>
              </tr>";
              
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['CourseID'] . "</td>";
            echo "<td>" . $row['InstructorID'] . "</td>";
            echo "<td>" . $row['RoomID'] . "</td>";
            echo "<td>" . $row['Schedule'] . "</td>";
            echo "<td>" . $row['NoOfStudents'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
?>