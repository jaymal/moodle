<!--
 * Created by PhpStorm.
 * User: Ivan Udakara
 * Date: 23/04/2015
 * Time: AM 9:39
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="page-header"><font size="7">Login</font></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="id" class="form-control" id="id" placeholder="ID">
                        </div>
                        <div class="form-group">
                            <input type="password" size="25" class="form-control" id="pwd" placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-default" name="login">
                        <span class=""></span>Login<!--add a image to the button-->
                    </button>
                    <!--<input type="submit" name="search" id="search" value="Search">-->
                </div>
                <?php
                    if(isset($_POST['login'])){
                        $id = $_POST['id'];
                        $pwd = $_POST['pwd'];

                        $sql_login = "select id";
                    }
                ?>
            </div>
        </div>
    </body>
</html>