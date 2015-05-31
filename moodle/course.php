<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Course</title>

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
                        <h1>Add New Course</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            <form role="form" action="course_entry.php" method="post">
                                <table width="400">
                                    <tr height="50"> 
                                        <td> Course ID:</td><td> <input type="text" name="id"></td>
                                    </tr>
                                    <tr height="50">                                                            
                                        <td>Name: </td><td><input type="text" name="name"></td>
                                    </tr>
                                    <tr height="50">

                                        <td>Credit:</td><td> <input type="text" name="credit"></td>
                                    </tr>
                                    <tr height="50">
                                        <td>Department ID:</td><td><input type="text" name="dept_id"></td>
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

