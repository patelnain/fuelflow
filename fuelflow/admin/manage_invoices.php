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
      <h5>View Order</h5>
    </div>

    <div class="col-md-7  align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">View Order</li>
      </ol>
    </div>
  </div>

  <div class="container-fluid">

    <!-- end page title end breadcrumb -->

    <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="btn-group float-left">
              <a href="add_invoices.php" class="btn btn-primary mb-3">Add Order</a>
            </div>

            <div class="table-responsive">

              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
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
                    <th>Action</th>
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
                      <td>
                        <center><a href='#' onclick="editForm(event, <?php echo $item['id'] ?>, 'print.php')" class="btn btn-info"><i class="fas fa-print"></i></a>
                          <a href='#' onclick="editForm(event, <?php echo $item['id'] ?>, 'invoice.php')" class="btn btn-warning"><i class="fas fa-print"></i></a>
                          <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?') && delForm(event, <?php echo $key['id']; ?>,'app/order_crud.php' );"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>

                        </center>
                      </td>

                    </tr>
                  <?php $i++;
                  } ?>
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
        window.location = "manage_invoices.php";
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
          window.location = "manage_invoices.php";
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
            window.location = "manage_invoices.php";
          }, 1000);
        });
      </script>
      <p><?php $_SESSION['delete'] = '';
        } ?></p>