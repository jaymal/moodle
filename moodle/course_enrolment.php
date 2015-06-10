<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Course Enrolment</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <?php $_SESSION["user"] = "120665k"; ?>

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
                        <h1>Student Enrolment</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                           <table>

                               <th height="50">

                                        <td width="100">Module Code</td>
                                        <td width="200">Name</td>
                                        <td width="100">Credits </td>
                                        <td width="200">Lecturer </td>                                   
                                        <td width="150">Day </td>
                                        <td width="100">Start Time </td>
                                                                         

                                    </th>
                                   
                                     </table>






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
                            $sql = "select class_id,course_id, course.name as course_name,credit,lecturer.name as lec_name,start_time,date from class natural join course JOIN lecturer USING(lec_id) WHERE class_id NOT in (SELECT class_id from enrollment WHERE st_id='" . $_SESSION["user"] . "')";
                            
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo'<form role="form" action="course_enrol.php" method="post">';
                                    echo '<table><tr>';
                                    echo '<input type="hidden" value='. $row["class_id"] .' name="class_id">';
                                    echo'<td width="100">' . $row["course_id"] . '</td><td width="200">' . $row["course_name"] . '</td><td width="100">' . $row["credit"] . '</td><td width="200">' . $row["lec_name"] . '</td><td width="150">' . $row["date"] . '</td><td width="100">' . $row["start_time"] . '</td>';
                                    echo '<td><input type="submit" value="Enrol" ></td></tr></table></form>';
                                }
                            } else {
                                echo "There no any course to enrol";
                            }
                            mysqli_close($conn);
                            ?>










                            
                                              
                                         
                           
                            </form>




                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>

