

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>student</title>

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
                        <li role="presentation" class="label label-default"><a href="admin_home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="active label label-default"><a href="student_reg.php" class="navFont">Student</a></li>
                        <li role="presentation" class="label label-default"><a href="lecturer_reg.php" class="navFont">Lecturer</a></li>
                        <li role="presentation" class="label label-default"><a href="course.php"class="navFont">Course</a></li>
                        <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                        <li role="presentation" class="label label-default"><a href="building_reg.php"class="navFont">Building</a></li>
                        



                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add New Student </h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <form action="student_reg.php">
                            
                            <input type="submit" value="Add New Student">
                        </form>

                        <div>

                

                            <?PHP
                            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                                

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "moodle";

                                $con = new mysqli($servername, $username, $password, $dbname); // connect in to the database
                                if ($con->connect_error) {
                                    echo 'connecting to database failed';
                                }

                                $sql = "INSERT INTO student values('".$_POST['id']."','" . $_POST['name'] . "','" . $_POST['mail'] . "','" . $_POST['phone'] . "','" . $_POST['birthday'] . "','" . $_POST['nic'] . "','" . $_POST['dept_id'] . "','" . $_POST['pw'] . "')";
                                
                                if ($con->query($sql) === TRUE) {
                                    echo 'Student was added successfully in to the system';
                                } else {
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }

                                $con->close();
                            }
                            ?>

                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>



