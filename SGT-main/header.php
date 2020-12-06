<?php
session_start();
$login=0;
$role="no role";
if(isset($_SESSION['uid']) and isset($_SESSION['role']))
{
    $login=$_SESSION['uid'];
    $role=$_SESSION['role'];
}
if(isset($_COOKIE['usercookie'])and isset($_COOKIE['passcookie']))
{
    $ucookie=$_COOKIE['usercookie'];
    $pcookie=$_COOKIE['passcookie'];
}
else
{
    $ucookie='';
    $pcookie='';
}

include "dbinfo.php";
$tal=0;
if($login!=0) {
    $cnuser = mysqli_connect(Host, UN, PW, DBname);
    $rsltuser = mysqli_query($cnuser, "select * from users where id=$login");
    $arruser=mysqli_fetch_array($rsltuser);
}
if($role=='talent')
{
    $tal=1;
    $cnimg = mysqli_connect(Host, UN, PW, DBname);
    $rsltimg = mysqli_query($cnimg, "select img from talented where id=$login");
    $arrimg=mysqli_fetch_array($rsltimg);
}
$cntallist=mysqli_connect(Host,UN,PW,DBname);
$rslttallist=mysqli_query($cntallist,"select * from talents");
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
        <button class="navbar-toggler navbar-toggler-right" id="menubutton" type="button" data-toggle="collapse"
                data-target="#navbarDarkSupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center  justify-content-end" id="navbarDarkSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav text-right">
                    <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> الرئيسية
                        </a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" href="#">
                            <i class="fas fa-cubes"></i> المواهب
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            while ($arrtallist=mysqli_fetch_array($rslttallist)) {
                                echo "<a class='dropdown-item' href='viewtalent.php?tid=$arrtallist[0]'>$arrtallist[1] </a>";
                            }
                            ?>

                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#myModal2" data-toggle="modal"
                                            data-target="#myModal2"><i class="fas fa-search"></i> البحث </a></li>
                    <?php if ($role=="audience" or $role=="judge" or $role=="talent")
                        echo'
                    <li class="nav-item"><a class="nav-link" href="#notification" data-toggle="modal"
                                            data-target="#notification">   <span id="not_count"></span> الأشعارات </a></li>
';?>

                    <?php
                    if($role=="talent")
                        echo '<li class=" nav-item"><a class="nav-link" href="upload.php"><i class="fas fa-video"></i> مواهبي </a></li>';
                    ?>

                    <?php
                    if($role=="advertiser")
                        echo '<li class=" nav-item"><a class="nav-link" href="upload_ads.php"><i class="fas fa-video"></i>اعلاناتي</a></li>';
                    ?>
                    <?php if($login!="0" and $tal==1) echo'
                    <li class=" nav-item"><p class="nav-link"> 
                    <img src="'.$arrimg[0].'"class=" rounded-circle" style="height:30px!important;width:30px!important;" alt="...">
                    
                    
                    اهلا '.$arruser[1].'</p></li>';
                    else if($login!='0')
                        echo " <li class=\" nav-item\"><p class=\"nav-link\"> اهلا $arruser[1] </p></li>";
                    ?>

                    <?php if($login==0)
                        echo'
                    <li class="nav-item"><a class="nav-link" href="#registeration" data-toggle="modal"
                                            data-target="#registeration"><i class="fas fa-sign-in-alt"></i> التسجيل </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#myModal1" data-toggle="modal"
                                            data-target="#myModal1"><i class="fas fa-sign-in-alt"></i> الدخول </a>
                    </li>
                    ';
                    else
                        echo '
                    
                    <li class="nav-item"><a class="nav-link" href="info.php"><i class="fas fa-edit"></i> بياناتي </a>
                    <li class="nav-item"><a class="nav-link" href="process/logout.php"><i class="fas fa-sign-out-alt"></i> الخروج </a>
                    </li>';?>


                </ul>


            </form>
        </div>
    </div>
</nav>