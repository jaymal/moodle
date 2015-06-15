<?php
session_start();
if (strcmp($_SESSION["access"], "student") != 0) {
    Header("Location: login.php");
}
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
                        <li role="presentation" class="active label label-default"><a href="students.php"class="navFont"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                        <li role="presentation" class="label label-default"><a href="course_enrolment.php" class="navFont">Enrolment</a></li>
                        <li role="presentation" class="label label-default"><a href="std_profile.php" class="navFont">Profile</a></li>                        
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
                            <div class="panel-heading"><h3><h3></div>
                                        <div class="panel-body">
                                            <p> Student enrolment open now!</p> 
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>    



                                        <aside>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h1>Student Enrolment</h1>
                                                    <br>
                                                    <p>Courses Available</p></div>
                                                <div class="panel-body">


                                                    <div>

                                                     
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                        </aside>


                                        </div>
                                        </body>

                                        </html>

