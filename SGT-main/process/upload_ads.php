<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
echo '1<br>';
if(isset($_POST["desc"])&&isset($_POST['tid']))
{
    //video
    echo '2<br>';
    $desc=$_POST["desc"];
    $tid=$_POST["tid"];
    $desc=mysqli_real_escape_string($cn,$desc);


    if ($_FILES["file1"]["size"] >0 )
    {
        $img_name ="../uimg/$tid" . date("Ymdhis").".".pathinfo($_FILES["file1"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="uimg/$tid" . date("Ymdhis").".".pathinfo($_FILES["file1"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["file1"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "insert into ads (ads_id, img, state, descr) values ('$tid','$img_name1','pending','$desc');");
        echo mysqli_error($cn);
        echo '<br>3<br>';
    }
    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    else  header("location:../upload_ads.php");
}
//else echo  header("location:../index.php?error=invalid");
