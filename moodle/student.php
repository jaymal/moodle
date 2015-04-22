 <!DOCTYPE html>
<html>
<head>
<title>student</title>
</head>
<body>

<h1>Student Enrollment</h1>
<div>
  
    <?php
     $servername="localhost";
     $username="root";
     $password="";
     $dbname="moodle";
     
     //Create connection
     $conn=  mysqli_connect($servername, $username, $password, $dbname);
     //check connection
     if(!$conn){
         
         die("Connection failed:" .  mysqli_connect_error());
     }
     $sql="SELECT course_id,course_name FROM module";
     $result= mysqli_query($conn, $sql);
     
     if(mysqli_num_rows($result)>0){
         
        echo "<table><tr><th>ID</th><th>Course</th><th> </th></tr>";//table h
         
         
        while($row=  mysqli_fetch_assoc($result)){
             echo "<tr><td>".$row["course_id"]."</td><td>".$row["course_name"];
             echo( "</td><td>".'-><a href="http://mylink.com/path/">Enroll</a>'."</td></tr>" );
            
            
        } 
         
     }
     else{
         echo "0 results";
         
     }
     mysqli_close($conn);
    ?>
    
</div>



</body>
</html> 


