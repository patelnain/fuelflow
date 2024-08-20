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
        $stmt = $conn->prepare("INSERT INTO `customer`(`brandName`, `customerEmail`, `customerPhone`, `customerAddress`, `brandStatus`) VALUES (?,?,?,?,?)");

        $stmt->execute([
            htmlspecialchars($_POST['brandName']),
            htmlspecialchars($_POST['customerEmail']),
            htmlspecialchars($_POST['customerPhone']),
            htmlspecialchars($_POST['customerAddress']),
            htmlspecialchars($_POST['brandStatus'])
        ]);

        $_SESSION['success'] = "success";

        header("location:../manage_customer.php");
    }

    if (isset($_POST['update'])) {
        $stmt = $conn->prepare("UPDATE `customer` SET `brandName`=?, `customerEmail`=?, `customerPhone`=?, `customerAddress`=?, `brandStatus`=? WHERE id=? ");

        $stmt->execute([
            htmlspecialchars($_POST['brandName']),
            htmlspecialchars($_POST['customerEmail']),
            htmlspecialchars($_POST['customerPhone']),
            htmlspecialchars($_POST['customerAddress']),
            htmlspecialchars($_POST['brandStatus']),
            htmlspecialchars($_POST['id'])
        ]);

        $_SESSION['update'] = "update";
        header("location:../manage_customer.php");
    }

    if (isset($_POST['del_id'])) {
        $stmt = $conn->prepare("UPDATE `customer` SET delete_status='1' WHERE id=? ");

        $stmt->execute([
            htmlspecialchars($_POST['del_id'])
        ]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_customer.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com