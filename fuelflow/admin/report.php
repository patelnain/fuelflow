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
//print_r($SID);exit;
//echo"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'";exit;
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
<h4 class="page-title">Report</h4>
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
<form class=" row"  method="POST" >



<div class="form-group col-md-6">
<label class="control-label">To Date</label>
<input class="form-control" type="date" name="email" required="" placeholder="" value="">
</div>
<div class="form-group col-md-6">
<label class="control-label">Form Date</label>
<input class="form-control" type="date" name="username" required="" placeholder="" value="" pattern="" />
</div>
</form>

<div class="form-group col-md-6">
<button class="btn btn-primary" type="submit" name="update">Update</button>
</div>


</div><!--end card-body-->
</div><!--end card-->
</div><!--end col-->
</div>

<div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">

<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
<thead>
<tr>
<th>Serial</th>
<th>Date and Time</th>
<th>Duration</th>
<th>Requests</th>
<th>Payment</th>
<th>Confirmation</th>
<th >Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>12-10-2023 19:24</td>
<td>2 year</td>
<td>need a help</td>
<td>pay</td>
<td>yes</td>
<td> <a href="edit_client.php?id=<?php echo $key['id']?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i>

</a>

<a href="app/client.php?id=<?php echo $key['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
<i class="fa fa-trash-alt" aria-hidden="true"></i>
</a>
</td>    

</tr>

</tbody>


</table>
</div>
</div>
</div>
</div>
</div>


</div><!--end row-->

</div> <!-- Page content Wrapper -->

</div>
<?php } ?> <!-- content -->

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->

