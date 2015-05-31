<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>new class</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>



    </head>


    <!-this is body  ->
    <body >

        <div class="container">
            <div style="background-color:#0f0f0f; margin-top:5px; margin-bottom:5px ">
                <nav class="nav nav-tabs nav-justified ">


                    <ul class="nav nav-pills navFont ">
                        <li role="presentation" class="label label-default"><a href="home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="label label-default"><a href="student_reg.php" class="navFont">Student</a></li>
                        <li role="presentation" class="label label-default"><a href="lecturer_reg.php" class="navFont">Lecturer</a></li>
                        <li role="presentation" class="active label label-default"><a href="course.php"class="navFont">Course</a></li>
                        <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                        <li role="presentation" class="label label-default"><a href="building_reg.php"class="navFont">Building</a></li>




                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add New Class</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            <form role="form" action="class_entry.php" method="post">
                                <table width="400">
                                    <tr height="50"> 
                                        <td> Class ID:</td><td> <input type="text" name="id"></td>
                                    </tr>
                                    <tr height="50">                                                            
                                        <td>Date: </td><td><input type="text" name="date"></td>
                                    </tr>
                                    <tr height="50">

                                        <td>Time:</td><td> <input type="text" name="time"></td>
                                    </tr>
                                    <tr height="50">
                                        <td>Course :</td><td>
                                            <select name="course_id">


                                                <?php
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
                                                $sql = "SELECT name,course_id FROM course";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo' <option value="' . $row["course_id"] . '">' . $row["name"] . '</option>';
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select> 

                                        </td>
                                    </tr>
                                    <tr height="50">
                                        <td>Building :</td><td>
                                            <select name="building">


                                                <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $password ="";
                                                $dbname = "moodle";

                                                //Create connection
                                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                //check connection
                                                if (!$conn) {

                                                    die("Connection failed:" . mysqli_connect_error());
                                                }
                                                $sql = "SELECT * FROM building";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo' <option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </select> 

                                        </td>
                                    </tr>


                                </table>

                                <input type="submit" value="submit" class="floatright">

                            </form>


                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>

