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
                                        <h4 class="page-title">Edit Registration</h4>
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
            
                                           
                                            
                                            <div class="tab-content">

                                                <div class="tab-pane active p-3" id="home" role="tabpanel">
                                            <form name="myform"  class="row" >

  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">


                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">First Name*</label>
                                                        <input class="form-control" type="text" name="heading" value="<?php echo $key['heading']?>" required=""  >
                                                </div>

                                              


                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Last Name*</label>
                                                        
                                                        <input class="form-control" type="text" name="heading" value="<?php echo $key['heading']?>" required="">
                                                </div>


                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Email Address*</label>
                                                        <input class="form-control" type="text" name="content" required="<?php echo $key['heading']?>" ></input>
                                                </div>

                                                 

                                                 <div class="form-group col-md-6">
                                                     <label class="control-label">Password</label>
                                                     <input class="form-control" type="Password"  value="" name="">
                                                       
                                                    </div> 

                                                <div class="form-group col-md-6">
                                                <label class="control-label">Phone Number</label>
                                              <input class="form-control" type="number" name=""  >
                                                  </div>

                                                 <div class="form-group col-md-6">
                                                     <label class="control-label">Address</label>
                                                     <input class="form-control" type="text"  value="" name="">
                                                       
                                                    </div>

                                                 <div class="form-group col-md-6">
                                                   <label class="control-label">Profile Picture*</label>
                                                        <input class="form-control" type="file" name="" >
                                                 </div>

                                                <div class="form-group col-md-12">
                                                 
                                                        <button class="btn btn-primary" type="submit" name="update" onclick="editService()">Update</button>
                                                   
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

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->


<script type="text/javascript">
  function editService(){
     jQuery.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^(?=.*[a-zA-Z])[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
  }, "Please enter alphabet characters only");
     
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  // Check if the value is empty
  if (value.trim() === "") {
    return false;
  }
  return /^[a-zA-Z\s]*$/.test(value);
}, "Please enter alphabet characters only");
  $('#edit_service').validate({
      rules: {
        heading: {
          required: true,
          lettersonly: true
        },
        slug: {
          required: true  
        },
        shortcontent: {
          required: true
        },
        content: {
          required: true
        },
        metatitle: {
          required: true
        },
         metadescription: {
          required: true
        }, 
        keywords:{
            required:true
        },
        robots:{
         required:true
        }
      },
      messages: {
        heading: {
          required: "Please enter a heading",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        slug: {
          required: "Please enter a slug",
        },
        shortcontent: {
          required: "Please enter a short content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        content: {
          required: "Please enter a content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        metatitle: {
          required: "Please enter a metatitle",
        },
        metadescription: {
          required: "Please enter a metadescription",
         },
          keywords:{
            required:"Please enter a keywords"
        },
        robots:{
         required:"Please enter a robots"
        }
         
        }
  });
};
</script>