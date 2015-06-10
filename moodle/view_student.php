<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Profile</title>

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
                        <li role="presentation" class="label label-default"><a href="students.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class=" label label-default"><a href="course_enrolment.php" class="navFont">Enrolment</a></li>
                        <li role="presentation" class="active label label-default"><a href="view_student.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>




                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>My Profile</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            

                                    



                                                               
                                    <table>
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
                                    $sql = "select * from student natural join department WHERE st_id='" . $_SESSION["user"] . "'";

                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {

                                        $row = mysqli_fetch_assoc($result);
                                       
                                            echo'<tr><th width="200">Id: </th><td>'.$row["st_id"].'</td></tr>';
                                            echo'<tr><th>Name: </th><td>'.$row["name"].'</td></tr>';
                                            echo'<tr><th>NIC: </th><td>'.$row["nic"].'</td></tr>';
                                            echo'<tr><th>Birthday: </th><td>'.$row["birthday"].'</td></tr>';
                                            echo'<tr><th>Email: </th><td>'.$row["email"].'</td></tr>';
                                            echo'<tr><th>Department: </th><td>'.$row["dept_name"].'</td></tr>';
                                            echo'<tr><th>Contact No: </th><td>'.$row["contact_no"].'</td></tr>';
                                        
                                    } else {
                                        echo "No data available";
                                    }
                                    mysqli_close($conn);
                                    ?>                         

                                    </table>
                              


                        </div>




                    </div>
                </div>
            </aside>




        </div>
    </body>

</html>

