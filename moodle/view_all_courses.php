
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>all_course</title>

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
                        <li role="presentation" class="active label label-default"><a href="admin_home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="label label-default"><a href="student_reg.php" class="navFont">Student</a></li>
                        <li role="presentation" class="label label-default"><a href="lecturer_reg.php" class="navFont">Lecturer</a></li>
                        <li role="presentation" class="label label-default"><a href="course.php"class="navFont">Course</a></li>
                        <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                        <li role="presentation" class="label label-default"><a href="building_reg.php"class="navFont">Building</a></li>




                    </ul>
            </div>






            <div class="row">
                <div class="col-md-4">
                    <aside>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>Navigation</h1>
                            </div>
                            <div class="panel-body" >

                                <div><table>
                                        <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href = 'view_all_courses.php'"  width="500" value='View All Courses'></td></tr>
                                        <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href = 'view_all_students.php'"  width="500" value='View All Students'></td></tr>
                                        <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href = 'all_lec.php'"  width="500" value='View All Lecrurers'></td></tr>
                                        <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href = 'view_lecturer.php'"  width="500" value='Find Lecturer'></td></tr>
                                        <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href = 'view_student.php'"  width="500" value='Find Student'></td></tr>

                                    </table>

                                </div>


                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-8">


                    <div id="slide"  class="carousel slide" >
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#slide" data-slide-to="0" class="active"></li>
                            <li data-target="#slide" data-slide-to="1"></li>
                            <li data-target="#slide" data-slide-to="2"></li>

                        </ol

                        <!-- Wrapper for slides -->

                        <div class="carousel-inner" align="center"  >
                            <div class="item active">
                                <img src="img1.jpg"   alt="Chania">
                            </div>

                            <div class="item">
                                <img src="img2.jpg"   alt="Chania">
                            </div>

                            <div class="item">
                                <img src="img3.jpg"   alt="Flower">
                            </div>


                        </div>


                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#slide" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#slide" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


            </div>    
            <div >
                <aside >
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body" >

                            <div>
                                <table>

                                    <tr height="50">

                                        <th width="100">Id</th>
                                        <th width="200">Name</th>
                                        <th width="100">Credits</th>





                                    </tr>

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
                                $sql = "select * from course";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo'<form role="form" action="delete_row.php" method="post">';
                                        echo '<table><tr>';
                                        echo '<input type="hidden" value="view_all_courses.php" name="url">';
                                        echo '<input type="hidden" value="course" name="table">';
                                        echo '<input type="hidden" value="course_id" name="column">';
                                        echo '<input type="hidden" value=' . $row["course_id"] . ' name="value">';
                                        echo'<td width="100">' . $row["course_id"] . '</td><td width="200">' . $row["name"] . '</td><td width="100">' . $row["credit"] . '</td>';
                                        echo '<td><input type="submit" value="Remove" ></td></tr></table></form>';
                                    }
                                } else {
                                    
                                }

                                mysqli_close($conn);
                                ?>














                                </form>

                            </div>


                        </div>
                    </div>
                </aside> 

            </div>




        </div>


    </div>
</body>

</html>



