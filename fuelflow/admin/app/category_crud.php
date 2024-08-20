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

        $stmt = $conn->prepare("INSERT INTO `fuel_category`(`name`) VALUES (?)");

        $stmt->execute([htmlspecialchars($_POST['name'])]);

        $_SESSION['success'] = "success";

        header("location:../manage_categories.php");
    }

    if (isset($_POST['update'])) {

        $stmt = $conn->prepare("UPDATE `fuel_category` SET `name`=? WHERE id=?");

        $stmt->execute([htmlspecialchars($_POST['name']), htmlspecialchars($_POST['id'])]);

        $_SESSION['update'] = "update";
        header("location:../manage_categories.php");
    }

    if (isset($_POST['del_id'])) {

        $stmt = $conn->prepare("DELETE FROM `fuel_category` WHERE id=?");

        $stmt->execute([htmlspecialchars($_POST['del_id'])]);

        $_SESSION['delete'] = "delete";

        header("location:../manage_categories.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
