<?php
include '../lib/config.php';
$sql = "SELECT * FROM `simple_txt`";
$queryResult = mysqli_query($conn2, $sql);
$json = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM `images`";
$queryResult2 = mysqli_query($conn2, $sql2);
$json2 = mysqli_fetch_all($queryResult2, MYSQLI_ASSOC);
// print_r($json2[0]['file_path']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

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
        font-size: 5vw !important;
        font-weight: bolder;
    }

    .headerColor h5 {
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

.mainbody {
    height: 100% !important;
}

.myText {

    /* border: solid #497b8f; */
    /* border-radius: 10px; */
    /* background-color: #ecf5f3; */
}

.only_text {
    font-size: 8vw;
    text-align: justify;
}
</style>
<?php
include './fetch/fetch.php';
include './fetch/fetchHeader.php';
include './components/header.php';
?>

<body>
    <div class="mainbody">

        <div class="btpsSlide h-100">
            <!-- List Section -->
            <div id="listSlide" class="listSlide h_100vh">
                <div class="pr">
                    <div class="imgWrap">
                        <img src="./assets/img/indexbg.jpg" class="">
                    </div>
                    <div class="container-fluid headerColor pr z3">
                        <div class="d-flex d-block justify-content-between align-items-center h-100">
                            <img src="./assets/img/logo.png" class="img-responsive logo">
                            <div class="text-center">

                                <h1 class="mb-0"><?php echo $headerText; ?></h1>
                                <h5>
                                    <?php echo $belowHeaderText; ?>
                                </h5>

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
                                            <h4>Designation</h4>
                                        </th>
                                        <th>
                                            <h4>Room no.</h4>
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
                                            <h4><?php echo $value['designation'] ?></h4>
                                        </td>
                                        <td>
                                            <h4><?php echo $value['room_no'] ?></h4>
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
            </div>

            <!-- image Section -->
            <div id="imageSlide" class="imageSlide h_100vh">
                <img class="simg w-100 h-100" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/btps/api/<?php echo $json2[0]['file_path']; ?>"
                    alt="">
            </div>


            <!-- Text Section -->
            <div id="textSlide" class="textSlide h_100vh">
                <div class="container-fluid headerColor pr z3">
                    <div class="d-flex d-block justify-content-between align-items-center h-100">
                        <img src="./assets/img/logo.png" class="img-responsive logo">
                        <div class="text-center">

                            <h1 class="mb-0"><?php echo $headerText; ?></h1>
                            <h5>
                                <?php echo $belowHeaderText; ?>
                            </h5>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="myText p-4">
                    <p class="only_text"><?php echo base64_decode($json[0]['text_body']); ?></p>
                </div>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $('.btpsSlide').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 10000,
        });
        setTimeout(function() {
            window.location.reload(1);
        }, 30000);
    });
    </script>
</body>

</html>