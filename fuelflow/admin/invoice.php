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

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Thermal Print</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 10px;
            }

            .container {
                max-width: 300px;
                /* Adjust as per your thermal paper width */
                margin: auto;
            }

            .header img {
                width: 100px;
                /* Adjust logo size */
            }

            .header h3 {
                font-size: 14px;
                text-align: center;
            }

            .address {
                font-size: 10px;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                font-size: 10px;
            }

            .table th,
            .table td {
                border: 1px solid #000;
                padding: 3px;
            }

            .table th {
                text-align: center;
                background-color: #f2f2f2;
            }

            .table td {
                text-align: left;
            }

            .total {
                text-align: right;
            }

            .footer {
                font-size: 10px;
                text-align: center;
            }

            .buttons {
                text-align: center;
                margin-top: 10px;
            }

            .buttons input {
                font-size: 10px;
                padding: 5px 10px;
                margin-right: 5px;
            }

            @media print {
                .buttons {
                    display: none;
                }

                .container {
                    max-width: 250px;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <?php
                $stmt2 = $conn->prepare("SELECT * FROM `manage_web` ");
                $stmt2->execute();
                $record2 = $stmt2->fetchAll();
                foreach ($record2 as $key2) { ?>
                    <img src="../assets/images/<?php echo $key2['photo1'] ?>" alt="Logo">
                <?php } ?>

                <h3><?php echo $key['inv_no'] ?></h3>
            </div>
            <div class="address">
                <p><strong>From:</strong> <?php echo $result['username'] ?><br>Email: <?php echo $result['email'] ?><br>Phone: <?php echo $result['mobileno'] ?></p>
                <p><strong>To:</strong> <?php
                                        $stmt2 = $conn->prepare("SELECT * FROM `customer` WHERE delete_status='0' AND id=? ");
                                        $stmt2->execute([$key['customer_id']]);
                                        $record2 = $stmt2->fetch();
                                        echo $record2['brandName'];
                                        ?><br><?php echo $key['customerAddress'] ?><br>Email: <?php echo $key['customerEmail'] ?><br>Phone: <?php echo $key['customerPhone'] ?></p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fuel</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
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
                            <td><?php echo $i; ?></td>
                            <td><?php
                                $stmt3 = $conn->prepare("SELECT * FROM `fuel_tbl` where delete_status='0' AND id=? ");
                                $stmt3->execute([$key2['product_id']]);
                                $record3 = $stmt3->fetch();
                                echo $record3['fuelName'];
                                ?></td>
                            <td><?php echo $key2['quantity'] ?></td>
                            <td><?php echo $key2['rate'] ?></td>
                            <td><?php echo $key2['total'] ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
            <div class="total">
                <p><strong>Subtotal:</strong> <?php echo $key['subtotal'] ?></p>
                <p><strong>Discount (0%):</strong> <?php echo $key['discount'] ?></p>
                <p><strong>GST (0%):</strong> <?php echo $key['gst_rate'] ?></p>
                <p><strong>Final Total:</strong> <?php echo $key['final_total'] ?></p>
            </div>
            <div class="footer">
                <p>Thank you for your business!</p>
            </div>
            <div class="buttons">
                <input type="button" value="Print Invoice" onclick="window.print();">
                <!-- Note: You may not need "Go Back" button for thermal printing -->
            </div>
        </div>
    </body>

    </html>

<?php } ?>