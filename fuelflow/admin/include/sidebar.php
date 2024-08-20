<?php


include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  
include '../assets/constant/checklogin.php';
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
foreach ($record1 as $key1) { ?>

    <!DOCTYPE html>
    <html lang="en">
   <!--   // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $key1['title']; ?></title>
        <meta content="Petrol pump management system is developed by mayuri k freelancer" name="description" />
        <meta content="Mayuri K Freelancer India" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../assets/images/<?php echo $key1['photos']; ?>">

        <!-- jvectormap -->
        <!-- <link href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"> -->
        <link href="../assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css" />

        <link href="../assets/plugins/morris/morris.css" rel="stylesheet">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="../assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
<!-- 
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->
        <link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <!-----------Select2---------->
        <link href="../assets/css/select2.css" rel="stylesheet" type="text/css">
        <!-------------Sweetalert----------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link href="bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>Zoter</a>-->
                        <a class="logo">
                            <img src="../assets/images/<?php echo $key1['photo1']; ?>" alt="" width="200px" class="logo-large"><?php } ?>
                        </a>
                    </div>
                </div>

                <div class="sidebar-inner niceScrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="fas fa-home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>



                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fas fa-truck-arrow-right"></i> <span>Supplier</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_supplier.php">Add Supplier</a></li>
                                    <li><a href="manage_supplier.php">Manage Supplier</a></li>
                                    <li><a href="import_supplier.php">Import Supplier</a></li>
                                </ul>
                            </li>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fa fa-list"></i> <span>Categories</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_categories.php">Add Categories</a></li>
                                    <li><a href="manage_categories.php">Manage Categories</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fa fa-user"></i> <span>Customer</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_customer.php">Add Customer</a></li>
                                    <li><a href="manage_customer.php">Manage Customer</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fas fa-gas-pump"></i> <span>Fuels</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_fuel.php">Add Fuel</a></li>
                                    <li><a href="manage_fuel.php">Manage Fuel</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fa fa-file-invoice"></i> <span>Invoices</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_invoices.php">Add Invoices</a></li>
                                    <li><a href="manage_invoices.php">Manage Invoices</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="fa fa fa-flag"></i> <span>Reports</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_sales.php">Order Report</a></li>
                                   
                                </ul>
                            </li>
  <!--    // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->
                            <li>
                                <a href="https://www.mayurik.com/#mayuri_section" class="waves-effect" target="_blank">
                                    <i class="fa fa-group-arrows-rotate"></i>
                                    <span>About Author</span>
                                </a>
                            </li>



                            <li>
                                <a href="web.php" class="waves-effect">
                                    <i class="fa fa-cog"></i>
                                    <span>Web Appearance</span>
                                </a>
                            </li>

<li>
                                <a href="https://www.mayurik.com/source-code/P3584/best-petrol-pump-management-software" class="waves-effect" target="_blank">
                                    <i class="fa fa-download"></i>
                                    <span><b>Download Pro Ver.</b></span>
                                </a>
                            </li>
<li>
                                <a href="https://www.youtube.com/@MayuriK/videos" class="waves-effect" target="_blank">
                                    <i class="fa fa-book"></i>
                                    <span><b>Projects</b></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">