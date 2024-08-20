<?php
session_start();
include '../../assets/constant/config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
        $filepath = "../../assets/images/" . htmlspecialchars($_FILES["photo"]["name"]);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
            //echo "<img src=".$filepath." height=200 width=300 />";
            $img = htmlspecialchars($_FILES["photo"]["name"]);
        } else {
            echo "Error !!";
        }

        $filepath = "../../assets/images/" . htmlspecialchars($_FILES["banner"]["name"]);

        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $filepath)) {
            //echo "<img src=".$filepath." height=200 width=300 />";
            $img1 = htmlspecialchars($_FILES["banner"]["name"]);
        } else {
            echo "Error !!";
        }


        $stmt = $conn->prepare("INSERT INTO `service`(`heading`, `shortcontent`, `content`,`photo`, `banner`,`metatitle`,`metadescription`,`keywords`,`robots`) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->execute([htmlspecialchars($_POST['heading']), htmlspecialchars($_POST['shortcontent']), htmlspecialchars($_POST['content']), $img, $img1, htmlspecialchars($_POST['metatitle']), htmlspecialchars($_POST['metadescription']), htmlspecialchars($_POST['keywords']), htmlspecialchars($_POST['robots'])]);



        $_SESSION['success'] = "success";

        header("location:../manage_manufacturer.php");
    }



    if (isset($_POST['update'])) {

        if ($_FILES['photo']['tmp_name'] != '') {
            $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $file_extension;
            $filepath = "../../assets/images/" . $new_filename;

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
                $img = $new_filename;

                @unlink("../../assets/images/" . htmlspecialchars($_POST['old_photo_img']));
            }
        } else {
            $img = htmlspecialchars($_POST['old_photo_img']);
        }
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
        if ($_FILES['banner']['tmp_name'] != '') {
            $file_extension = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . '.' . $file_extension;
            $filepath = "../../assets/images/" . $new_filename;

            if (move_uploaded_file($_FILES["banner"]["tmp_name"], $filepath)) {
                $img1 = $new_filename;

                @unlink("../../assets/images/" . htmlspecialchars($_POST['old_banner_img']));
            }
        } else {
            $img1 = htmlspecialchars($_POST['old_banner_img']);
        }

        $stmt = $conn->prepare("UPDATE `service` SET `heading`=?,`shortcontent`=?,`content`=?,`photo`=?,`banner`=?,`metatitle`=?,`metadescription`=?, `keywords`=?, `robots`=? WHERE id=? ");

        $stmt->execute([htmlspecialchars($_POST['heading']), htmlspecialchars($_POST['shortcontent']), htmlspecialchars($_POST['content']), $img, $img1, htmlspecialchars($_POST['metatitle']), htmlspecialchars($_POST['metadescription']), htmlspecialchars($_POST['keywords']), htmlspecialchars($_POST['robots']), htmlspecialchars($_POST['id'])]);
        $_SESSION['update'] = "update";
        header("location:../manage_manufacturer.php");
    }


    if (isset($_GET['id'])) {



        $stmt = $conn->prepare("UPDATE `service` SET delete_status='1' where id=? ");

        $stmt->execute([htmlspecialchars($_GET['id'])]);


        $_SESSION['delete'] = "delete";

        header("location:../manage_manufacturer.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
