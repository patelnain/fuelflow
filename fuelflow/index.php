<?php
session_start();
include 'assets/constant/config.php';
//  Author Name: Mayuri K. 
 // for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 //Visit website : www.mayurik.com

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php
$stmt1 = $conn->prepare("SELECT * FROM `manage_web` ");
$stmt1->execute();
$record1 = $stmt1->fetchAll();
foreach ($record1 as $key1) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>FuelFlow Lite - By Mayuri K Freelancer</title>
        <meta content="" name="" />
        <meta content="" name="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/<?php echo $key1['photos']; ?>">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <style>
            body {
                background-image: url('nature1.jpg');
            }
        </style>
    </head>

    <body>


        <!-- Begin page -->

        <div class="wrapper-page row align-items-center  login-form">

            <div class="col-md-6  d-flex ">
                <div class="col-md-8 mx-auto ">


                    <div class="text-center front-logo">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/<?php echo $key1['photo1']; ?>" alt="logo" width="330px"></a>
                    </div>

                    <div class="">
                        <form class="form-horizontal m-t-20" action="admin/app/login_crud.php" method="POST">

                            <div class="form-group position-relative mb-4">

                                <label class="form-label">Email address</label>
                                <input class="form-control" type="text" name="email" required="" placeholder="Email">
                            </div>

                            <div class="form-group position-relative mb-4">

                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" required="" placeholder="Password" id="password-field">

                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>

                            </div>
                            <div>
                                <div class="g-recaptcha" data-sitekey="<?php echo $key1['sitekey'] ?>"></div><?php } ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">

                                </div>
                            </div>

                            <div class="form-group m-t-20">
                                <div class="col-md-10">
                                    <button class="btn btn-primary btn-block" type="submit" name="submit">SIGN IN</button>
                                </div>
                            </div>



                        </form>

                    </div>
                </div>
            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            // Hide show Password Field
            $(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>
    </body>

    </html>