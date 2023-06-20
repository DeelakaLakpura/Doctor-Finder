<?php

include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Finder</title>
    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="shortcut icon" href="doctor.png" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <script src="js/sweetalert.min.js"></script>


</head>
<body>
<?php

include 'header.php';

?>

<div class="filter">
  <form action="filter.php" method="post">
  <br><br>

  <i align="center" style="color: #52b69a;  padding-top: 4px;" class='bx bxs-map bx-sm'></i>
  <input style="height: 25px; padding:2px; width:200px; border-color:#52b69a;  border-radius: 5px;  padding-left: 5px;  border: 1px solid #52b69a;" type="text" name="txtfilter" id=""  placeholder="Enter Location">

 <button type="submit" name="btnSearch">Search</button><br>
 </form>
</div>
<?php
            
            $sql = "SELECT DType,DName,Dphone,Dhospital,HLocation,id,image FROM Tbl_Doctors";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));          
            while( $record = mysqli_fetch_assoc($resultset) ) {
            ?>
<div class="a-box">
  <div class="img-container">
    <div class="img-inner">
      <div class="inner-skew">
        <img src="<?php echo $record['image']; ?>">
      </div>
    </div>
  </div>
  <form  method="post" action="profile.php">
  <div class="text-container" >
    <?php  $DocName = $record['DName']; ?>  
    <h3 name=""><?php echo $DocName; ?></h3>
    <h4> <b><?php  echo $DocName = $record['DType']; ?></b></h4>
    <h4><?php echo $record['Dphone']; ?></h4>
    <p><?php echo $record['Dhospital']; ?></p>
    <div>
   <b> <?php echo $record['HLocation']; ?></b>
  </div>
<br>
  <button name='btnEmail'   align="center" style="color: white; width:130px; border:none; background-color:#52b69a; padding: 6px; text-decoration:none;  border-radius: 5px;" >Book Now!</button>
  <input name="txtid" style="visibility:collapse; height:0px" value="<?php echo $record['id']; ?>" >
</div>
</div>
</form>
<?php

$wr = $_POST["txtid"]; } ?>
<?php
include 'db_connect.php';
if(isset($_POST['sendMailBtn']))
{

  $Demail = mysqli_real_escape_string($conn,$_POST['fromEmail']);
  $Pname = mysqli_real_escape_string($conn,$_POST['name']);
  $PAge= mysqli_real_escape_string($conn,$_POST['Age']);
  $PSyptoms= mysqli_real_escape_string($conn,$_POST['symptoms']);
  $PNumber= mysqli_real_escape_string($conn,$_POST['Number']);
  $PAddress = mysqli_real_escape_string($conn,$_POST['Address']);

    $sql = "INSERT INTO Tbl_Patients(PName,DEmail,PSymptoms,PAge,PNumber,PAddress) VALUES(' $Pname','$Demail','$PSyptoms','$PAge','$PNumber','  $PAddress')";
    if(mysqli_query($conn, $sql))
    {
      echo "
      
      <script>
swal({
  title: 'Good job!',
  text: 'Message Send Sucess!',
  icon: 'success',
  button: 'Ok',

  
});

      </script>";
    
    
    }
    else
    {
      echo "
      
      <script>
swal({
  title: 'Oopss!',
  text: 'Something Went Wrong!',
  icon: 'error',
  button: 'Ok!',
 
});

      </script>";
      
    }





}




?>
<footer style="font-family: 'poppins';">
        <div class="footer-bottom">
            <p>copyright &copy;2022 MY DOC. designed by <span>deelaka</span></p>
        </div>
    </footer>
    <?php
$_SESSION['name'] = $_POST['user_name'];
    ?>
   
</body>

</html>
