<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
<style>
    .imgUpldWrap .fa-picture-o {
        font-size: 6em !important;
    }
</style>

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
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div>
                    <form action="../../api/saveImage.php" method="post" enctype="multipart/form-data">
                        <div class="pr imgUploadSection mr-5">
                            <div class="imgUpldWrap d-flex card shadow-sm" id="imgUpldWrap">
                                <h6 class="fw-bold">Upload Your Images</h6>
                                <i class="fa fa-picture-o colorTheme" aria-hidden="true"></i>

                            </div>
                            <div class="z1 pr op0 cpointer">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="inputGroupFile01" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex jcc text-center" style="max-width: 300px;">
                            <!-- <a href="javascript:void(0)" class="btn btn_default">Submit</a> -->
                            <button type="submit" class="btn btn_default">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="imgPreviewSection card col p-0">
                    <div class="card-header p-3 text-center" style="background: #dedddd">
                        <h6 class="mb-0">Images</h6>
                    </div>
                    <div class="card-body d-flex flex-wrap" id="img">

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
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/js/custom.js"></script>

    <script>
        var ip = self.location.host;
        console.log(ip)
        $(document).ready(function(){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: "../../api/getImgs.php",
                success: function(resultData) {
                    console.log(resultData);
                    var data = JSON.parse(resultData);
                    var F = $('#img');
                    F.empty();
                    for (let i = 0; i < data.length; i++) {
                    var element = data[i];
                        F.append(`
                            <div class="imgPrevWrap p-2"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/btps/api/`+element.file_path+`" alt=""></div>
                        `);
                    }

                }
            });
        });
  </script>

</body>

</html>