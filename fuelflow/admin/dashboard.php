

<?php
session_start();
include "../assets/constant/config.php";



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
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item active"></li>
                  </ol>
               </div>
               <h4 class="page-title">Dashboard</h4>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
      <!-- end page title end breadcrumb -->
      <div class="row dashboard">
         <div class="col-md-6">
            <div class="card bg-success">
               <div class="card-body py-4">
                  <div class="d-flex flex-row p-3">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-gas-pump"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from fuel_tbl WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Fuels</p>
                        </div>
                     </div>
                  </div>
               </div>



               <!--end card-body-->
            </div>
            <!--end card-->
         </div>


         <div class="col-md-6">
            <div class="card bg-primary">
               <div class="card-body py-4">
                  <div class="d-flex flex-row p-3">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fas fa-truck-arrow-right"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from supplier WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Supplier</p>
                        </div>
                     </div>
                  </div>
               </div>



               <!--end card-body-->
            </div>
            <!--end card-->
         </div>

         <div class="col-md-6">
            <div class="card bg-danger">
               <div class="card-body py-4">
                  <div class="d-flex flex-row p-3">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class=" fa fa-file"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from tbl_invoice WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Invoices</p>
                        </div>
                     </div>
                  </div>
               </div>



               <!--end card-body-->
            </div>
            <!--end card-->
         </div>


         <div class="col-md-6">
            <div class="card bg-secondary">
               <div class="card-body py-4">
                  <div class="d-flex flex-row p-3">
                     <div class="col-3 align-self-center">
                        <div class="round">
                           <i class="fa fa-user"></i>
                        </div>
                     </div>
                     <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                           <h3 class="mt-0 text-white">
                              <?php
                              $stmt = $conn->prepare("SELECT count(*) as cnt_name from customer WHERE delete_status='0' ");
                              $stmt->execute();
                              $record = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                              <?PHP echo $record['cnt_name'];
                              $name = $record['cnt_name']; ?>
                           </h3>
                           <p class="mb-0 text-white">Total Customers</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <!--end card-->
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
</div>
<!--end row-->

<span style="color:red;"><center><strong>For any paid support, Academic Project Development OR Commercial Project Development Contact <span style="color: blue"><a href="https://mayurik.com" target="_blank">Mayuri K.</a></span>, on email mayuri.infospace@gmail.com </strong></center>
</span> 
<div class="chart">
   <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
      <div class="col-sm-4">
         <!-- Content for the first column -->
         <div id="piechart" style="width: 500px; height: 500px;"></div>
      </div>

     
      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
           <h3>Today's Billing</h3>
<br>
            <div class="table-responsive">

              <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Build Date</th>
                    <th>Invoice No.</th>
                    <th>Customer No.</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Total</th>
                    
                  </tr>
                </thead>
                <tbody>


                  <?php
                  $sql = "SELECT * FROM tbl_invoice where delete_status='0' order by id desc";


                  $statement = $conn->prepare($sql);
                  $statement->execute();
                  $i = 1;

                  while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {

                  ?>

                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $item['build_date']; ?></td>
                      <td><?= $item['inv_no']; ?></td>
                      <td><?= $item['customerPhone']; ?></td>
                      <td><?php
                          $stmt2 = $conn->prepare("SELECT * FROM `customer` WHERE delete_status='0' AND id=? ");
                          $stmt2->execute([$item['customer_id']]);
                          $record2 = $stmt2->fetch();
                          echo $record2['brandName'];
                          ?></td>
                      <td><?= $item['customerEmail']; ?></td>
                      <td><?= $item['customerAddress']; ?></td>
                      <td><?= $item['final_total']; ?></td>
                   
                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>
            </div><!--end /tableresponsive-->
          </div><!--end card-body-->
        </div><!--end card-->
      </div><!--end col-->
    
   </div>
</div>



</div>
<!-- Page content Wrapper -->
</div>
<!-- content -->
<?php include('include/footer.php'); ?>