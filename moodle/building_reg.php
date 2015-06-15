<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>building</title>

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
                        <li role="presentation" class="label label-default"><a href="student_reg.php" class="navFont">Student</a></li>
                        <li role="presentation" class="label label-default"><a href="lecturer_reg.php" class="navFont">Lecturer</a></li>
                        <li role="presentation" class="label label-default"><a href="course.php"class="navFont">Course</a></li>
                        <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                        <li role="presentation" class="active label label-default"><a href="building_reg.php"class="navFont">Building</a></li>




                    </ul>

            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add New Building</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            <form role="form" action="building_reg_entry.php" method="post">
                                <table width="400">
                                    <tr height="50"> 
                                        <td> Building ID:</td><td> <input type="text" required="required" maxlength="2" placeholder="eg:26" name="id"></td>
                                    </tr>
                                    <tr height="50">                                                            
                                        <td>Name: </td><td><input type="text" required="required" maxlength="30" placeholder="eg:Sumanadasa" name="name"></td>
                                    </tr>




                                </table>

                                <input type="submit" value="submit" class="floatright">

                            </form>


                        </div>




                    </div>
                </div>
            </aside>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Building</h1>
                    <br>
                </div>
                <div class="panel-body">


                    <div>

                        <table>

                            <tr height="50">

                                <th width="200">Id</th>
                                <th width="200">Name</th>
                               




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
                        $sql = "select * from building";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo'<form role="form" action="delete_row.php" method="post">';
                                echo '<table><tr>';
                                echo '<input type="hidden" value="building_reg.php" name="url">';
                                echo '<input type="hidden" value="building" name="table">';
                                echo '<input type="hidden" value="id" name="column">';
                                echo '<input type="hidden" value=' . $row["id"] . ' name="value">';
                                echo'<td width="200">' . $row["id"] .  '</td><td width="200">' . $row["name"] . '</td>';
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


        </div>
    </body>

</html>

