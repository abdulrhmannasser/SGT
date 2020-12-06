<?php

include "../dbinfo.php";
$cnc=mysqli_connect(Host,UN,PW,DBname);
$rsltc=mysqli_query($cnc,"select count(*) from ads where state='pending'");
$arrc=mysqli_fetch_array($rsltc);
$counttel=$arrc[0];
if($counttel>0)
    echo "<span class=\"badge badge-danger badge-pill\">$counttel</span>";
