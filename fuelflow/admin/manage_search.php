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
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <a href="add-search.php" class="btn btn-primary mb-3">Add New</a>
                    </div>
                    <h4 class="page-title">Search</h4>
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
                        <div class="table-responsive">

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Location</th>
                                        <th>Date and Time</th>
                                        <th>Price</th>
                                        <th>Rating</th>
                                        <th>Availability</th>
                                        <th>Services Required</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>nashik</td>
                                        <td>11-10-2023 12:10</td>
                                        <td>1000</td>
                                        <td>10</td>
                                        <td>11-10-2023 12:10</td>
                                        <td>yes</td>
                                        <td> <a href="edit_search.php?id=<?php echo $key['id'] ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i>

                                            </a>



                                            <a href="app/client.php?id=<?php echo $key['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                            </a>
                                        </td>

                                    </tr>

                                </tbody>


                            </table>

                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


        </div><!--end row-->
    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

<?php include('include/footer.php'); ?>

<?php if (!empty($_SESSION['success'])) { ?>
    <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Data Added Successfully",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "manage_profile.php";
            }, 1000);
        });
    </script>
    <p><?php $_SESSION['success'] = '';
    } ?></p>


    <?php if (!empty($_SESSION['update'])) { ?>
        <script>
            setTimeout(function() {
                swal({
                    title: "Congratulaions!",
                    text: "Record Updated",
                    type: "success",
                    confirmButtonText: "Ok"
                }, function() {
                    window.location = "manage_profile.php";
                }, 1000);
            });
        </script>
        <p><?php $_SESSION['update'] = '';
        } ?></p>

        <?php if (!empty($_SESSION['delete'])) { ?>
            <script>
                setTimeout(function() {
                    swal({
                        title: "Congratulaions!",
                        text: "Record Deleted",
                        type: "success",
                        confirmButtonText: "Ok"
                    }, function() {
                        window.location = "manage_profile.php";
                    }, 1000);
                });
            </script>
            <p><?php $_SESSION['delete'] = '';
            } ?></p>