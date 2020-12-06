<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_POST["urole"]!='talent'&&isset($_POST["fn"])&&isset($_POST["pw"])&&isset($_POST["un"]))
{
    $fname=$_POST["fn"];
    $pw=$_POST["pw"];
    $uname=$_POST["un"];
    $uid=$_POST['uid'];
    $pw=mysqli_real_escape_string($cn,$pw);
    $fname=mysqli_real_escape_string($cn,$fname);
    $uname=mysqli_real_escape_string($cn,$uname);
    $qry=mysqli_query($cn,"update users set fullname='$fname',username='$uname',pass='$pw' where id='$uid'");

    if( mysqli_error($cn)) $_SESSION['error']='حدث خطا في تعديل البيانات' ;
    else  $_SESSION['suc']='تم تعديل البيانات بنجاح';
        header("location:../info.php");
}
else if($_POST["urole"]=='talent'&&isset($_POST["fn"])&&isset($_POST["pw"])&&isset($_POST["un"])&&isset($_POST["mob"])&&isset($_POST["adr"])&&isset($_POST["em"])&&isset($_POST["bio"]))
{
    $uid=$_POST['uid'];
    $fname=$_POST["fn"];
    $pw=$_POST["pw"];
    $uname=$_POST["un"];
    $mob=$_POST["mob"];
    $address=$_POST["adr"];
    $talent_id=$_POST['tid'];
    $bio=$_POST['bio'];
    $em=$_POST['em'];
    $uname=mysqli_real_escape_string($cn,$uname);
    $pw=mysqli_real_escape_string($cn,$pw);
    $fname=mysqli_real_escape_string($cn,$fname);
    $mob=mysqli_real_escape_string($cn,$mob);
    $address=mysqli_real_escape_string($cn,$address);
    $talent_id=mysqli_real_escape_string($cn,$talent_id);
    $bio=mysqli_real_escape_string($cn,$bio);
    $em=mysqli_real_escape_string($cn,$em);
    mysqli_query($cn,"update users set fullname='$fname',username='$uname',pass='$pw' where id='$uid'");
    mysqli_query($cn,"update talented set mobile='$mob',address='$address',talent_cat_id='$talent_id',email='$em',bio='$bio' where id='$uid'");

    if (isset($_FILES["img"]) and $_FILES["img"]["size"] >0 )
    {

        $img_name ="../uimg/users/$uname" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="uimg/users/$uname" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["img"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "update talented set img='$img_name1' where id='$uid';");

        echo mysqli_error($cn);
    }
    if( mysqli_error($cn)) $_SESSION['error']='حدث خطا في تعديل البيانات' ;

   else  $_SESSION['suc']='تم تعديل البيانات بنجاح';

  //     header("location:../info.php");

}
else echo  header("location:../info.php?error=invalid");
