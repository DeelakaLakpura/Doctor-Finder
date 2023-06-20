<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Doctor</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="doctor.png" type="image/x-icon">
  
   </head>
   
<body>
  
</div>
  <div class="wrapper">
    <h2>Login | Doctor</h2>
    <form method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name="txtdocemail">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter your password" required name="txtpassword">
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login Now" name="btnAdd">
        <a href="/doctor/index.php" style="color: #52b69a; display:flex;   justify-content:center; text-decoration:none;margin-top:10px;">Home Page</a>
      </div>
    </form>
  </div>
  <?php

include 'db_connect.php';
$email= $_POST['txtdocemail'];
$password= $_POST['txtpassword'];


if(isset($_POST['btnAdd']))
{
$sql = "select * from Tbl_Doctors where DEmail = '$email' and DPass = '$password'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
  $_SESSION['username'] = $email;
   echo "<script>alert('Login successfull!');</script>";
   header("Location:/doctor/docdash.php");
    
}  
else{  
    echo "<script>alert('Login Not successfull!');</script>";
}     


}
?>

</body>
</html>
