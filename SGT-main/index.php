<?php include "header.php"; ?>
<?php
    $cnt=mysqli_connect(Host,UN,PW,DBname);
    $cnt1=mysqli_connect(Host,UN,PW,DBname);
    $cnt11=mysqli_connect(Host,UN,PW,DBname);
    $cnt2=mysqli_connect(Host,UN,PW,DBname);
    $cnt22=mysqli_connect(Host,UN,PW,DBname);
    $cnt3=mysqli_connect(Host,UN,PW,DBname);
    $rslt=mysqli_query($cnt,"select * from talents");
    $rslt2=mysqli_query($cnt,"select * from media  order by upload_date desc limit 5");
    $rslt1=mysqli_query($cnt,"select m.*,avg(r.rate) from media m join rating r on(r.media_id=m.id) group by (r.media_id) ORDER BY  avg(r.rate)  DESC");
    $rslt3=mysqli_query($cnt,"select * from ads where state='accepted '");
    $n=$rslt->num_rows;
    $arr=mysqli_fetch_all($rslt);


?>
    <style>


        .owl-carousel img{
            height: 240px;
        }
    </style>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
                for ($i=1;$i<$n;$i++) {
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>"></li>
                    <?php
                }
                    ?>


        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $arr[0][2];?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-primary"><?php echo $arr[0][1];?> </h5>
                    <p class="text-primary"><?php echo $arr[0][3];?> </p>
                    <?php $x=$arr[0][0];?>
                    <a href='<?php echo"viewtalent.php?tid=$x" ?>' class="btn btn-outline-warning">شاهد الموهبه</a>
                </div>
            </div>
            <?php
            for ($i=1;$i<$n;$i++) {
                ?>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="<?php echo $arr[$i][2];?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-primary"><?php echo $arr[$i][1];?> </h5>
                        <p class="text-primary"><?php echo $arr[$i][3];?> </p>
                        <?php $x=$arr[$i][0];?>
                        <a href='<?php echo"viewtalent.php?tid=$x" ?>' class="btn btn-outline-warning">شاهد الموهبه</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div>
        <img class="d-block w-100" src="img\0.jpg" alt="Second slide">
    </div>


    <div class="bg-secondary text-center p-5">
        <h1>
            الأكثر تقييماَ
        </h1>
        <hr>
        <br>
        <div class="owl-carousel owl-theme pt-2">
<?php
while ($arrsearch=mysqli_fetch_array($rslt1)) {
    if($arrsearch[4]=="video")
        $rsltimg=mysqli_query($cnt1,"select video from videos where id =$arrsearch[0]");
    else if($arrsearch[4]=="images")
        $rsltimg=mysqli_query($cnt1,"select  img from images where media_id=$arrsearch[0] limit 1");

    $arrimg=mysqli_fetch_array($rsltimg);

    ?>
            <div class="item">
                <a href="<?php if($arrsearch[4]=='video')echo "video.php?mid=$arrsearch[0]"; else echo "image.php?mid=$arrsearch[0]"; ?>">
                <div class="card">
                    <!--<img class="img-fluid w-100 rounded" src="<?php echo $arrimg[0] ?>" alt="Card image">-->
                    <?php if($arrsearch[4]=='video') { ?>
                        <video width="260" height="240" >
                            <source src="<?php echo $arrimg[0]; ?>" type="video/mp4">
                            <source src="<?php echo $arrimg[0]; ?>" type="video/mkv">
                            <source src="<?php echo $arrimg[0]; ?>" type="video/avi">
                        </video>
                    <?php } else {?>
                        <img class="img-fluid w-100  img-thumbnail" src="<?php echo $arrimg[0]; ?>" alt="Card image">
                    <?php } ?>

                </div>
            </div></a>
           <?php } ?>
        </div>
    </div>
 

    <div class="bg-secondary text-center p-5">
        <h1>
		 المضافة مؤخراً
           
        </h1>
        <hr>
        <br>
        <div class="owl-carousel owl-theme">
            <?php
            while ($arrsearch=mysqli_fetch_array($rslt2)) {
                if($arrsearch[4]=="video")
                    $rsltimg=mysqli_query($cnt1,"select video from videos where id =$arrsearch[0]");
                else if($arrsearch[4]=="images")
                    $rsltimg=mysqli_query($cnt1,"select  img from images where media_id=$arrsearch[0] limit 1");

                $arrimg=mysqli_fetch_array($rsltimg);

                ?>
                <div class="item">
                    <a href="<?php if($arrsearch[4]=='video')echo "video.php?mid=$arrsearch[0]"; else echo "image.php?mid=$arrsearch[0]"; ?>">
                        <div class="card">
                            <!--<img class="img-fluid w-100 rounded" src="<?php echo $arrimg[0] ?>" alt="Card image">-->
                            <?php if($arrsearch[4]=='video') { ?>
                                <video width="260" height="240" >
                                    <source src="<?php echo $arrimg[0]; ?>" type="video/mp4">
                                    <source src="<?php echo $arrimg[0]; ?>" type="video/mkv">
                                    <source src="<?php echo $arrimg[0]; ?>" type="video/avi">
                                </video>
                            <?php } else {?>
                                <img class="img-fluid w-100  img-thumbnail" src="<?php echo $arrimg[0]; ?>" alt="Card image">
                            <?php } ?>

                        </div>
                </div></a>
            <?php } ?>
        </div>
    </div>
    <div class="bg-secondary text-center p-5">
        <h1>
           إعلانات الشركات الداعمة
        </h1>
        <hr>
        <br>
        <div class="owl-carousel owl-theme">
<?php
function escapeJavaScriptText($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}
while ($arr=mysqli_fetch_array($rslt3)) {
        $str=escapeJavaScriptText($arr[2]);
    ?>
            <div class="item">
                <div class="card">
                    <a href="#showphoto" data-toggle="modal" data-target="#showphoto">
                        <img class='img-fluid w-100 rounded' onclick="modalchange('<?php echo $str?>')" src='<?php echo $arr[2]?>' alt='Card image'>

                    </a>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
   

<?php include  "footer.php";?>