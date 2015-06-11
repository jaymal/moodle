

<?php
session_start();
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



            </div>










            <aside>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>remove</h1>
                        <br>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $_POST['url']; ?>">

                            <input type="submit" value="Back">
                        </form>

                        <div>



                            <?PHP
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "moodle";


                            if ($_SERVER["REQUEST_METHOD"] == "POST") {




                                $con = new mysqli($servername, $username, $password, $dbname); // connect in to the database
                                if ($con->connect_error) {
                                    echo 'connecting to database failed';
                                }
                                if (!strcmp($_POST['table'], 'class')) {
                                    
                                     $sql = "delete from enrollment where class_id=" . $_POST['value'] . " ";
                                     $con->query($sql);
                                      $sql = "delete from " . $_POST['table'] . " where " . $_POST['column'] . "=" . $_POST['value'] . " ";
                                    
                                } else {


                                    $sql = "delete from " . $_POST['table'] . " where " . $_POST['column'] . "=" . $_POST['value'] . " ";
                                }
                                if ($con->query($sql) === TRUE) {
                                    echo 'Removing successfull';
                                } else {
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }

                                $con->close();
                            }
                            ?>

                        </div>




                    </div>
                </div>
            </aside>


        </div>
    </body>

</html>





