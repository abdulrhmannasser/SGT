<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(isset($_GET["uid"])&&isset($_GET["mid"])&&isset($_GET["rate"]))
{
    $uid=$_GET["uid"];
    $mid=$_GET["mid"];
    $rate=$_GET["rate"];
    $qry=mysqli_query($cn,"call rate_media('$mid','$uid','$rate')");
    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    echo "<div class=\"alert alert-success\" role=\"alert\">
  تم التقييم بنجاح
</div>";
}