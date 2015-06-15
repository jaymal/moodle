<?php
session_start();
if (strcmp($_SESSION["access"], "lecturer") != 0) {
    Header("Location: login.php");
}
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
                        <li role="presentation" class="label label-default"><a href="lec_home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class=" active label label-default"><a href="add_class.php" class="navFont">Class</a></li>
                        <li role="presentation" class="label label-default"><a href="lec_profile.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>




                    </ul>
            </div>







            <div class="row">
                <div class="col-md-6">


            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>New Course</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            <form role="form" action="class_entry.php" method="post">
                                <table>
                                   
                                    
                                    <tr height="50">
                                        <td width="100">Course :</td><td>
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
                                     <tr height="50"> 
                                        <td> Class ID:</td><td> <input type="text" maxlength="4"  required="required"  placeholder="eg:3128" name="id"></td>
                                    </tr>
                                    <tr height="50">                                                            
                                        <td>Date: </td><td><input type="date" required="required"  placeholder="yyyy/mm/dd" name="date"></td>
                                        <tr height="50">

                                            <td>Time:</td><td> <input type="time" required="required"  placeholder="eg:1.15pm" name="time"></td>
                                    </tr>
                                    </tr>


                                </table>

                                <input type="submit" value="submit" class="floatright">

                            </form>


                        </div>




                    </div>
                </div>
            </aside>
                     </div>
                
                 <aside class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>My Active Courses</h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th width="80">Class ID</th><th width="80">Course ID</th><th width="180">Name</th>
                                
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
                            $sql = "select class_id,course_id,name from class natural join course WHERE lec_id='".$_SESSION["user"]."'";
                            
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo'<form role="form" action="delete_row.php" method="post">';
                                    echo '<table><tr>';
                                    echo '<input type="hidden" value="add_class.php" name="url">';
                                    echo '<input type="hidden" value="class" name="table">';
                                    echo '<input type="hidden" value="class_id" name="column">';
                                    echo '<input type="hidden" value='.$row["class_id"].' name="value">';                                   
                                    echo'<td width="80">' .$row["class_id"] . '</td><td width="80">' .$row["course_id"] . '</td><td width="180">' . $row["name"] . '</td>';
                                    echo '<td><input type="submit" value="Drop" ></td></tr></table></form>';
                                    
                                }
                               
                            } else {
                                
                            }
                            
                            mysqli_close($conn);
                            ?>

                        <div>



                            

                        </div>




                    </div>
                </div>
            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Other Active Courses</h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th width="100">Class ID</th><th width="100">Course ID</th><th width="200">Name</th><th width="200">Lecturer</th>
                                
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
                            $sql = "select class_id,course_id,course.name as name,lecturer.name as lec_name from course natural join  class join lecturer using(lec_id) where lec_id !='".$_SESSION['user']."'";
                            
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo'<form role="form" action="delete_row.php" method="post">';
                                    echo '<table><tr>';                                                                     
                                    echo'<td width="100">' .$row["class_id"] . '</td><td width="100">' .$row["course_id"] . '</td><td width="200">' . $row["name"] . '</td><td width="200">' . $row["lec_name"] . '</td>';
                                    echo '</tr></table></form>';
                                    
                                }
                               
                            } else {
                                
                            }
                            
                            mysqli_close($conn);
                            ?>

                        <div>



                            

                        </div>




                    </div>
                </div>
            </aside>
                </div>


        </div>
    </body>

</html>

