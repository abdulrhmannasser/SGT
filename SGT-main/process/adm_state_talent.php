<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_GET['vid']))
{
    session_start();
    if($_SESSION['role']!='admin')
        header("location:../admin_talent_view.php");
    $vid = $_GET["vid"];
    $qry = mysqli_query($cn, "call change_state('$vid')");
    if (mysqli_error($cn)) echo mysqli_error($cn);
   else header("location:../admin_talent_view.php");
}