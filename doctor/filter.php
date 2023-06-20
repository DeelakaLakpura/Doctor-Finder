<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="shortcut icon" href="doctor.png" type="image/x-icon">
    
    <title>Document</title>
</head>
<body>
<div class="header">
  <img src="doctor.png" width="40px" alt="" align="left">
  <a href="index.php" class="logo">MY DOC</a>
  
</div>

<?php
include 'db_connect.php';
            $filterInput = $_POST['txtfilter'];
            if(isset($_POST['btnSearch']))
            {
            $sql = "SELECT DName,Dphone,Dhospital,HLocation,image,DType FROM Tbl_Doctors WHERE HLocation ='$filterInput'  ";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            $record =mysqli_fetch_assoc($resultset) ;
            ?>
            <p style="margin-right: 30px;" align="right">Filter Form: <?php echo $record['HLocation']; ?></p>
            <?php         
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

  <div class="text-container">
    <h3><?php echo $record['DName']; ?></h3>
    <h4> <b><?php  echo $DocName = $record['DType']; ?></b></h4>
    <h4><?php echo $record['Dphone']; ?></h4>
    <p><?php echo $record['Dhospital']; ?></p>
    <div class="txt">
   <b> <?php echo $record['HLocation']; ?></b>
  </div>
  <button name='btnEmail'   align="center" style="color: white; width:130px; border:none; background-color:#52b69a; padding: 6px; text-decoration:none;  border-radius: 5px;" >Book Now!</button>
</div>
</div>
<?php } 


}?>



<?php
include 'db_connect.php';
            $filter = $_POST['txtcat'];
            if(isset($_POST['btnCatSearch']))
            {
            $sql = "SELECT DName,Dphone,Dhospital,HLocation,image,DType FROM Tbl_Doctors WHERE DType ='$filter'  ";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            $record =mysqli_fetch_assoc($resultset) ;
            ?>
            <p style="margin-right: 30px;" align="right">Filter Form: <?php echo $record['DType']; ?></p>
            <?php         
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
  <form action="profile.php" method="post">
  <div class="text-container">
    <h3><?php echo $record['DName']; ?></h3>
    <h4> <b><?php  echo $DocName = $record['DType']; ?></b></h4>
    <h4><?php echo $record['Dphone']; ?></h4>
    <p><?php echo $record['Dhospital']; ?></p>
    <div class="txt">
   <b> <?php echo $record['HLocation']; ?></b>
  </div>
  <button name='btnEmail'   align="center" style="color: white; width:130px; border:none; background-color:#52b69a; padding: 6px; text-decoration:none;  border-radius: 5px;" >Book Now!</button>
</div>
</div>
            </form>
<?php } 
if(empty($resultset))
{
  echo "No Doctor Found";
}

}?>
<footer style="font-family: 'poppins';">
        <div class="footer-bottom">
            <p>copyright &copy;2022 MY DOC. designed by <span>deelaka</span></p>
        </div>
    </footer>
</body>
</html>