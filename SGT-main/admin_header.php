<?php
session_start();
$login=0;
$role="no role";
$auth=false;
if(isset($_SESSION['uid']) and isset($_SESSION['role']) )
{
    $login=$_SESSION['uid'];
    $role=$_SESSION['role'];
    if($login!=0 and $role=="admin")
        $auth=true;
}
include "dbinfo.php";
if($login!=0) {
    $cnuser = mysqli_connect(Host, UN, PW, DBname);
    $rsltuser = mysqli_query($cnuser, "select * from users where id=$login");
    $arruser=mysqli_fetch_array($rsltuser);
}
$cnc=mysqli_connect(Host,UN,PW,DBname);
$rsltc=mysqli_query($cnc,"select count(*) from media where state='pending'");
$arrc=mysqli_fetch_array($rsltc);
$counttel=$arrc[0];
?>

<!doctype html>
<html>

<head>

    <title>Talents</title>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-16" />

    <!-- Fontawesome library -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- jQuery library -->
    <script src="js/jquery-3.1.1.min.js"></script>

    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- video.js library --> 
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">

    <!-- stars rating library --> 
    <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/star-rating.min.js" type="text/javascript"></script>

    <!-- pagination.min.js library -->      
    <link rel="stylesheet" href="css/jquery.paginate.css">
    <script src="js/jquery.paginate.js"></script>

    <!-- Fontawesome library -->
    <script src="js/fontawesome-all.js"></script>

    <!-- OwlCarousel 2-2.3.4 library -->
    <script src="js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Bootstrap 4.1.1 library -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: 'Cairo', sans-serif;
        }

        #particles-js {
            height: 100%;
            z-index: 0;
        }

        .carousel-caption{
            background-color: black;
            opacity: .75;
            width: 100%;
            bottom: 40%;

            left:0%;



        }
        .card-img-overlay{
            background-color: black;
            opacity: .65;
        }
        
        div.bg-light{
    background-image: url(img/bg.jpg) !important;
}

    </style>

</head>
<body>

<div id="particles-js" class="fixed-top">

</div>

<nav id="mainnavbar" class="navbar navbar-expand-md navbar-light bg-transparent fixed-top font-weight-bold"
     style="transition: all 1s ease-out;direction: rtl;">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img class="img-fluid d-block" src="img\logo.png" style="" width="100" height="100%">
        </a>
        <?php if($auth==true) { ?>
        <div class="collapse navbar-collapse text-center  justify-content-end" id="navbarDarkSupportedContent">
                <ul class="navbar-nav text-right">
                    <li class="nav-item active"><a class="nav-link" href="adm_talent_rev.php"><i class="fas fa-video"></i>  مراجعه المواهب<span id="cnt"></span></a></li>
                    <li class="nav-item active"><a class="nav-link" href="adm_ads_rev.php"><i class="fas fa-video"></i>  مراجعه الاعلانات<span id="acnt"></span></a></li>
                    <li class="nav-item active"><a class="nav-link" href="admin_judge_view.php"><i class="fas fa-users"></i> الحكام</a></li>
                    <li class="nav-item active"><a class="nav-link" href="admin_talent_view.php"><i class="fas fa-magic"></i>انواع المواهب</a></li>
                    <li class=" nav-item"><p class="nav-link">اهلا <?php echo $arruser['fullname'];?></p></li>
                    <li class="nav-item"><a class="nav-link" href="process/logout.php"><i class="fas fa-sign-out-alt"></i> الخروج </a></li>
                </ul>



        </div>
        <?php }?>
    </div>
</nav>
<script>
    function cnt() {
        debugger;
        str=$("#cnt").val();

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cnt").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "process/adm_counttel.php", true);
            xmlhttp.send();
        }
        function cnt1() {
        debugger;
        str=$("#acnt").val();

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cnt").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "process/adm_countads.php", true);
            xmlhttp.send();
        }
        setInterval(cnt(),300);
        setInterval(cnt1(),300);


</script>