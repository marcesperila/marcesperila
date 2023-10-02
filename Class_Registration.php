<?php
    include('config.php');
?>
<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS REGISTRATION</title>
</head>
<body>
    <form action="" method="POST">

        <label for="course_code">Course Code:</label>
        <select id="course_code" name="course_code" required>
        <?php
            $retrieve_All_Courses = "SELECT `CourseCode`, `CourseName` FROM `course`;";
            $result = $connection->query($retrieve_All_Courses);

            while ($row = $result->fetch_object()) {
                $CourseCode = $row->CourseCode;
                $CourseName = $row->CourseName;
                
                echo "<option value='$CourseCode'>$CourseCode | $CourseName</option>";
            }
        ?>
        </select><br><br>
        <label for="instructor">Instructor:</label>
        <select id="instructor" name="instructor" required>
        <?php
            $retrieve_All_Instructors = "SELECT `InstructorID`, `InstructorName` FROM `instructor`;";
            $result = $connection->query($retrieve_All_Instructors);

            while ($row = $result->fetch_object()) {
                $InstructorID = $row->InstructorID;
                $InstructorName = $row->InstructorName;
                
                echo "<option value='$InstructorID'>$InstructorName</option>";
            }

        ?>
        </select><br><br>

        <label for="room">Room:</label>
        <select id="room" name="room" required>
            <?php
                $retrieve_All_Rooms = "SELECT `RoomID`, `RoomName` FROM `room`;";
                $result = $connection->query($retrieve_All_Rooms);

                while ($row = $result->fetch_object()) {
                    $RoomID = $row->RoomID;
                    $RoomName = $row->RoomName;
                    
                    echo "<option value='$RoomID'>$RoomName</option>";
                }
            ?>
        </select><br><br>

        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" required><br><br>

        <label for="NoOfStudents">No. Of Students</label>
        <input type="text" id="NoOfStudents" name="NoOfStudents" required><br><br>

        <input type="submit" name="Register" value="Register">
        <?php
         if (array_key_exists('Register', $_POST))
         {
             $Course_Code = $_POST['course_code'];
             $InstructorName = $_POST['instructor'];
             $RoomName = $_POST['room'];
             $Schedule = $_POST['schedule'];
             $NoOfStudents = $_POST['NoOfStudents'];
             
             $insert_person= "INSERT INTO class (CourseID, InstructorID, RoomID, Schedule, NoOfStudents) 
                              VALUES ('$Course_Code', '$InstructorName', '$RoomName', '$Schedule', '$NoOfStudents');";
             
             $result = $connection->query($insert_person);
             if (!$result) {
                die('Error: ' . mysqli_error($connection));
            } else {
                echo "Record added successfully";
            }
         }
          
         
        ?>
    </form>
</body>
</html>