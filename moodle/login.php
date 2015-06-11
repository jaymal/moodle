<?php
define('DB_NAME', 'moodle');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

function getPassword($id, $pwd) {

    // Start a session for the user login
    session_start();

    if (!empty($id) AND ! empty($pwd)) {

        // The string to establish the connection
        $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Failed to connect to the database. Error code:1");
        // Select the database
        $db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to the database. Error code:2");

        // The query to get the data from the database
        $query_st = mysqli_query($con, "SELECT student.password,student.st_id FROM student WHERE student.st_id = '" . $id . "'");
        // Receive a raw from the database that satisfy the above condition and stores in "$ro_stw"
        //////$row_st = mysqli_fetch_array($query_st, MYSQLI_ASSOC) or die("Can not receive the data from the database");
        // The query to get the data from the database
        $query_lec = mysqli_query($con, "SELECT lecturer.password,lecturer.lec_id FROM lecturer WHERE lecturer.lec_id = '" . $id . "'");
        // Receive a raw from the database that satisfy the above condition and stores in "$ro_stw"
        //////$row_lec = mysqli_fetch_array($query_lec, MYSQLI_ASSOC) or die("Can not receive the data from the database");

        /*
         * Checks whether the 'password' index of the returned array is non-empty and
         * whether it is similar to the password entered by the user
         */
        if (mysqli_fetch_array($query_st, MYSQLI_ASSOC)) {
            $query_st = mysqli_query($con, "SELECT student.password,student.st_id FROM student WHERE student.st_id = '" . $id . "'");
            $row_st = mysqli_fetch_array($query_st, MYSQLI_ASSOC) or die("Can not receive the data from the database");
            if ($row_st['password'] == $pwd) {
                $_SESSION['st_id'] = $row_st['st_id'];
                echo "Access granted.";
                // redirecting to the relevant page
                header("Location: index.php");
                exit();
            }
        } elseif (mysqli_fetch_array($query_lec, MYSQLI_ASSOC)) {
            $query_lec = mysqli_query($con, "SELECT lecturer.password,lecturer.lec_id FROM lecturer WHERE lecturer.lec_id = '" . $id . "'");
            $row_lec = mysqli_fetch_array($query_lec, MYSQLI_ASSOC) or die("Can not receive the data from the database");
            ;
            if ($row_lec['password'] == $pwd) {
                $_SESSION['lec_id'] = $row_st['lec_id'];
                echo "Access granted.";
                // redirecting to the relevant page
                header("Location: view_lecturer.php");
                exit();
            }
        } else {
            echo "<script type='text/javascript'>alert('Password and Id are incorrect. Try again.');</script>";
        }

        // Closes the connection crested above
        mysqli_close($con);
    }
}


?>


<!DOCTYPE html>
<html lang="en-US">
    <head>

        <title>Login</title>
        <meta charset="utf-8">
        <link href="images/tabimage.jpg" rel="shortcut image" type="image/x-icon">    

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
                        <li role="presentation" class="active label label-default"><a href="students.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="label label-default"><a href="course_enrolment.php" class="navFont">Enrolment</a></li>
                        <li role="presentation" class="label label-default"><a href="view_student.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>




                    </ul>
            </div>






            <div class="row">
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

                <div class="col-md-4   ">
                    <div class="rightnav">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3>Login</h3></div>
                            <div class="panel-body">

                                <div>
                                    <div class="page-header"><font size="7">Login</font></div>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-3">
                                            <form role="form" method="post">
                                                <div class="form-group">
                                                    <input type="id" maxlength="7" class="form-control" id="id" placeholder="ID" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" size="25" maxlength="25" class="form-control" id="pwd" placeholder="Password" name="pwd">
                                                </div>
                                                <button type="submit" class="btn btn-default" name="login">
                                                    Login<!--add a image to the button-->
                                                </button>
                                            </form>
                                        </div>


                                    </div>

                                    <div class="col-sm-4">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            //Stores the user entered values in to 2 variables
                                            $id = $_POST['id'];
                                            $pwd = $_POST['pwd'];

                                            echo crypt($pwd, $id);

                                            // Calls the getPassword function
                                            getPassword($id, $pwd);
                                            /*
                                             * getPassword($id, crypt($pwd,$id));
                                             */
                                        }
                                        ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>    






        </div>
    </body>

</html>

