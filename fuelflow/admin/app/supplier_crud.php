<?php
session_start();
include '../../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {

        $stmt = $conn->prepare("INSERT INTO `supplier`(`brandName`, `supplierEmail`, `supplierPhone`, `supplierAddress`, `brandStatus`) VALUES (?,?,?,?,?)");

        // Apply htmlspecialchars to user inputs
        $brandName = htmlspecialchars($_POST['brandName'], ENT_QUOTES, 'UTF-8');
        $supplierEmail = htmlspecialchars($_POST['supplierEmail'], ENT_QUOTES, 'UTF-8');
        $supplierPhone = htmlspecialchars($_POST['supplierPhone'], ENT_QUOTES, 'UTF-8');
        $supplierAddress = htmlspecialchars($_POST['supplierAddress'], ENT_QUOTES, 'UTF-8');
        $brandStatus = htmlspecialchars($_POST['brandStatus'], ENT_QUOTES, 'UTF-8');

        $stmt->execute([$brandName, $supplierEmail, $supplierPhone, $supplierAddress, $brandStatus]);

        $_SESSION['success'] = "success";

        header("location:../manage_supplier.php");
    }

    if (isset($_POST['update'])) {

        $stmt = $conn->prepare("UPDATE `supplier` SET `brandName`=?, `supplierEmail`=?, `supplierPhone`=?, `supplierAddress`=?, `brandStatus`=? WHERE id=? ");

        // Apply htmlspecialchars to user inputs
        $brandName = htmlspecialchars($_POST['brandName'], ENT_QUOTES, 'UTF-8');
        $supplierEmail = htmlspecialchars($_POST['supplierEmail'], ENT_QUOTES, 'UTF-8');
        $supplierPhone = htmlspecialchars($_POST['supplierPhone'], ENT_QUOTES, 'UTF-8');
        $supplierAddress = htmlspecialchars($_POST['supplierAddress'], ENT_QUOTES, 'UTF-8');
        $brandStatus = htmlspecialchars($_POST['brandStatus'], ENT_QUOTES, 'UTF-8');
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

        $stmt->execute([$brandName, $supplierEmail, $supplierPhone, $supplierAddress, $brandStatus, $id]);

        $_SESSION['update'] = "update";
        header("location:../manage_supplier.php");
    }

    if (isset($_POST['del_id'])) {

        $stmt = $conn->prepare("UPDATE `supplier` SET delete_status='1' WHERE id=? ");

        // Apply htmlspecialchars to user inputs
        $del_id = htmlspecialchars($_POST['del_id'], ENT_QUOTES, 'UTF-8');

        $stmt->execute([$del_id]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_supplier.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com