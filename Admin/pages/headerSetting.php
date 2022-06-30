<?php
include '../../lib/config.php';
$sql = "SELECT * FROM `header`";

$queryResult = mysqli_query($conn2, $sql);

$json = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
// print_r($json[0]['headerText']);
// echo json_encode($json);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Header Setting
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <?php
include_once './sideBar.php'
?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">

                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content d-flex">
                <div class="card p-3 col-md-4 hfc">
                    <form action="../../api/saveHeader.php" method="post">
                        <div class="pr-1">
                            <div class="form-group">
                                <label class="fw-bold h6 text-muted text-capitalize">Enter Heading</label>
                                <input type="text" name="heading" class="form-control" placeholder=""
                                    value="<?php echo base64_decode($json[0]['headerText']); ?>">
                            </div>
                        </div>
                        <div class="mt-4 pr-1">
                            <div class="form-group">
                                <label class="fw-bold h6 text-muted text-capitalize">Enter Sub Heading</label>
                                <input type="text" name="sub_heading" class="form-control" placeholder=""
                                    value="<?php echo base64_decode($json[0]['belowHeaderText']); ?>">
                            </div>
                            <div class="col-md-5 mt-4 pr-1 pl-0">
                                <button type="submit" class="btn btn_default">Submit</button>
                                <!-- <a href="javascript:void(0)" ></a> -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card ml-4 col p-0 textPrev">
                    <div class="card-header p-3 text-center" style="background: #dedddd">
                        <h6 class="mb-0">Header</h6>
                    </div>
                    <div class="p-3">
                        <h4 class="my-0"><?php echo base64_decode($json[0]['headerText']); ?></h4>
                    </div>
                </div>
                <div class="card ml-4 col p-0 textPrev">
                    <div class="card-header p-3 text-center" style="background: #dedddd">
                        <h6 class="mb-0">Sub-Header</h6>
                    </div>
                    <div class="p-3">
                        <h5><?php echo base64_decode($json[0]['belowHeaderText']); ?></h5>
                    </div>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">

                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>
                                document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Kotai Electronics
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
    </script>
</body>

</html>