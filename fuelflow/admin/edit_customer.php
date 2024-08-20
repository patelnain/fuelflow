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
            <h5>Edit Customer</h5>
        </div>

        <div class="col-md-7  align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Customer</li>
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


                                <form id="add_brand" method="POST" action="app/customer_crud.php">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM `customer` WHERE id='" . $_POST['id'] . "' ");
                                    $stmt->execute();
                                    $record = $stmt->fetchAll();

                                    foreach ($record as $key) {
                                    ?>

                                        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id']; ?>">
                                        <div class="form-group">
                                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="brandName" placeholder="customer Name" value="<?php echo $key['brandName'] ?>" name="brandName">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="customerEmail" placeholder="customer Email" value="<?php echo $key['customerEmail'] ?>" name="customerEmail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                                <label class="col-sm-3 control-label">Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" class="form-control" id="customerPhone" placeholder="customer Phone" value="<?php echo $key['customerPhone'] ?>" name="customerPhone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="customerAddress" placeholder="customer Address" name="customerAddress"> <?php echo $key['customerAddress'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                                <label class="col-sm-3 control-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="brandStatus" name="brandStatus">
                                                        <option value="">~~SELECT~~</option>
                                                        <option value="Active" <?php if ($key['brandStatus'] == 'Active') echo 'selected="selected"'; ?>>Active</option>
                                                        <option value="Inactive" <?php if ($key['brandStatus'] == 'Inactive') echo 'selected="selected"'; ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary" type="submit" name="update" onclick="validatecustomer()">Submit</button>
                                        </div>

                                    <?php } ?>
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
    function validatecustomer() {
        // Custom method to check if the input contains only spaces
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
                brandName: {
                    required: true,
                    noSpacesOnly: true,
                    lettersonly: true
                },
                customerEmail: {
                    required: true,
                    email: true
                },
                customerPhone: {
                    required: true,
                    noSpacesOnly: true,
                    digits: true,
                    maxlength: 10,
                    minlength: 10
                },
                customerAddress: {
                    required: true,
                    noSpacesOnly: true
                },
                brandStatus: {
                    required: true
                }
            },
            messages: {
                brandName: {
                    required: "Please enter a brand name",
                    lettersonly: "Only alphabet characters are allowed"
                },
                customerEmail: {
                    required: "Please enter a customer email",
                    email: "Please enter a valid email address"
                },
                customerPhone: {
                    required: "Please enter a customer phone number",
                    noDigits: "customer phone number should not contain digits"
                },
                customerAddress: {
                    required: "Please enter a customer address"
                },
                brandStatus: {
                    required: "Please select a brand status"
                }
            }
        });
    }
</script>