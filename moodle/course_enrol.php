

<?php
session_start();
if (strcmp($_SESSION["access"], "student") != 0) {
    Header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>lecturer</title>

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
                        <li role="presentation" class="active label label-default"><a href="course_enrolment.php" class="navFont">Enrolment</a></li>
                        <li role="presentation" class="label label-default"><a href="std_profile.php" class="navFont">Profile</a></li>                        
                        <li role="presentation" class="label label-default"><a href="#"class="navFont">Contacts</a></li>
                       



                    </ul>
            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>Enrol Course </h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <form action="course_enrolment.php">

                            <input type="submit" value="Enrol New">
                        </form>

                        <div>



                            <?PHP
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "moodle";


                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            if (!$conn) {

                                die("Connection failed:" . mysqli_connect_error());
                            }
                            $sql = "SELECT sum(credit) as total_credits FROM enrollment natural join class JOIN course USING(course_id) where st_id='" . $_SESSION["user"] . "'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            mysqli_close($conn);


                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                               
                                if ($row['total_credits'] < 25) {

                                    $con = new mysqli($servername, $username, $password, $dbname); // connect in to the database
                                    if ($con->connect_error) {
                                        echo 'connecting to database failed';
                                    }

                                    $sql = "INSERT INTO enrollment values('".$_SESSION['user'] ."','". $_POST['class_id'] ."')";

                                    if ($con->query($sql) === TRUE) {
                                        echo 'Enrolment was successfull';
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $con->error;
                                    }

                                    $con->close();
                                } else {
                                    echo 'You have already taken 25 credits. you can not take more than 25 credits ';
                                }
                            }
                            ?>

                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>



