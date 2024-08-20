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
                                        <h4 class="page-title">Settings</h4>
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
            
                                           
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Logo</a>
                                                </li>
                                               
                                           
                                             
                                                 <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Email Setting </a>
                                                </li>
                                               
                                            </ul>
            


                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                                            <form name="myform1" class="row" action="app/web_crud.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()" id="validate">
                                                  <?php 

                                        $stmt1=$conn->prepare("SELECT * FROM `manage_web` ");
                                          $stmt1->execute();
                                          $record1=$stmt1->fetchAll();

                                          foreach ($record1 as $key1) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key1['id'];?>">

                                                

                                                <div class="form-group col-md-6">
                                                     <label class="control-label">Existing Photo</label><br>
                                                     <input type="hidden"  value="<?php echo $key1['photo1']?>" name="old_photo1_img">
                                                       <img class="img-fluid" src="../assets/images/<?php echo $key1['photo1']?>" style="width:100px;height:auto;"><br>
                                                    </div> 

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">New Photo<span class="text-danger">(file size must be less than 500 x 700 pixel)</span></label>
                                                        <input class="form-control" type="file" id="photo1" name="photo1" value="<?php echo $key1['photo1']?>" accept=".png,.jpeg"  >

                                                 </div>

                                                    <div class="col-md-12" >
                                                <h6 class="p-2 seo-info" style="background-color: lightgrey;">Favicon</h6>
                                            </div>

                                             <div class="form-group col-md-6">
                                                        <label class="control-label">Title<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="title" value="<?php echo $key1['title']?>" required/ ><br><br>
                                                </div>

                                                  <div class="form-group col-md-6">
                                                     <label class="control-label">Existing Photo</label><br>
                                                     <input type="hidden"  value="<?php echo $key1['photos']?>" name="old_photos_img">
                                                       <img class="img-fluid" src="../assets/images/<?php echo $key1['photos']?>" style="width:100px;height:auto;"><br>
                                                    </div> 

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">New Photo <span class="text-danger">(file size must be less than 500 x 400 pixel)</span></label>
                                                        <input class="form-control" type="file" name="photos" id="photos" value="<?php echo $key1['photos']?>" accept=".png,.jpeg" >
                                                 </div>

                                                 <div class="col-md-12" >
                                                <h6 class="p-2 seo-info" style="background-color: lightgrey;">Google ReCaptcha</h6>
                                            </div>

                                             <div class="form-group col-md-6">
                                                        <label class="control-label">Site-key</label>
                                                        <input class="form-control" type="text" name="sitekey" value="<?php echo $key1['sitekey']?>" required>
                                                </div>

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">Secret-key</label>
                                                        <input class="form-control" type="text" name="secretkey" value="<?php echo $key1['secretkey']?>" required >
                                                </div>

                                                <div class="form-group col-md-12">
                                                  <button class="btn btn-primary" type="submit" name="update" >Update</button>
                                                   
                                                </div>
                                            <?php }?>
                                            </form>
                                              </div>
<script type="text/javascript">
    var img = document.forms['myform1']['photo1'];
    var validExt=["jpeg","png","jpg"];
    function validation() {
    if(img.value!=''){
    var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);
    var result=validExt.includes(img_ext);
       if(result==false){
        alert("Sorry, only JPEG, JPG & PNG  files are allowed.");
        return false;
    }
       }
}
</script>



                                             
<script type="text/javascript">

     var img = document.forms['myform2']['photo2'];
    var validExt=["jpeg","png"];
    function validation1() {
    if(img.value!=''){


       var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);

       var result=validExt.includes(img_ext);
       if(result==false){
        alert("Sorry, only JPEG & PNG  files are allowed.");
        return false;

       }
       
    }
}

</script>

                                               
                                               

                                                 <div class="tab-pane p-3" id="settings" role="tabpanel">
                                                    <form class="row" action="app/web_crud.php" method="POST">
                                                        <?php 
                                        $stmt4=$conn->prepare("SELECT * FROM `emailsetting` WHERE delete_status='0' ");
                                          $stmt4->execute();
                                          $record4=$stmt4->fetchAll();

                                          foreach ($record4 as $key4) { ?>
  
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $key4['id'];?>">

<div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Username</label>
                                                        <input class="form-control" type="text" name="username" value="<?php echo $key4['username']?>" / >
                                                </div>

                                                <div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Password</label>
                                                        <input class="form-control" type="password" name="password" value="<?php echo $key4['password']?>"  >
                                                </div>


                                               

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Host</label>
                                                        <input class="form-control" type="text" name="host" value="<?php echo $key4['host']?>">
                                                </div>
<label><span class="text-danger">On the SMTPSecure, if you use the Port 465 then it is ssl; if you use the Port 587 then it is tls</span></label>
                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Port</label>
                                                        <select class="form-control port" id="port" name="port">
                                                            <option value="465" data-enc="ssl">465</option>
                                                            <option value="587" data-enc="tls">587</option>
                                                        </select>
                                                        <!-- <input class="form-control" type="text" name="port" value="<?php echo $key4['port']?>" pattern="^[0-9 ]+$" /  > -->
                                                </div>

                                                 <div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Encryption</label>
                                                        <!-- <input  id="enc" class="form-control enc" type="text"  name="encryption" value="<?php echo $key4['encryption']?>" pattern="^[a-z A-Z ]+$" /> -->

                                                        <select class="form-control port" id="enc" name="encryption">
                                                            <option value="ssl" >ssl</option>
                                                            <option value="tls" >tls</option>
                                                        </select>
                                                </div>

                                  <script type="text/javascript">
 //$(function(){
$(document).ready(function(){

$(".port").change(function(){
var enc=$('.port').find(":selected").attr('data-enc');
$('.enc').val(enc);
});

});
</script>                
  

                                                  <div class="form-group col-md-6">
                                                        <label class="control-label">SMTP Email From</label>
                                                        <input class="form-control" type="text" name="email" value="<?php echo $key4['email']?>" >
                                                </div>




                                                <div class="form-group col-md-12">
                                                 
                                                        <button class="btn btn-primary" type="submit" name="update3">Update</button>
                                                   
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





<script type="text/javascript">

     var img = document.forms['myform1']['photo1'];
    var validExt=["jpeg","png"];
    function validation() {
    if(img.value!=''){


       var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);

       var result=validExt.includes(img_ext);
       if(result==false){
        alert("Sorry, only JPEG & PNG  files are allowed.");
        return false;

       }
       
    }
}



</script>


<!-------login background----->

<script type="text/javascript">

     var img = document.forms['myform2']['photo2'];
    var validExt=["jpeg","png"];
    function validation1() {
    if(img.value!=''){


       var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);

       var result=validExt.includes(img_ext);
       if(result==false){
        alert("Sorry, only JPEG & PNG  files are allowed.");
        return false;

       }
       
    }
}

</script>

<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->

 <?php if(!empty($_SESSION['update'])){?>
        <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Record Updated",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "web.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['update']='';}?></p>

        <?php if(!empty($_SESSION['delete'])){?>
        <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Record Deleted",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "web.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
 










