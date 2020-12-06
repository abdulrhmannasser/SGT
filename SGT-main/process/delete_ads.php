<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_GET['aid']))
{
    session_start();
    $aid=$_GET['aid'];
    $qry = mysqli_query($cn, "select ads_id from ads where id='$aid'");
    $arr=mysqli_fetch_array($qry);
    if($_SESSION['uid']!=$arr[0])
        header("location:../index.php");

    mysqli_query($cn, "delete from ads  where id='$aid'");
    if (mysqli_error($cn)) echo mysqli_error($cn);
    else header("location:../upload_ads.php");
}