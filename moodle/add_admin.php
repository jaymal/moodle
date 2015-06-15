<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>add new department</title>

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

                        <ul class="nav nav-pills navFont ">
                            <li role="presentation" class=" label label-default"><a href="admin_home.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                            <li role="presentation" class="active label label-default"><a href="add_admin.php"class="navFont">Admin</a></li>
                            <li role="presentation" class="label label-default"><a href="student_reg.php" class="navFont">Student</a></li>
                            <li role="presentation" class="label label-default"><a href="lecturer_reg.php" class="navFont">Lecturer</a></li>
                            <li role="presentation" class="label label-default"><a href="course.php"class="navFont">Course</a></li>
                            <li role="presentation" class="label label-default"><a href="dept_entry.php"class="navFont">Department</a></li>
                            <li role="presentation" class="label label-default"><a href="building_reg.php"class="navFont">Building</a></li>




                        </ul>

                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Add New Admin</h1>
                        <br>
                    </div>
                    <div class="panel-body">


                        <div>

                            <form role="form" action="add_admin_entry.php" method="post">
                                <table width="300">
                                    <tr height="50"> 
                                        <td>Name:</td><td> <input type="text" maxlength="50"  required="required"  placeholder="eg:Chathura Wijeweera" name="name"></td>
                                    </tr>
                                    <tr height="50">                                                            
                                        <td>Contact No: </td><td><input type="text" maxlength="10"  required="required" placeholder="eg:0713182006" name="number"></td>
                                    </tr>
                                     <tr height="50">                                                            
                                        <td>Email: </td><td><input type="email" maxlength="50"  required="required"  placeholder="eg:Chathura@gmail.com" name="mail"></td>
                                    </tr>
                                     <tr height="50">                                                            
                                        <td>User Name: </td><td><input type="text" maxlength="30"  required="required"  placeholder="eg:chathura91" name="user"></td>
                                    </tr>
                                     <tr height="50">                                                            
                                         <td>Password: </td><td><input type="password" maxlength="20"  required="required"  placeholder="password" name="pw"></td>
                                    </tr>
                                    <!---->
                                    <tr height="50">
                                        <td>Account Type:</td>
                                        <td>
                                           
                                            <select name="status">
                                                 <option value="power">Power User</option>
                                                 <option value="normal">User</option>

                                                
                                            </select>

                                        </td>
                                    </tr>
                                    <!---->

                                </table>

                                <input type="submit" value="Add" class="floatright">

                            </form>


                        </div>




                    </div>
                </div>
            </aside>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Admin</h1>
                    <br>
                </div>
                <div class="panel-body">


                    <div>

                        <table>

                            <tr height="50">

                                <th width="200">User Name</th>
                                <th width="200">Name</th>
                                <th width="200">Email</th>
                                <th width="200">Contact No</th>




                            </tr>

                        </table>






                        <?php
                         $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "moodle";
                         $conn = mysqli_connect($servername, $username, $password, $dbname);
                         if (!$conn) {

                            die("Connection failed:" . mysqli_connect_error());
                        }
                        $sql = "select status from admin where user_name='".$_SESSION["user"]."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if (strcmp($row["status"],"power")==0) {
                            
                        
                       

                        //Create connection
                       // $conn = mysqli_connect($servername, $username, $password, $dbname);
                       
                        $sql = "select * from admin";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo'<form role="form" action="delete_row.php" method="post">';
                                echo '<table><tr>';
                                echo '<input type="hidden" value="add_admin.php" name="url">';
                                echo '<input type="hidden" value="admin" name="table">';
                                echo '<input type="hidden" value="user_name" name="column">';
                                echo '<input type="hidden" value=' . $row["user_name"] . ' name="value">';
                                echo'<td width="200">' . $row["user_name"] . '</td><td width="200">' . $row["name"] . '</td><td width="200">'. $row["email"] . '</td><td width="200">' . $row["Contact_no"] . '</td>';
                                echo '<td><input type="submit" value="Remove" ></td></tr></table></form>';
                            }
                        } else {
                            
                        }

                        mysqli_close($conn);
                        }  else {
                            echo 'You does not have permission to view this content';
                        }
                        ?>














                        </form>




                    </div>




                </div>
            </div>


        </div>
    </body>

</html>

