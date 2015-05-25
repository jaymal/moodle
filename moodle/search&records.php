<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 12:44
-->

<?php
/*---------------Temporary variables-----------*/
$id = "120665K";

//  Information to connect to the database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'moodle';

//  Creates a connection to the database
$conn = new mysqli($server, $username, $password, $database);

//  SQL statement to extract the basic information of the student
$sql_basic = "select * from student WHERE student.id='".$id."'";
//  SQL statement to extract the Enrollment information of the student
$sql_en = "select module.course_name,module.credit,module.dept_name from module,enrollment WHERE enrollment.student_id = '".$id."' and enrollment.course_id = module.course_id";

$message = '';
// Checks fot the connection
if($conn -> connect_error){
    $message = $conn -> connect_error;
    die('Connection error:'.$message);
}
else{
    // Extracts all the relevant basic information into $result
    $result = $conn -> query($sql_basic);
    // Extracts all the relevant enrollment information into $result_en
    $result_en = $conn -> query($sql_en);

    // If an error occurs while extracting information
    if($conn -> error){
        die('Error occurred:'.$conn -> error);
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>set to student name</title>
    <link href="images/tabimage.jpg" rel="shortcut image" type="image/x-icon">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
        <p><font size="7">Search and Records</font></p>
    </div>

    <?php
        include 'includes/navbar.php';
    ?>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-3">
            <form role="form">
                <div class="form-group">
                    <input type="search" class="form-control" id="search" placeholder="Student ID">
                </div>
            </form>
        </div>
        <div class="col-sm-1">
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>Search
            </button>
            <!--<input type="submit" name="search" id="search" value="Search">-->
        </div>
    </div>
</div>
</body>
</html>