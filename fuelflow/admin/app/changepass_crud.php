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

			$pass=hash('sha256',$_POST['oldpassword']);
			$pass1=hash('sha256',$_POST['newpassword']);
			function createSalt()
			{
				return '2123293dsj2hu2nikhiljdsd';
			}
			$salt=createSalt();
			$old=hash('sha256',$salt.$pass);
			$cpassword=hash('sha256',$salt.$pass1);

			if($_POST['newpassword']==$_POST['confirmpassword'])
;

			$stmt = $conn->prepare("UPDATE `login` SET `password`='".$cpassword."' WHERE id='".$_SESSION['id']."' ");
			$stmt->execute();

			header("location:../dashboard.php" ); 

		}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>
