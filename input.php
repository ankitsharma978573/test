<html>
<head>

</head>
<body>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}
input[type=text], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
img.avatar {
  width: 20%;
  border-radius: 30%;
}
.imgcontainers {
  text-align: center;
  margin: 12px 0 6px 0;
  
}

</style>
<h1><center>Daily expences</center></h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="imgcontainers">
    <img src="budget.jpg" alt="login" height= "50%"  class="login" width: 50px;>
  </div>
 
<h1>amount <input type="number" name="t1">
  <br><br>
  discription <input type="text" name="t2">
  <br><br>

  <div class="container">
    <button type="submit" name="b1" class="button">upload</button>
  </div>
  </h1>
</form>



<?php
error_reporting(0);
   $no;
   $d=date("yy-m-d");
  
        $amt=$_POST["t1"];
        $dis=$_POST["t2"];
        
    $servername="localhost";
    $username="root";
    $password="";
    $db="project";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "connected";
        if(empty($amt))
        {
          echo '<script>alert("fill amount")</script>';
        }
        else
        if(empty($dis))
        {
          echo '<script>alert("fill description")</script>';
        }
        else
        if(!empty($amt) AND !empty($dis))
        {
          $i="INSERT INTO daily (amount,discription,dates) VALUES('$amt','$dis','$d')";
          $conn->exec($i);
          echo '<script>alert("inserted")</script>';
        }
        
    }
    catch(PDOException $e){
        echo "failed".$e->getMessage();
    }
    
?>
<?php

?>

</body>
</html>
