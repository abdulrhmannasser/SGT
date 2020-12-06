<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_POST["tname"])&&isset($_POST["des"]))
{
    session_start();
    if($_SESSION['role']!='admin')
        header("location:../admin_talent_view.php");
    $tname = $_POST["tname"];
    $des = $_POST["des"];
    $des=mysqli_escape_string($cn,$des);
    if ($_FILES["img"]["size"] >0 )
    {
        $img_name ="../uimg/talents/" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="uimg/talents/" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["img"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "insert into talents(tname, img, description) VALUES ('$tname','$img_name1','$des');");
        echo mysqli_error($cn);
    }
    if (mysqli_error($cn)) echo mysqli_error($cn);
    else header("location:../admin_talent_view.php");
}