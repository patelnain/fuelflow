<link rel="stylesheet" href="../../assets/css/popup_style.css">

<?php
session_start();
include '../../assets/constant/config.php';

   // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {


        $stmt = $conn->prepare("INSERT INTO `tbl_invoice`(`build_date`, `customer_id`, `customerPhone`, `customerAddress`, `customerEmail`, `inv_no`, `discount`, `subtotal`, `final_total`, `created_date`, `gst_rate`) VALUES (:build_date,:customer_id,:customerPhone,:customerAddress,:customerEmail,:inv_no, :discount,:subtotal,:final_total,:created_date,:gst_rate)");
        $stmt->bindParam(':build_date', $_POST['build_date']);
        $stmt->bindParam(':customer_id', $_POST['customer_id']);
        $stmt->bindParam(':inv_no', $_POST['inv_no']);

        $stmt->bindParam(':customerEmail', $_POST['customerEmail']);
        $stmt->bindParam(':customerAddress', $_POST['customerAddress']);
        $stmt->bindParam(':created_date', $_POST['build_date']);
        $stmt->bindParam(':customerPhone', $_POST['customerPhone']);
        $stmt->bindParam(':discount', $_POST['discount']);
        $stmt->bindParam(':gst_rate', $_POST['gst_rate']);

        $stmt->bindParam(':subtotal', $_POST['subtotal']);
        // $stmt->bindParam(':added_date', date('Y-m-d')); 
        $stmt->bindParam(':final_total', $_POST['final_total']);




        $stmt->execute();

        $last_inserted_id = $conn->lastInsertId();

        //$last_inserted_id=LAST_INSERT_ID();
        $service = count($_POST['product_id']);
        // print_r($_POST);
        // exit;
        for ($i = 0; $i < $service; $i++) {
            //echo $product_id[$i];
            $sql = "SELECT * FROM fuel_tbl where id='" . $_POST['product_id'][$i] . "'";
            //print_r($sql);exit;

            $statement = $conn->prepare($sql);
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                $quantitynew[$i] = $row['openning_stock'] - $_POST['quantity'][$i];
            }

            $stmt1 = $conn->prepare("INSERT INTO `quot_inv_items`(`inv_id`, `product_id`, `quantity`, `rate`, `total`)  VALUES (:last_inserted_id,:product_id,:quantity,:rate,:total)");
            $stmt1->bindParam(':last_inserted_id', $last_inserted_id);
            $stmt1->bindParam(':product_id', $_POST['product_id'][$i]);
            $stmt1->bindParam(':quantity', $_POST['quantity'][$i]);
            $stmt1->bindParam(':rate', $_POST['rate'][$i]);
            $stmt1->bindParam(':total', $_POST['total'][$i]);
            $stmt1->execute();

            $stmt2 = $conn->prepare("UPDATE fuel_tbl SET openning_stock=:openning_stock  WHERE id=:id");
            $stmt2->bindParam(':openning_stock', $quantitynew[$i]);
            $stmt2->bindParam(':id', $_POST['product_id'][$i]);
            $stmt2->execute();
            // $stmt2 = $conn->prepare("UPDATE tbl_stock SET quantity=:openning_stock  WHERE product_id=:id");
            // $stmt2->bindParam(':openning_stock', $quantitynew[$i]);
            // $stmt2->bindParam(':id', $product_id[$i]);
            // $stmt2->execute();
        }

        $stmt3 = $conn->prepare("DELETE FROM quot_inv_items WHERE inv_id= '" . $last_inserted_id . "' AND quantity='' AND delete_status='0' ");
        $stmt3->execute();
        //echo "<script>alert(' Record Successfully Added');</script>";

        $_SESSION['reply'] = "003";
?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Success
                    </h1>
                    <p>Record Successfully Added</p>
                    <p>

                        <?php echo "<script>setTimeout(\"location.href = '../manage_invoices.php';\",1500);</script>"; ?>
                    </p>
            </div>
        </div>
        </div>

<?php

    }


    if (isset($_POST['del_id'])) {
        $stmt = $conn->prepare("DELETE FROM `tbl_invoice` WHERE id=?");

        $stmt->execute([htmlspecialchars($_POST['del_id'])]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_invoices.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>