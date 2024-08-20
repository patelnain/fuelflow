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



    <div class="row tittle">

        <div class="top col-md-5 align-self-center">
            <h5>Add Categories Management</h5>
        </div>

        <div class="col-md-7  align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Categories</li>
            </ol>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">

                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                <form name="myform" method="POST" id="add_brand" action="app/category_crud.php">

                                    <div class="form-group">
                                        <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                            <label class="col-sm-3 control-label">Categories Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" placeholder="Categories Name" name="name">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">

                                        <button class="btn btn-primary" type="submit" name="submit" onclick="validateSupplier()">Submit</button>

                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->

<?php include('include/footer.php'); ?>

<script>
    function validateSupplier() {
        // Custom method to check if the input contains only spaces
// Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com 

        $.validator.addMethod("noSpacesOnly", function(value, element) {
            return value.trim() !== '';
        }, "Please enter a non-empty value");

        // Custom method to check if the input contains only alphabet characters
        $.validator.addMethod("lettersonly", function(value, element) {
            return /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter alphabet characters only");

        // Custom method to check if the input contains only digits
        $.validator.addMethod("noDigits", function(value, element) {
            return !/\d/.test(value);
        }, "Please enter a value without digits");

        $('#add_brand').validate({
            rules: {
                name: {
                    required: true,
                    noSpacesOnly: true,
                    lettersonly: true
                }
            },
            messages: {
                name: {
                    required: "Please enter a category name",
                    lettersonly: "Only alphabet characters are allowed"
                }
            }
        });
    }
</script>