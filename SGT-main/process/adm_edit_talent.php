<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_POST["tname"])&&isset($_POST["des"])&&$_POST['tid'])
{
    session_start();
    if($_SESSION['role']!='admin')
        header("location:../admin_talent_view.php");
    $tname = $_POST["tname"];
    $des = $_POST["des"];
    $tid=$_POST['tid'];
    $des=mysqli_escape_string($cn,$des);
    if ($_FILES["img"]["size"] >0 )
    {
        $img_name ="../uimg/talents/" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="uimg/talents/" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["img"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "update talents set tname='$tname', img='$img_name1', description='$des' where id='$tid';");
        echo mysqli_error($cn);
    }
    else $qry = mysqli_query($cn , "update talents set tname='$tname', description='$des' where id=$tid ;");
    echo mysqli_error($cn);

    if (mysqli_error($cn)) echo mysqli_error($cn);
    else header("location:../admin_talent_view.php");
}