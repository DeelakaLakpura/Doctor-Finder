<?php 
session_start();
$main = $_SESSION['username'];
include 'db_connect.php';
            ?>
<!DOCTYPE html>
<html lang="en">
<?php

include 'header.php';

?>

<body>
    <div class="d-flex" id="wrapper">
     
       
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                  
                    <h2 class="fs-2 m-0">Doctor | Dashboard</h2>
</div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <p class="fs-5">Your Email</p>
                            <p align="left" style="width:10%; text-align: left;   max-lines: 2;"><?php echo $main ?></p>
                                
                            </div>
                            <i
                                class="fas fa-at fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    

                </div>
             
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">List of patients</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Symptoms</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php      
                             $sql = "SELECT id,PName,PAge,PNumber,PNumber,PSymptoms,DEmail FROM Tbl_Patients WHERE Demail = '$main'";
                             $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                             $record =mysqli_fetch_assoc($resultset) ;   
            while 
              # code...
            ( $record = mysqli_fetch_assoc($resultset)) {
            ?>
                             <tr>
                              <th scope="row"><?php echo $record['id']; ?></th>
                                    <td><?php echo $record['PName']; ?></td>
                                    <td><?php echo $record['PAge']; ?></td>
                                    <td><?php echo $record['PNumber']; ?></td>
                                    <td><?php echo $record['PSymptoms']; ?></td>
                                </tr>
                                <?php } ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>