<?php
session_start();
include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php include('include/sidebar.php'); ?>
<!-- Top Bar End -->
<?php include('include/header.php'); ?>
<?php
$SID = $_SESSION['id'];
//print_r($SID);exit;
//echo"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'";exit;
$stmt = $conn->prepare("SELECT * FROM `login` WHERE id='" . $_SESSION['id'] . "'");
//print_r($stmt); exit;
$stmt->execute();
$record = $stmt->fetchAll();
foreach ($record as $key) {
    //print_r($key); exit;
?>
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">

                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class=" row" action="app/profile_crud.php" method="POST" enctype="multipart/form-data">



                                <div class="form-group col-md-6">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Email" value="<?php echo $key['email'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">User Name</label>
                                    <input class="form-control" type="text" name="username" required="" placeholder="Username" value="<?php echo $key['username'] ?>" pattern="^[a-zA-Z0-9 ]+$" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" required="" name="mobileno" value="<?php echo $key['mobileno'] ?>" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Existing Photo</label><br>
                                    <input type="hidden" value="<?php echo $key['image'] ?>" name="old_cat_img">
                                    <img class="img-fluid" src="../assets/images/<?php echo $key['image'] ?>" style="width:100px;height:auto;"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Image</label>
                                    <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png">


                                </div>


                                <div class="form-group col-md-6">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                </div>

                            </form>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->


            </div><!--end row-->












        </div> <!-- Page content Wrapper -->

    </div>
<?php } ?> <!-- content -->

<?php include('include/footer.php'); ?>