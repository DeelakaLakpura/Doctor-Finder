<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Doctor</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="doctor.png" type="image/x-icon">
    <script src="js/sweetalert.min.js"></script>
  
   </head>
   
<body>
  
</div>
  <div class="wrapper">
    <h2>Add New | Doctor</h2>
    <form method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name="txtdocname" style="text-transform: uppercase; ">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name="txtdocemail">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your hospital type" required name="txthospital" style="text-transform: uppercase;">
      </div>
      <select name="title"  style="width: 100%; height:50px; border: 1.5px solid #C7BEBE;   border-radius: 6px; border-bottom-width: 2.5px; transition: all 0.3s ease;  font-weight: 400;  padding: 0 15px;  font-size: 17px;color: #707070;">
                                    <option value="">The type of disease you are treating</option>
                                    <option value="Family physician">Family physician</option>
                                    <option value="Psychiatrist">Psychiatrist</option>
                                    <option value="Obstetrician and gynecologist">Obstetricians and gynecologist</option>
                                    <option value="Neurologist">Neurologist</option>
                                    <option value="Radiologist">Radiologist</option>
                                    <option value="Anesthesiologist">Anesthesiologist</option>
                                    <option value="Consultant V.O.G">Consultant V.O.G</option>
                                </select>
                                <div class="input-box">
                                <select name="gender"  style="width: 100%; height:50px; border: 1.5px solid #C7BEBE;   border-radius: 6px; border-bottom-width: 2.5px; transition: all 0.3s ease;  font-weight: 400;  padding: 0 15px;  font-size: 17px;color: #707070;">
                                    <option value="">--Select Gender--</option>
                                    <option value="https://firebasestorage.googleapis.com/v0/b/lms-02-7f92a.appspot.com/o/bruno-rodrigues-279xIHymPYY-unsplash-removebg-preview%20(1).png?alt=media&token=2fdcfe2b-5cc0-4b93-8184-e78aff31507e">Male</option>
                                    <option value="https://firebasestorage.googleapis.com/v0/b/lms-02-7f92a.appspot.com/o/bruno-rodrigues-279xIHymPYY-unsplash-removebg-preview%20(2).png?alt=media&token=6073c454-e24e-4b58-ba15-4d56b22a32f8">Female</option>
                                </select>
                                </div>
      <div class="input-box">
        <input type="text" placeholder="city where the hospital is located" required name="txtcity" style="text-transform: uppercase;">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter phone number" required name="txtphone">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create new password" required name="txtpass">
      </div>
      <div class="input-box button">
        <input type="Submit" value="Add Now" name="btnAdd">
        <a href="/doctor/index.php" style="color: #52b69a; display:flex;   justify-content:center; text-decoration:none;margin-top:10px;">Find Doctors</a>
      </div>
    </form>
  </div>
  <?php

include 'db_connect.php';
$Dname= $_POST['txtdocname'];
$Dhospital= $_POST['txthospital'];
$Dcity= $_POST['txtcity'];
$Dphone= $_POST['txtphone'];
$Dlink= $_POST['gender'];
$type = $_POST['title'];
$docemail = $_POST['txtdocemail'];
$docpass = $_POST['txtpass'];



if(isset($_POST['btnAdd']))

{


  $sql = "INSERT INTO Tbl_Doctors (DName,Dhospital,HLocation,DPhone,image,DType,DEmail,DPass) VALUES ('Dr. $Dname','$Dhospital','$Dcity','$Dphone','$Dlink','$type','$docemail','$docpass')";

  if(mysqli_query($conn, $sql))
  {
    echo '<script>
    
    swal({
      title: "Success!",
      text: "Doctor insterted Sucessfullly!",
      icon: "success",
      button: "ok!",
    });
    
    </script>';
  }else
  {
    echo '<script>
    
    swal({
      title: "Oops",
      text: "Doctor insterted not Sucessfullly!",
      icon: "error",
      button: "ok!",
    });
    
    </script>';
  }


}


  ?>

</body>
</html>
