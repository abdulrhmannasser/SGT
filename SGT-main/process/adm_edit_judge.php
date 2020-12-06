<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_POST["fname"])&&isset($_POST["uname"])&&$_POST['pw']&&$_POST['vid'])
{
    session_start();
    if($_SESSION['role']!='admin')
        header("location:../admin_judge_view.php");
    $fname = $_POST["fname"];
    $uname = $_POST["uname"];
    $pw = $_POST["pw"];
    $vid = $_POST["vid"];
    $qry = mysqli_query($cn, "update users set fullname='$fname',username='$uname',pass='$pw' where id=$vid");
    if (mysqli_error($cn)) echo mysqli_error($cn);
    else header("location:../admin_judge_view.php");
}