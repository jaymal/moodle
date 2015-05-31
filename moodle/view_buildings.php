
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
                        <li role="presentation" class="label label-default"><a href="course.php"class="navFont">Course</a></li>
                        <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                        <li role="presentation" class="active label label-default"><a href="building_reg.php"class="navFont">Available Buildings</a></li>




                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Departments</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

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
                            $sql = "SELECT * FROM building";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                echo "<table width='700' ><tr><th>ID</th><th>Building Name</th><th> </th></tr>"; //table h


                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr height="60"><td>' . $row["id"] . '</td><td>' . $row["name"];
                                    
                                }

                                
                            } else {
                                echo "0 results";
                            }
                            mysqli_close($conn);
                            ?>


                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>

