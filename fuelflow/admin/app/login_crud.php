<?php 
 include("../../assets/constant/config.php");
 session_start();
 

 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if (isset($_POST['submit'])) 
        {
// if(isset($_POST['g-recaptcha-response'])){
//       $stmt1=$conn->prepare("SELECT * FROM `manage_web` ");
//       $stmt1->execute();
//       $record1=$stmt1->fetchAll();
//             foreach ($record1 as $key1) { 
            
// $secretekey=$key1['secretkey'];
// }
//         $ip=$_SERVER['REMOTE_ADDR'];
//         //echo $ip;exit;
//         $response=$_POST['g-recaptcha-response'];
//         //echo $response;exit;
//         //https:www.google.com/recaptcha/api/siteverify METHOD: POST
//         $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretekey&response=$response&remoteip=$ip";
//     //echo $url;exit;
//      $fire=file_get_contents($url);
//      //echo $fire;exit;
//      // data convert to object 
//      $data=json_decode($fire);
//      //echo print_r($data);exit;
//      if($data->success==true){

$passw=hash('sha256', $_POST['password']);
        
            function createSalt()
            {
                return '2123293dsj2hu2nikhiljdsd';
            }
            $salt=createSalt();
            $password=hash('sha256',$salt .$passw); 
           



            // $pass=hash('sha256', $_POST['password']);
            
            // function createSalt()
            // { 
            //     return '2123293dsj2hu2nikhiljdsd';
            // }
            // $salt=createSalt();
            // $password=hash('sha256',$salt . $pass);
           
            //echo "SELECT * FROM signup where email='".$_POST['email']."' AND password='".$password."'";exit;

        $stmt1 = $conn->prepare("SELECT * FROM `login` where email='".$_POST['email']."' AND password='".$password."'");
    // print_r($stmt1); exit;
         
            $stmt1->execute();

            $record=$stmt1->fetchAll();
           // print_r($record);exit;
          
            $res=count($record);
         
            if ($res>0) {
                foreach ($record as $res) {
                    // print_r($res);exit;
                    if ($password==$res['password'])
                    { 
                       
                    $_SESSION['id']=$res['id'];
                }
               //echo $_SESSION['id']; exit;
                header("location:../dashboard.php" ); 
            }
               
            }
            else
            {
     echo '<script>
  alert("Wrong Password or Email");
  window.location.href = "../../index.php";
</script>';
              

            }
                
//             }
//             else
//                     {
//   echo '<script>
//   alert("Please Fill the Captcha");
//   window.location.href = "../../index.php";
// </script>';
//     }


        
//         }

       }
     }   catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>

