
<?php
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
 //$conn = new PDO("mysql:host=$servername;dbname=face", $username, $password);
   // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $fname = $_POST['notes'];
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=face", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    //VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    //$conn->exec($sql);
  $myfile = fopen("id.txt", "r") or die("Unable to open file!");
$iddd=fgets($myfile);
fclose($myfile);


$iddd+=1;
$myfile = fopen("id.txt", "w") or die("Unable to open file!");

fwrite($myfile, $iddd);
fclose($myfile);



 $myfile = fopen("mob.txt", "r") or die("Unable to open file!");
$mob=fgets($myfile);
fclose($myfile);






     $stmt = $conn->prepare("INSERT INTO data(id,NOTES,MOBILENUMBER) VALUES (:firstname,:surname,:mobilenumber)");  
    $stmt->bindParam("firstname", $iddd,PDO::PARAM_INT) ;
    $stmt->bindParam("surname", $fname,PDO::PARAM_STR) ;
    $stmt->bindParam("mobilenumber", $mob,PDO::PARAM_STR) ;

 $stmt->execute();



    }
catch(PDOException $e)
    {
    echo $stmt . "<br>" . $e->getMessage();
    }

}
header("Location: log.php");
        ob_end_flush();

   ?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="5.css">
</head>
<body>
<script type="text/javascript">
         <!--
            function Redirect() {
              window.history.back();
               location.reload();
            }
         //-->
         
      </script> 

<div class="cover"> 
<div class="tx">YOUR NOTES HAS BEEN CREATED!!!YOU CAN NOW LOGIN AND SEE YOUR NOTES WHICH WILL BE SAVED BY US AND IS SAFE.</div>
<div class="tx1"><input type="submit" name="tf" value="YEP!!!" onclick="Redirect();"></div>

</body>
</html>
