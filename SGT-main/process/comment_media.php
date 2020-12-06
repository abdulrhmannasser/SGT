<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
$cn1=mysqli_connect(Host,UN,PW,DBname);
if(isset($_POST["uid"])&&isset($_POST["mid"])&&isset($_POST["comment"]))
{
    $uid=$_POST["uid"];
    $mid=$_POST["mid"];
    $comment=$_POST["comment"];

    $uid=mysqli_real_escape_string($cn,$uid);
    $mid=mysqli_real_escape_string($cn,$mid);
    $comment=mysqli_real_escape_string($cn,$comment);
    $qry=mysqli_query($cn,"insert into comments (message, ffrom, media_id) values ('$comment','$uid','$mid')");
    $qry1=mysqli_query($cn1,"select * from users where id='$uid'");
    $arr=mysqli_fetch_array($qry1);
    if($arr['role']=='judge')
    {
        $com=$_POST['com'];
        mysqli_query($cn1,"call judge_comment('$mid','$com')");

    }
    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    else echo "<div class=\"alert alert-success\" role=\"alert\">
  تم التعليق بنجاح
</div>";
        // header("location:../index.php");
}