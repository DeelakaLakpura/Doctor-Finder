<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="doctor.png" type="image/x-icon">
    <link rel="stylesheet" href="css/email.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    
    <title>Book Now</title>
</head>
<body>
<div class="header">
  <img src="doctor.png" width="40px" alt="" align="left">
  <a href="index.php" class="logo">MY DOC</a>
  
</div>
<?php
include 'db_connect.php';
            
            if(isset($_POST['btnEmail']))
            {
                $id = $_POST ['txtid'];
            $sql = "SELECT DEmail, HLocation,DName FROM Tbl_Doctors WHERE id = $id ";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            $record =mysqli_fetch_assoc($resultset) ;
            ?>
           
                  <?php $d =  $record['DEmail']; ?>
                  <?php $n =  $record['DName']; ?>
            <?php         
            while( $record = mysqli_fetch_assoc($resultset) ) {
            
            }
          }
            ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo 'Make an Appoitment' ?></h5>
                    <p style="text-align: center; padding:5px;"> You can now easily contact this doctor. The doctor will reply to your message promptly. Wait until then. Check your email account. Thank You!</p>

                    <form action="index.php"  method="POST" class="form-signin">
                        <div class="form-label-group">
                            <input style="visibility: hidden;" type="text" name="fromEmail" id="fromEmail" class="form-control"  value="<?php echo $d; ?>"   readonly required autofocus>
                         </div> 
                         <label for="inputPassword">Your Name<span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="subject" name="name" class="form-control" placeholder="Enter Your Name" required>
                        </div><br/>
                        <label for="inputPassword">Your symptoms<span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="subject" name="symptoms" class="form-control" placeholder="Enter Your Symptoms" required>
                        </div><br/>
                        <label for="inputPassword">Your Age <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                        <input type="text" id="subject" name="Age" class="form-control" placeholder="Enter Your Age" required>
                        </div> <br/>
                        <label for="inputPassword">Your Phone Number <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                        <input type="text" id="subject" name="Number" class="form-control" placeholder="Enter Your Phone Number" required>
                        </div> <br/>
                        <label for="inputPassword">Your Address <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <textarea  id="message" name="Address" class="form-control" placeholder="Enter Your Address" required ></textarea>
                        </div> <br/>
                        <button type="submit" name="sendMailBtn" class="BtnMail" >Send Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer style="font-family: 'poppins';">
        <div class="footer-bottom">
            <p align="center">copyright &copy;2022 MY DOC. designed by <span>deelaka</span></p>
        </div>
    </footer>
</body>
</html>