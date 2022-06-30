<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <title>BTPS</title>
</head>
<style>
    tbody {
        color: #fff;
    }

    .bodyPanel {
        background-color: rgba(5, 17, 33, 0.833);
        position: relative;
        z-index: 5;
    }

    thead {
        background-color: #e71d36;
        color: #fff;
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    th,
    td {
        text-align: center;
        padding-top: 10vh;
        padding-bottom: 10vh;
    }

    .headerColor h1 {
        font-size: 6vw;
        font-weight: bolder;
    }

    @media only screen and (max-width: 1920px) {
        .headerColor h1 {
            font-size: 3vw !important;
            font-weight: bolder;
        }

        .headerColor  h5 {
            color: #000;
            font-size: 2vw !important;
            font-weight: bolder;
        }
    }

    h5 {
        color: #000;
        font-size: 3.5vw;
        font-weight: 600;
    }

    thead h4 {
        font-size: 3.3vw;
        margin-top: 2rem;
        margin-bottom: 2rem;
        font-weight: 700;
        /* color: #000 */
    }

    h4 {
        font-size: 3vw
    }
</style>
<?php
include('./fetch/fetch.php');
include('./fetch/fetchHeader.php');
?>

<body>
    <div class="mainbody pr">
        <div class="imgWrap h-100 py-4">
            <img src="./assets/img/indexbg.jpg" class="img-responsive">
        </div>
        <div class="container-fluid headerColor pr z3">
            <div class="d-flex d-block justify-content-between align-items-center h-100">
                <img src="./assets/img/logo.png" class="img-responsive logo">
                <div class="text-center">
                    <h1 class="mb-0">Welcome To BTPS</h1>
                    <h5>Guest Information Display</h5>
                    <!-- <h5><?php echo $headerInfo['headerText'] ?></h5> -->
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="tableWrap pr p-0 bodyPanel">

            <div class="listtable pr z3 mt-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h4>Name</h4>
                            </th>
                            <th>
                                <h4>Room no.</h4>
                            </th>
                            <th>
                                <h4>Designation</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rooms as $key => $value) {
                        ?>
                            <tr>
                                <td>
                                    <h4><?php echo $value['name'] ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $value['roomNo'] ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $value['designation'] ?></h4>
                                </td>
                            </tr>
                        <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/custom.js"></script>
</body>

</html>