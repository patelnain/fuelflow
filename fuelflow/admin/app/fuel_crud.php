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
        $stmt = $conn->prepare("INSERT INTO `fuel_tbl` (`fuelName`, `openning_stock`, `rate`, `unit_price`, `bno`, `expdate`, `formula`, `supplierName`, `categoryName`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([htmlspecialchars($_POST['fuelName']), htmlspecialchars($_POST['openning_stock']), htmlspecialchars($_POST['rate']), htmlspecialchars($_POST['unit_price']), htmlspecialchars($_POST['bno']), htmlspecialchars($_POST['expdate']), htmlspecialchars($_POST['formula']), htmlspecialchars($_POST['supplierName']), htmlspecialchars($_POST['categoryName'])]);

        $_SESSION['success'] = "success";

        header("location:../manage_fuel.php");
    }

    if (isset($_POST['update'])) {
        $stmt = $conn->prepare("UPDATE `fuel_tbl` SET `fuelName`=?, `openning_stock`=?, `rate`=?, `unit_price`=?, `bno`=?, `expdate`=?, `formula`=?, `supplierName`=?, `categoryName`=? WHERE id=?");

        $stmt->execute([htmlspecialchars($_POST['fuelName']), htmlspecialchars($_POST['openning_stock']), htmlspecialchars($_POST['rate']), htmlspecialchars($_POST['unit_price']), htmlspecialchars($_POST['bno']), htmlspecialchars($_POST['expdate']), htmlspecialchars($_POST['formula']), htmlspecialchars($_POST['supplierName']), htmlspecialchars($_POST['categoryName']), htmlspecialchars($_POST['id'])]);

        $_SESSION['update'] = "update";

        header("location:../manage_fuel.php");
    }
   // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com


    if (isset($_POST['del_id'])) {
        $stmt = $conn->prepare("DELETE FROM `fuel_tbl` WHERE id=?");

        $stmt->execute([htmlspecialchars($_POST['del_id'])]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_fuel.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com