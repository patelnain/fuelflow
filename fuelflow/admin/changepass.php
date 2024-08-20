<?php 
session_start();
 include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>

                 
<?php include('include/sidebar.php');?>
                    <!-- Top Bar End -->
<?php include('include/header.php');?>
<?php
   $SID=$_SESSION['id'];
           $stmt = $conn->prepare("SELECT * FROM `login` WHERE id='".$_SESSION['id']."'");
                   //print_r($stmt); exit;
                       $stmt->execute();
                        $record=$stmt->fetchAll();
                        foreach ($record as $key) { 
                          //print_r($key); exit;?>
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
                                        <h4 class="page-title">Change Password</h4>
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
                                        <form class=" row" action="app/changepass_crud.php" method="POST">
                                             <input type="hidden" name="id" value="<?php echo $key['id'];?>">

                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Old Password</label>
                                                        <input class="form-control" type="Password" name="oldpassword" required="" placeholder="Old Password">                            </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">New Password</label>
                                                    <input class="form-control" type="password" name="newpassword" id="newpassword" required="" placeholder="New Password" pattern=".{8,}" title="Password must be at least 8 characters long">
                                                    <span id="password-strength"></span>
                                                </div>


                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Confirm Password</label>
                                                        <input class="form-control" type="Password" name="confirmpassword" required="" placeholder="confirm Password" pattern=".{8,}" title="Password must be at least 8 characters long">
                                                </div>




                                                <div class="form-group col-md-12">
                                                 
                                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                                   
                                                </div>
                                        </form>
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div><!--end col-->

                                  
                                    </div><!--end row-->

                            

                            
                            
                        
                               

                                    

                   

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->
            <?php } ?>

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->
