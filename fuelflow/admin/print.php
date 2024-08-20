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

<?php


$stmt = $conn->prepare("SELECT * FROM login WHERE id='1'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php
$sql = "SELECT * FROM tbl_invoice where  id='" . $_POST['id'] . "'";


$statement = $conn->prepare($sql);
$statement->execute();
$record = $statement->fetchAll();
foreach ($record as $key) {


?>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <div class="">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content" style="background-color: #ffffff;">
                <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <?php
                                $stmt2 = $conn->prepare("SELECT * FROM `manage_web` ");
                                $stmt2->execute();
                                $record2 = $stmt2->fetchAll();
                                foreach ($record2 as $key2) { ?>
                                    <div class="float-left">
                                        <img src="../assets/images/<?php echo $key2['photo1'] ?>" class="img-responsive" style="width: 300px;">
                                    </div>
                                <?php } ?>
                                <div class="mr-5 text-center">
                                    <h3>Invoice</h3>
                                </div>
                                <div class="float-right">
                                    <h3 class="mb-0"><?php echo $key['inv_no'] ?></h3>
                                    Date: <?php echo $key['created_date'] ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">From:</h5>
                                        <h3 class="text-dark mb-1"><?php echo $result['username'] ?></h3>

                                        <div></div>
                                        <div>Email: <?php echo $result['email'] ?></div>
                                        <div>Phone: <?php echo $result['mobileno'] ?></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">To:</h5>
                                        <h3 class="text-dark mb-1"><?php
                                                                    $stmt2 = $conn->prepare("SELECT * FROM `customer` WHERE delete_status='0' AND id=? ");
                                                                    $stmt2->execute([$key['customer_id']]);
                                                                    $record2 = $stmt2->fetch();
                                                                    echo $record2['brandName'];
                                                                    ?></h3>
                                        <div><?php echo $key['customerAddress'] ?></div>
                                        <div>Email: <?php echo $key['customerEmail'] ?></div>
                                        <div>Phone: <?php echo $key['customerPhone'] ?></div>
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Fuel</th>
                                                <th>Quantity</th>
                                                <th class="right">Rate </th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt2 = $conn->prepare("SELECT * FROM `quot_inv_items` where delete_status='0' AND inv_id=? ");
                                            $stmt2->execute([$_POST['id']]);
                                            $record2 = $stmt2->fetchAll();
                                            $i = 1;
                                            foreach ($record2 as $key2) { ?>
                                                <tr>
                                                    <td class="center"><?php echo $i; ?></td>
                                                    <td class="left strong"><?php
                                                                            $stmt3 = $conn->prepare("SELECT * FROM `fuel_tbl` where delete_status='0' AND id=? ");
                                                                            $stmt3->execute([$key2['product_id']]);
                                                                            $record3 = $stmt3->fetch();
                                                                            echo $record3['fuelName'];
                                                                            ?></td>
                                                    <td class="right"><?php echo $key2['quantity'] ?></td>
                                                    <td class="center"><?php echo $key2['rate'] ?></td>
                                                    <td class="right"><?php echo $key2['total'] ?></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                    <div class="col-lg-4 col-sm-5">
                                    </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Subtotal</strong>
                                                    </td>
                                                    <td class="right"><?php echo $key['subtotal'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Discount (0%)</strong>
                                                    </td>
                                                    <td class="right"><?php echo $key['discount'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">GST (0%)</strong>
                                                    </td>
                                                    <td class="right"><?php echo $key['gst_rate'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Final Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong class="text-dark"><?php echo $key['final_total'] ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0">Thank you for your business !</p>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input id="printbtn" type="button" value="Print Invoice" onclick="window.print();">
                            <input id="printbtn" type="button" value="Go Back" onclick="goBack()">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>


<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>