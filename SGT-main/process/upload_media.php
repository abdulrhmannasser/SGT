<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
echo '1<br>';
if($_POST["uploadtype"]==1&&isset($_POST["desc"])&&isset($_POST['tid']))
{
    //video
    echo '2<br>';
    $desc=$_POST["desc"];
    $tid=$_POST["tid"];
    $desc=mysqli_real_escape_string($cn,$desc);


    if ($_FILES["file1"]["size"] >0 )
    {
        $img_name ="../video/$tid" . date("Ymdhis").".".pathinfo($_FILES["file1"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="video/$tid" . date("Ymdhis").".".pathinfo($_FILES["file1"]["name"],PATHINFO_EXTENSION  );
        $thumb="video/$tid".date("Ymdhis").".png";
        move_uploaded_file($_FILES["file1"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "call upload_video('$tid','$desc','$img_name1');");
        echo mysqli_error($cn);
        echo '<br>3<br>';
    }
    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    else  header("location:../upload.php");
}
elseif($_POST["uploadtype"]==2&&isset($_POST["desc"])&&isset($_POST['tid']))
{
    //images
    echo '2<br>';
    $desc=$_POST["desc"];
    $tid=$_POST["tid"];
    $desc=mysqli_real_escape_string($cn,$desc);

    mysqli_query($cn,"call upload_image('$tid','$desc');");
    $qry2=mysqli_query($cn,"select LAST_INSERT_ID()");
    $arr2= mysqli_fetch_array($qry2);
    $last_id =$arr2[0];
    $count=0;
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
    {
        $count++;
        $file_name ="../uimg/talents/$count".date("Ymdhis").".".pathinfo($_FILES["files"]["name"][$key],PATHINFO_EXTENSION  );
        $file_name1 ="uimg/talents/$count".date("Ymdhis").".".pathinfo($_FILES["files"]["name"][$key],PATHINFO_EXTENSION  );
        echo $file_name1."<br>";
        move_uploaded_file($_FILES["files"]["tmp_name"][$key],$file_name);
        $qry1=mysqli_query($cn,"call new_img ('$file_name1','$last_id')");
    }

    if( mysqli_error($cn)) echo mysqli_error($cn) ;
    else  header("location:../upload.php");


}
//else echo  header("location:../index.php?error=invalid");
