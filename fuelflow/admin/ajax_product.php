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
      echo "connion failed: " . $e->getMessage();
}
?>
<?php
//include('connect.php');


if (isset($_POST['drop_services'])) {
      $sql_service1 = "SELECT * FROM fuel_tbl WHERE id  = '" . $_POST['drop_services'] . "'";
      $statement = $conn->prepare($sql_service1);
      $statement->execute();


      $service1 = $statement->fetch(PDO::FETCH_ASSOC);

      /*$result1=$conn->query($sql_service1);  
        $service1 = mysqli_fetch_array($result1);
        */
      $data['product'] = $service1;
      echo json_encode($data);
      exit;
}

if (isset($_POST['cust_name'])) {

      $sql_service1 = "SELECT * FROM customer WHERE id  = '" . $_POST['cust_name'] . "' AND delete_status='0'";

      $statement = $conn->prepare($sql_service1);
      $statement->execute();

      $data['cust'] = $statement->fetchAll();
      // print_r($data);
      // exit;

      echo json_encode($data);
      exit;
}

?>