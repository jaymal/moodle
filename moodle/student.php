<?php
session_start();
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>student</title>
    </head>
    <body>

        <h1>Student Enrollment</h1>
        <div>

            <?php
            $_SESSION["user"] = "120526L";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moodle";

            //Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            //check connection
            if (!$conn) {

                die("Connection failed:" . mysqli_connect_error());
            }
            $sql = "SELECT course_id,course_name FROM module";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                echo "<table><tr><th>ID</th><th>Course</th><th> </th></tr>"; //table h


                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr><td>' . $row["course_id"] . '</td><td>' . $row["course_name"];
                    echo( '</td><td>-><a href="student.php?id=' . "'" . $row["course_id"] . "'" . '">Enroll</a></td></tr>' );
                }

                echo ($_SESSION["user"]);
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
            ?>
            <div>
                <?php
                $enrolled = $_GET['id'];
                if ($enrolled !=NULL) {
                    echo $enrolled;

                    $conn = new mysqli('localhost', 'root', '', 'moodle');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "INSERT INTO enrollment (course_id,student_id)VALUES (".$enrolled.",'".$_SESSION["user"]."')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Enrollent successfull";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                }
                ?>
            </div>
        </div>



    </body>
</html> 


