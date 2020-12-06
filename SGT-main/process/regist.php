<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if($_POST["usertype"]==1&&isset($_POST["uname"])&&isset($_POST["pass"])&&isset($_POST["fname"])&&isset($_POST["cpass"]))
{
    $fname=$_POST["fname"];
    $pw=$_POST["pass"];
    $uname=$_POST["uname"];
    $cpw=$_POST['cpass'];
    if($pw==$cpw) {
        $pw = mysqli_real_escape_string($cn, $pw);
        $fname = mysqli_real_escape_string($cn, $fname);
        $uname = mysqli_real_escape_string($cn, $uname);
        $qry = mysqli_query($cn, "call registerusers('$fname','$uname','$pw','audience')");
        $lid=mysqli_fetch_array($qry);
        if (mysqli_error($cn)) echo mysqli_error($cn);

        else
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION["uid"]=$lid[0];
            $_SESSION["role"]='audience';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
    else         header('Location: ' . $_SERVER['HTTP_REFERER']);


}
else if($_POST["usertype"]==3&&isset($_POST["uname"])&&isset($_POST["pass"])&&isset($_POST["fname"])&&isset($_POST["cpass"]))
{
    $fname=$_POST["fname"];
    $pw=$_POST["pass"];
    $uname=$_POST["uname"];
    $cpw=$_POST['cpass'];
    if($pw==$cpw) {
    $pw=mysqli_real_escape_string($cn,$pw);
    $fname=mysqli_real_escape_string($cn,$fname);
    $uname=mysqli_real_escape_string($cn,$uname);
    $qry=mysqli_query($cn,"call registerusers('$fname','$uname','$pw','advertiser')");
        $lid=mysqli_fetch_array($qry);

    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    else     {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["uid"]=$lid[0];
        $_SESSION["role"]='advertiser';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    }
    else         header('Location: ' . $_SERVER['HTTP_REFERER']);


}
else if($_POST["usertype"]==2&&isset($_POST["uname"])&&isset($_POST["pass"])&&isset($_POST["fname"])&&isset($_POST["mob"])&&isset($_POST["adr"])&&isset($_POST["cpass"])&&isset($_POST["bio"])&&isset($_POST["em"]))
{
    $fname=$_POST["fname"];
    $pw=$_POST["pass"];
    $uname=$_POST["uname"];
    $mob=$_POST["mob"];
    $address=$_POST["adr"];
    $talent_id=$_POST['tid'];
    $em=$_POST['em'];
    $bio=$_POST['bio'];
    $cpw=$_POST['cpass'];
    if($pw==$cpw) {
        $uname = mysqli_real_escape_string($cn, $uname);
        $pw = mysqli_real_escape_string($cn, $pw);
        $fname = mysqli_real_escape_string($cn, $fname);
        $mob = mysqli_real_escape_string($cn, $mob);
        $address = mysqli_real_escape_string($cn, $address);
        $talent_id = mysqli_real_escape_string($cn, $talent_id);
        $em = mysqli_real_escape_string($cn, $em);
        $bio = mysqli_real_escape_string($cn, $bio);

        if ($_FILES["img"]["size"] > 0) {
            $img_name = "../uimg/users/$uname" . date("Ymdhis") . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            $img_name1 = "uimg/users/$uname" . date("Ymdhis") . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["img"]["tmp_name"], $img_name);
            $qry = mysqli_query($cn, "call registertalent('$fname','$uname','$pw','$mob','$address','$img_name1','$talent_id','$em','$bio');");
            $lid=mysqli_fetch_array($qry);

            echo mysqli_error($cn);
        }
        if (mysqli_error($cn)) echo mysqli_error($cn);
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["uid"]=$lid[0];
            $_SESSION["role"]='talent';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
  else  header('Location: ' . $_SERVER['HTTP_REFERER']);

}
else echo  header("location:../index.php?error=invalid");
