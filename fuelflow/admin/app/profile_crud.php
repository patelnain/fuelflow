<?php
session_start();
include '../../assets/constant/config.php';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
if (isset($_POST['update'])) {

	$uploadDir = '../../assets/images/';
	if ($_FILES['image']['tmp_name'] != '') {
		$filepath = "../../assets/images/" . $_FILES["image"]["name"];
		$originalName = basename($_FILES['image']['name']);
		$extension = pathinfo($originalName, PATHINFO_EXTENSION);

		// Generate a new unique file name
		$newName = uniqid() . '.' . $extension;

		// Set the path to the new file location
		$newFilePath = $uploadDir . $newName;

		// Upload the file to the server


		if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) {
			$img = $_FILES["image"]["name"];

			@unlink("../../assets/images/" . $_POST['old_cat_img']);
		}
	} else {
		$img = $_POST['old_cat_img'];
	}


	//echo "UPDATE `login` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."',`image`='".$img."' WHERE id='".$_SESSION['id']."' ";exit;
	$stmt = $conn->prepare("UPDATE `login` SET `username`='" . $_POST['username'] . "',`email`='" . $_POST['email'] . "',`mobileno`='" . $_POST['mobileno'] . "',`image`='" . $img . "' WHERE id='" . $_SESSION['id'] . "' ");

	$stmt->execute();



	header("location:../dashboard.php");
}
