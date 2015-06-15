<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 2:09
-->

<?php
//  Information to connect to the database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'moodle';

//  Creates a connection to the database
$conn = new mysqli($server, $username, $password, $database);

function getBInfo($id, $conn){

    //  SQL statement to extract the basic information of the student
    $sql_basic = "select * from lecturer WHERE lecturer.lec_id='".$id."'";

    $message = '';

    // Checks fot the connection
    if($conn -> connect_error){
        $message = $conn -> connect_error;
        die('Connection error:'.$message);
    }
    else{
        // Extracts all the relevant basic information into $result
        $result = $conn -> query($sql_basic);

        // If an error occurs while extracting information
        if($conn -> error){
            die('Error occurred:'.$conn -> error);
        }
    }
    showBInfo($message, $result);
}

function getModuleInfo($id, $conn){

    //  SQL statement to extract the Enrollment information of the student
    $sql_en = "select course.name, course.credit, class.course_id, class.class_id from course, class WHERE class.lec_id = '".$id."' and course.course_id= class.course_id";

    $message = '';

    // Checks fot the connection
    if($conn -> connect_error){
        $message = $conn -> connect_error;
        die('Connection error:'.$message);
    }
    else{
        // Extracts all the relevant enrollment information into $result_en
        $result_en = $conn -> query($sql_en);

        // If an error occurs while extracting information
        if($conn -> error){
            die('Error occurred:'.$conn -> error);
        }
    }
    showModuleInfo($message, $result_en);
}

function showModuleInfo($message, $result_en){
    $tot_credits = 0;
    if($message){
        echo '<h4>'.$message.'</h4>';
    }
    else{
        if($result_en -> num_rows > 0){
            while($row = $result_en -> fetch_assoc()){
                echo '<tr><td>'.$row['course_id'].'</td>
                              <td>'.$row['name'].'</td>
                              <td>'.$row['credit'].'</td>
                              <td>'.$row['class_id'].'</td>
                              </tr>';
                //print_r($row);
            }
        }
        else{
            echo 'No records found';
        }
    }
    //$conn -> close();
}


function showBInfo($message, $result){
    if(isset($_POST['search'])){
        if($message){
            echo '<h4>'.$message.'</h4>';
        }
        else{
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){

                    echo '<br>Index no   : '.$row['lec_id'].'
                          <br>Name       : '.$row['name'].'
                          <br>Department : '.$row['department'].'
                          <br>Contact no.: '.$row['contact_no'].'
                          <br>City       : '.$row['city'].'
                          <br>';
                }
            }
            else{
                echo 'No records found';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Search lecturers</title>

    <link href="images/tabimage.png" rel="shortcut icon" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
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

                        <div>
                            <table>
                                <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href='view_all_students.php'"  width="500" value='View All Students'></td></tr>
                                <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href='all_lec.php'"  width="500" value='View All Lecrurers'></td></tr>
                                <tr height="80"><td width="300"> <input class="btn btn-primary" type=button  onClick="location.href='view_lecturer.php'"  width="500" value='Find Lecturer'></td></tr>
                                <tr height="80"><td width="300"> <input class="btn btn-info" type=button  onClick="location.href='view_student.php'"  width="500" value='Find Student'></td></tr>

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





    <!--<div class="page-header">
        <p><font size="7">Search lecturers</font></p>
    </div>-->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Search lecturers</h1>
        </div>

        <form role="form" method="post">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <br><br>
                        <input type="search" class="form-control" id="search" placeholder="Lecturer ID" name="id">
                        <!--<input type="submit" name="search" id="search" value="Search">-->
                    </div>
                </div>
                <div class="col-sm-1">
                    <br><br>
                    <button type="submit" class="btn btn-default" name="search">
                        <span class="glyphicon glyphicon-search"></span>Search
                    </button>
                </div>
            </div>
        </form>


        <!--Division for the Basic info-->
        <br><br>
        <div class="well well-sm">
            <h1><font size="5">Basic information</font></h1>

            <?php
            if(isset($_POST['search'])){
                $id = $_POST['id'];
                getBInfo($id, $conn);
            }
            ?>
        </div>
        <!--Division for the Enrollment info-->
        <br>
        <div class="well">
            <h1><font size="5">Modules teaching</font></h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Module code</th>
                        <th>Module title</th>
                        <th>Credits</th>
                        <th>Class id</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_POST['search'])){
                        $id = $_POST['id'];
                        getModuleInfo($id, $conn);
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
</body>
</html>