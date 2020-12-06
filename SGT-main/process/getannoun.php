<?php

include "../dbinfo.php";
$q=$_GET['q'];

$cn=mysqli_connect(Host,UN,PW,DBname);
$rslt=mysqli_query($cn,"call userannouncement($q)");
if($rslt->num_rows!=null)
    {
    while ($arr = mysqli_fetch_array($rslt)) {
        $cont = $arr[1];
        if($arr[4]=='video')echo "<a href='javascript:viewvideo($arr[3],$arr[0])'>"; else echo "<a href='javascript:viewimage($arr[3],$arr[0])'>";
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        if ($arr[2] == 1)
            echo '<i class="fas fa-envelope-open text-success mr-3"></i>';
        else echo '<i class="fas fa-envelope text-danger mr-3"></i>';
        echo $cont . '</a>';
    }
}
    else echo 'No announcment yet';
?>