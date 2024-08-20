<?php 
session_start();
 include '../../assets/constant/config.php';
      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{

			$uploadDir = '../../assets/images/';
        if ($_FILES['photo1']['tmp_name'] != '') {
            $filepath = "../../assets/images/" . $_FILES["photo"]["name"];
            $originalName = basename($_FILES['photo1']['name']);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            // Generate a new unique file name
            $newName = uniqid() . '.' . $extension;

            // Set the path to the new file location
            $newFilePath = $uploadDir . $newName;

            // Upload the file to the server
            if (move_uploaded_file($_FILES['photo1']['tmp_name'], $newFilePath)) {
                $img = $newName;
            } else {
                echo 'There was an error uploading the file.';
            }
        }     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com

        // Handle banner file upload
        if ($_FILES['photos']['tmp_name'] != '') {
            $filepath = "../../assets/images/" . $_FILES["photos"]["name"];
            $originalName1 = basename($_FILES['photos']['name']);
            $extension1 = pathinfo($originalName1, PATHINFO_EXTENSION);

            // Generate a new unique file name
            $newName1 = uniqid() . '.' . $extension1;

            // Set the path to the new file location
            $newFilePath1 = $uploadDir . $newName1;

            // Upload the file to the server
            if (move_uploaded_file($_FILES['photos']['tmp_name'], $newFilePath1)) {
                $img1 = $newName1;
            } else {
                echo 'There was an error uploading the file.';
            }
        }
			
		

//echo "INSERT INTO `manage_web`(`photo1`,`photos`) VALUES ('".$img."','".$img1."')";exit;
			$stmt = $conn->prepare("INSERT INTO `manage_web`(`photo1`,`photos`) VALUES ('".$img."','".$img1."')");

			$stmt->execute();
			
			
			$_SESSION['success']="success";
		

			header("location:../web.php" ); 

		}
	
	

		if (isset($_POST['update'])) {
    function generateUniqueFilename($file) {
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '.' . $file_extension;
        return $unique_filename;
    }

    if ($_FILES['photo1']['tmp_name'] != '') {
        $img = generateUniqueFilename($_FILES['photo1']);
        $filepath = "../../assets/images/" . $img;

        if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo1_img']);
        }
    } else {
        $img = $_POST['old_photo1_img'];
    }     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com

    if ($_FILES['photos']['tmp_name'] != '') {
        $img1 = generateUniqueFilename($_FILES['photos']);
        $filepath = "../../assets/images/" . $img1;

        if (move_uploaded_file($_FILES["photos"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photos_img']);
        }
    } else {
        $img1 = $_POST['old_photos_img'];
    }

    // Rest of your code...

    $stmt = $conn->prepare("UPDATE `manage_web` SET `title` = :title, `photo1` = :img, `photos` = :img1, `sitekey` = :sitekey, `secretkey` = :secretkey WHERE id = :id");
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':img1', $img1);
    $stmt->bindParam(':sitekey', $_POST['sitekey']);
    $stmt->bindParam(':secretkey', $_POST['secretkey']);
    $stmt->bindParam(':id', $_POST['id']);

    $stmt->execute();

    $_SESSION['update'] = "update";

    header("location:../web.php");
}


     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com

		if (isset($_POST['update1'])) {
    if ($_FILES['photo2']['tmp_name'] != '') {
        $file_extension = pathinfo($_FILES['photo2']['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '.' . $file_extension;
        $filepath = "../../assets/images/" . $unique_filename;

        if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $filepath)) {
            $img = $unique_filename;

            @unlink("../../assets/images/" . $_POST['old_cat_img']);
        }
    } else {
        $img = $_POST['old_cat_img'];
    }

    // Rest of your code...

    $stmt = $conn->prepare("UPDATE `loginbackground` SET `photo2` = :img WHERE id = :id");
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':id', $_POST['id']);

    $stmt->execute();

    $_SESSION['update'] = "update";
    header("location:../web.php");
}

     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com


		if (isset($_POST['update2'])) {
    function generateUniqueFilename($file) {
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '.' . $file_extension;
        return $unique_filename;
    }

    if ($_FILES['photo1']['tmp_name'] != '') {
        $img = generateUniqueFilename($_FILES['photo1']);
        $filepath = "../../assets/images/" . $img;

        if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo1_img']);
        }
    } else {
        $img = $_POST['old_photo1_img'];
    }

    if ($_FILES['photo2']['tmp_name'] != '') {
        $img1 = generateUniqueFilename($_FILES['photo2']);
        $filepath = "../../assets/images/" . $img1;

        if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo2_img']);
        }
    } else {
        $img1 = $_POST['old_photo2_img'];
    }

    if ($_FILES['photo3']['tmp_name'] != '') {
        $img2 = generateUniqueFilename($_FILES['photo3']);
        $filepath = "../../assets/images/" . $img2;

        if (move_uploaded_file($_FILES["photo3"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo3_img']);
        }
    } else {
        $img2 = $_POST['old_photo3_img'];
    }

    // Rest of your code...

    $stmt = $conn->prepare("UPDATE `footer` SET `fcopyright`=:fcopyright, `faddress`=:faddress, `fphone`=:fphone, `fworkinghour`=:fworkinghour, `faboutus`=:faboutus, `bareamil`=:bareamil, `barphone`=:barphone, `iframe`=:iframe, `photo1`=:img, `photo2`=:img1, `photo3`=:img2 WHERE id=:id");
    $stmt->bindParam(':fcopyright', $_POST['fcopyright']);
    $stmt->bindParam(':faddress', $_POST['faddress']);
    $stmt->bindParam(':fphone', $_POST['fphone']);
    $stmt->bindParam(':fworkinghour', $_POST['fworkinghour']);
    $stmt->bindParam(':faboutus', $_POST['faboutus']);
    $stmt->bindParam(':bareamil', $_POST['bareamil']);
    $stmt->bindParam(':barphone', $_POST['barphone']);
    $stmt->bindParam(':iframe', $_POST['iframe']);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':img1', $img1);
    $stmt->bindParam(':img2', $img2);
    $stmt->bindParam(':id', $_POST['id']);

    $stmt->execute();

    $_SESSION['update'] = "update";

    header("location:../web.php");
}


		if (isset($_POST['update3'])) 
		{

				$stmt = $conn->prepare("UPDATE `emailsetting` SET `encryption`='".$_POST['encryption']."',`host`='".$_POST['host']."',`port`='".$_POST['port']."',`username`='".$_POST['username']."',`password`='".$_POST['password']."',`email`='".$_POST['email']."' WHERE id='".$_POST['id']."' ");

		      $stmt->execute();
			
			$_SESSION['update'] = "update";
			header("location:../web.php" ); 

		}
	
		if (isset($_POST['update4'])) {
    $stmt = $conn->prepare("UPDATE `sidebarfooter` SET `rpost`=:rpost, `ppost`=:ppost, `recentpost`=:recentpost, `popularpost`=:popularpost WHERE id=:id");
    $stmt->bindParam(':rpost', $_POST['rpost']);
    $stmt->bindParam(':ppost', $_POST['ppost']);
    $stmt->bindParam(':recentpost', $_POST['recentpost']);
    $stmt->bindParam(':popularpost', $_POST['popularpost']);
    $stmt->bindParam(':id', $_POST['id']);

    $stmt->execute();
    header("location:../web.php");
}

if (isset($_POST['update5'])) {
    function generateUniqueFilename($file) {
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '.' . $file_extension;
        return $unique_filename;
    }
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
    if ($_FILES['photo']['tmp_name'] != '') {
        $img = generateUniqueFilename($_FILES['photo']);
        $filepath = "../../assets/images/" . $img;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo_img']);
        }
    } else {
        $img = $_POST['old_photo_img'];
    }

    if ($_FILES['photo1']['tmp_name'] != '') {
        $img1 = generateUniqueFilename($_FILES['photo1']);
        $filepath = "../../assets/images/" . $img1;

        if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo1_img']);
        }
    } else {
        $img1 = $_POST['old_photo1_img'];
    }
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
    if ($_FILES['photo2']['tmp_name'] != '') {
        $img2 = generateUniqueFilename($_FILES['photo2']);
        $filepath = "../../assets/images/" . $img2;

        if (move_uploaded_file($_FILES["photo2"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo2_img']);
        }
    } else {
        $img2 = $_POST['old_photo2_img'];
    }

    if ($_FILES['photo3']['tmp_name'] != '') {
        $img3 = generateUniqueFilename($_FILES['photo3']);
        $filepath = "../../assets/images/" . $img3;

        if (move_uploaded_file($_FILES["photo3"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo3_img']);
        }
    } else {
        $img3 = $_POST['old_photo3_img'];
    }

    if ($_FILES['photo4']['tmp_name'] != '') {
        $img4 = generateUniqueFilename($_FILES['photo4']);
        $filepath = "../../assets/images/" . $img4;

        if (move_uploaded_file($_FILES["photo4"]["tmp_name"], $filepath)) {
            @unlink("../../assets/images/" . $_POST['old_photo4_img']);
        }
    } else {
        $img4 = $_POST['old_photo4_img'];
    }

    // Rest of your code...

    $stmt = $conn->prepare("UPDATE `homepage` SET `title`=:title, `subtitle`=:subtitle, `status`=:status, `photo`=:img, `photo1`=:img1, `title1`=:title1, `subtitle1`=:subtitle1, `status1`=:status1, `title2`=:title2, `subtitle2`=:subtitle2, `status2`=:status2, `title3`=:title3, `subtitle3`=:subtitle3, `status3`=:status3, `title4`=:title4, `subtitle4`=:subtitle4, `status4`=:status4, `photo2`=:img2, `title5`=:title5, `subtitle5`=:subtitle5, `status5`=:status5, `photo3`=:img3, `title6`=:title6, `subtitle6`=:subtitle6, `status6`=:status6, `title7`=:title7, `subtitle7`=:subtitle7, `status7`=:status7, `title8`=:title8, `subtitle8`=:subtitle8, `status8`=:status8, `photo4`=:img4, `counter1text`=:counter1text, `counter1value`=:counter1value, `counter2text`=:counter2text, `counter2value`=:counter2value, `counter3text`=:counter3text, `counter3value`=:counter3value, `counter4text`=:counter4text, `counter4value`=:counter4value, `status9`=:status9, `totalrecentpost`=:totalrecentpost WHERE id=:id");
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':subtitle', $_POST['subtitle']);
    $stmt->bindParam(':status', $_POST['status']);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':img1', $img1);
    $stmt->bindParam(':title1', $_POST['title1']);
    $stmt->bindParam(':subtitle1', $_POST['subtitle1']);
    $stmt->bindParam(':status1', $_POST['status1']);
    $stmt->bindParam(':title2', $_POST['title2']);
    $stmt->bindParam(':subtitle2', $_POST['subtitle2']);
    $stmt->bindParam(':status2', $_POST['status2']);
    $stmt->bindParam(':title3', $_POST['title3']);
    $stmt->bindParam(':subtitle3', $_POST['subtitle3']);
    $stmt->bindParam(':status3', $_POST['status3']);
    $stmt->bindParam(':title4', $_POST['title4']);
    $stmt->bindParam(':subtitle4', $_POST['subtitle4']);
    $stmt->bindParam(':status4', $_POST['status4']);
    $stmt->bindParam(':img2', $img2);
    $stmt->bindParam(':title5', $_POST['title5']);
    $stmt->bindParam(':subtitle5', $_POST['subtitle5']);
    $stmt->bindParam(':status5', $_POST['status5']);
    $stmt->bindParam(':img3', $img3);
    $stmt->bindParam(':title6', $_POST['title6']);
    $stmt->bindParam(':subtitle6', $_POST['subtitle6']);
    $stmt->bindParam(':status6', $_POST['status6']);
    $stmt->bindParam(':title7', $_POST['title7']);
    $stmt->bindParam(':subtitle7', $_POST['subtitle7']);
    $stmt->bindParam(':status7', $_POST['status7']);
    $stmt->bindParam(':title8', $_POST['title8']);
    $stmt->bindParam(':subtitle8', $_POST['subtitle8']);
    $stmt->bindParam(':status8', $_POST['status8']);
    $stmt->bindParam(':img4', $img4);
    $stmt->bindParam(':counter1text', $_POST['counter1text']);
    $stmt->bindParam(':counter1value', $_POST['counter1value']);
    $stmt->bindParam(':counter2text', $_POST['counter2text']);
    $stmt->bindParam(':counter2value', $_POST['counter2value']);
    $stmt->bindParam(':counter3text', $_POST['counter3text']);
    $stmt->bindParam(':counter3value', $_POST['counter3value']);
    $stmt->bindParam(':counter4text', $_POST['counter4text']);
    $stmt->bindParam(':counter4value', $_POST['counter4value']);
    $stmt->bindParam(':status9', $_POST['status9']);
    $stmt->bindParam(':totalrecentpost', $_POST['totalrecentpost']);
    $stmt->bindParam(':id', $_POST['id']);

    $stmt->execute();
    $_SESSION['update'] = "update";
    header("location:../web.php");
}

     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com

			if (isset($_POST['update6'])) {
    // Function to generate unique file name
    function generateUniqueFileName($filename) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $uniqueName = $basename . '_' . uniqid() . '.' . $ext;
        return $uniqueName;
    }

    if ($_FILES['aboutphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["aboutphoto"]["name"]);

        if (move_uploaded_file($_FILES["aboutphoto"]["tmp_name"], $filepath)) {
            $img1 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['oldaboutphoto']);
        }
    } else {
        $img1 = $_POST['oldaboutphoto'];
    }

    if ($_FILES['faqphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["faqphoto"]["name"]);

        if (move_uploaded_file($_FILES["faqphoto"]["tmp_name"], $filepath)) {
            $img2 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_faq_img']);
        }
    } else {
        $img2 = $_POST['old_faq_img'];
    }

    if ($_FILES['galleryphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["galleryphoto"]["name"]);

        if (move_uploaded_file($_FILES["galleryphoto"]["tmp_name"], $filepath)) {
            $img3 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_gallery_img']);
        }
    } else {
        $img3 = $_POST['old_gallery_img'];
    }

    if ($_FILES['servicephoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["servicephoto"]["name"]);

        if (move_uploaded_file($_FILES["servicephoto"]["tmp_name"], $filepath)) {
            $img4 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_service_img']);
        }
    } else {
        $img4 = $_POST['old_service_img'];
    }

    if ($_FILES['portfoliophoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["portfoliophoto"]["name"]);

        if (move_uploaded_file($_FILES["portfoliophoto"]["tmp_name"], $filepath)) {
            $img5 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_portfolio_img']);
        }
    } else {
        $img5 = $_POST['old_portfolio_img'];
    }

    if ($_FILES['testimoinalphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["testimoinalphoto"]["name"]);

        if (move_uploaded_file($_FILES["testimoinalphoto"]["tmp_name"], $filepath)) {
            $img6 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_testimonial_img']);
        }
    } else {
        $img6 = $_POST['old_testimonial_img'];
    }

    if ($_FILES['newsphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["newsphoto"]["name"]);

        if (move_uploaded_file($_FILES["newsphoto"]["tmp_name"], $filepath)) {
            $img7 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_news_img']);
        }
    } else {
        $img7 = $_POST['old_news_img'];
    }

    if ($_FILES['contactphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["contactphoto"]["name"]);

        if (move_uploaded_file($_FILES["contactphoto"]["tmp_name"], $filepath)) {
            $img8 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_contact_img']);
        }
    } else {
        $img8 = $_POST['old_contact_img'];
    }

    if ($_FILES['searchphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["searchphoto"]["name"]);

        if (move_uploaded_file($_FILES["searchphoto"]["tmp_name"], $filepath)) {
            $img9 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_search_img']);
        }
    } else {
        $img9 = $_POST['old_search_img'];
    }

    if ($_FILES['categoryphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["categoryphoto"]["name"]);

        if (move_uploaded_file($_FILES["categoryphoto"]["tmp_name"], $filepath)) {
            $img10 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_category_img']);
        }
    } else {
        $img10 = $_POST['old_category_img'];
    }

    if ($_FILES['teamphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["teamphoto"]["name"]);

        if (move_uploaded_file($_FILES["teamphoto"]["tmp_name"], $filepath)) {
            $img11 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_team_img']);
        }
    } else {
        $img11 = $_POST['old_team_img'];
    }

    if ($_FILES['privacyphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["privacyphoto"]["name"]);

        if (move_uploaded_file($_FILES["privacyphoto"]["tmp_name"], $filepath)) {
            $img12 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_privacy_img']);
        }
    } else {
        $img12 = $_POST['old_privacy_img'];
    }

    if ($_FILES['dynamicphoto']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["dynamicphoto"]["name"]);

        if (move_uploaded_file($_FILES["dynamicphoto"]["tmp_name"], $filepath)) {
            $img13 = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_dynamic_img']);
        }
    } else {
        $img13 = $_POST['old_dynamic_img'];
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("UPDATE `banner` SET `aboutphoto`=?, `faqphoto`=?, `galleryphoto`=?, `servicephoto`=?, `portfoliophoto`=?, `testimoinalphoto`=?, `newsphoto`=?, `contactphoto`=?, `searchphoto`=?, `categoryphoto`=?, `teamphoto`=?, `privacyphoto`=?, `dynamicphoto`=? WHERE id=?");
    $stmt->bind_param($img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8, $img9, $img10, $img11, $img12, $img13, $_POST['id']);
    $stmt->execute();

    $_SESSION['update'] = "update";
    header("location: ../web.php");
}


	if (isset($_POST['update7'])) {
    if ($_FILES['photo']['tmp_name'] != '') {
        $filepath = "../../assets/images/" . generateUniqueFileName($_FILES["photo"]["name"]);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filepath)) {
            $img = basename($filepath);
            @unlink("../../assets/images/" . $_POST['old_cat_img']);
        }
    } else {
        $img = $_POST['old_cat_img'];
    }

    $stmt = $conn->prepare("UPDATE `other` SET `photo`=?, `status9`=?, `livechat`=?, `status`=?, `direction`=?, `address`=?, `mobile`=?, `email`=? WHERE id=?");

    $stmt->bindParam(1, $img);
    $stmt->bindParam(2, $_POST['status9']);
    $stmt->bindParam(3, $_POST['livechat']);
    $stmt->bindParam(4, $_POST['status']);
    $stmt->bindParam(5, $_POST['direction']);
    $stmt->bindParam(6, $_POST['address']);
    $stmt->bindParam(7, $_POST['mobile']);
    $stmt->bindParam(8, $_POST['email']);
    $stmt->bindParam(9, $_POST['id']);

    $stmt->execute();

    $_SESSION['update'] = "update";
    header("location:../web.php");
}



		if (isset($_GET['id'])) 
		{


			$stmt = $conn->prepare("UPDATE `manage_web` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../web.php" ); 

		}

			if (isset($_POST['update8'])) 
		{


				$stmt = $conn->prepare("UPDATE `color` SET `gradiantcolor`='".$_POST['gradiantcolor']."',`complexcolor`='".$_POST['complexcolor']."' ");

		//print_r($stmt);exit;

			$stmt->execute();
			$_SESSION['update']="update";
			header("location:../web.php" ); 

		}


		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

