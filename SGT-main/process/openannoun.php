<?php

include "../dbinfo.php";
$q=$_GET['q'];
$a=$_GET['a'];

$cn=mysqli_connect(Host,UN,PW,DBname);
$rslt=mysqli_query($cn,"update user_notification set is_opened=1 where id=$a and user_id=$q");

?>