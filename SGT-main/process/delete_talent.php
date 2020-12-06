<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_GET['mid']))
{
    session_start();

    $vid = $_GET["mid"];
    $qry = mysqli_query($cn, "update media set state='deleted'  where id='$vid'");
    if (mysqli_error($cn)) echo mysqli_error($cn);
    else header("location:../upload.php");
}