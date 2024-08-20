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
                                        <h4 class="page-title">Edit product</h4>
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
                                            <form name="myform" action="app/product.php" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="edit_service">

                                                <?php 
                                                  $stmt=$conn->prepare("SELECT * FROM `product` WHERE id='".$_GET['id']."' ");
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">


                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">Heading*</label>
                                                        <input class="form-control" type="text" name="heading" value="<?php echo $key['heading']?>" required="" pattern="^[a-z A-Z 0-9 ]+$" / >
                                                </div>

                                             


                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Short Content*</label>
                                                        <textarea class="form-control" type="text" name="shortcontent"  required="" pattern="^[a-z A-Z 0-9 ]+$" / ><?php echo $key['shortcontent']?></textarea> 
                                                </div>


                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Content*</label>
                                                        <textarea class="form-control" type="text" name="content" required="" pattern="^[a-z A-Z 0-9 ]+$"  id="ckeditor"><?php echo $key['content']?>"</textarea>
                                                </div>

                                                 

                                                 <div class="form-group col-md-6">
                                                     <label class="control-label">Existing Photo</label><br>
                                                     <input type="hidden"  value="<?php echo $key['photo']?>" name="old_photo_img">
                                                       <img class="img-fluid" src="../assets/images/<?php echo $key['photo']?>" style="width:100px;height:auto;"><br>
                                                    </div> 

                                                        <div class="form-group col-md-6">
                                                        <label class="control-label">Change Photo</label>
                                                        <input class="form-control" type="file" name="photo" accept=".jpeg,.png,.jpg" >
                                                        
                                                        
                                                                </div>

                                                 <div class="form-group col-md-6">
                                                     <label class="control-label">Existing Banner</label><br>
                                                     <input type="hidden"  value="<?php echo $key['banner']?>" name="old_banner_img">
                                                       <img class="img-fluid" src="../assets/images/<?php echo $key['banner']?>" style="width:100px;height:auto;"><br>
                                                    </div>

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">Change Banner*</label>
                                                        <input class="form-control" type="file" name="banner" accept=".jpeg,.png,.jpg">
                                                 </div>

                                                 <div class="col-md-12" >
                                                <h6 class="p-2 seo-info" style="background-color: lightgrey;">SEO Information</h6>
                                            </div>

                                                  <div class="form-group col-md-6">
                                                        <label class="control-label">Meta Title</label>
                                                        <input class="form-control" type="text" name="metatitle" value="<?php echo $key['metatitle']?>"pattern="^[a-z A-Z 0-9 ]+$" />
                                                </div>

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">Meta Description</label>
                                                        <textarea class="form-control" type="text" name="metadescription" pattern="^[a-z A-Z 0-9 ]+$" /><?php echo $key['metadescription']?></textarea>
                                                </div>

                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Meta keywords</label>
                                                        <textarea class="form-control" type="text" name="keywords" pattern="^[a-z A-Z 0-9 ]+$" /><?php echo $key['keywords']?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                        <label class="control-label">Meta robots</label>
                                                        <textarea class="form-control" type="text" name="robots" pattern="^[a-z A-Z 0-9 ]+$" /><?php echo $key['robots']?></textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                 
                                                        <button class="btn btn-primary" type="submit" name="update" onclick="editService()">Update</button>
                                                   
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

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->

<script>
    function validation() {
        var fileInput = document.getElementById('edit_service').photo;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
<script>
    function validation() {
        var fileInput = document.getElementById('edit_service').banner;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
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
        },
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
         c
        }
  });
};
</script>