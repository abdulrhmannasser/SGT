
    <!-- page content -->
<?php
if(isset($_GET['mid']))
    $mid=$_GET['mid'];
else{
    echo "<script>";
    echo 'window.location.href = "index.php"';
    echo "</script>";
}
$cnimg=mysqli_connect(Host,UN,PW,DBname);
$cnimgs=mysqli_connect(Host,UN,PW,DBname);
$rsltimg=mysqli_query($cnimg,"call image_details($mid)");
$arrimg=mysqli_fetch_array($rsltimg);
$rsltimgs=mysqli_query($cnimgs,"select img from images where media_id=$mid");
$arrimgs=mysqli_fetch_all($rsltimgs);
$cncom=mysqli_connect(Host,UN,PW,DBname);
$cnscom=mysqli_connect(Host,UN,PW,DBname);
$rstlscom=mysqli_query($cnscom,"select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role like 'judge'");
$rstlcom=mysqli_query($cncom,"select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role not like 'judge'");
$n=$rsltimgs->num_rows;
//var_dump($arrimgs);
if($arrimg['state']!='accepted' and $role!='admin')
{
    echo "<script>";
    echo 'window.location.href = "index.php"';
    echo "</script>";
}
?>
<style>
.paginate-pagination ul{
    background-color: #fff;
}
.paginate-pagination ul > li > a.page {
    background-color:#007bff;
    color:#fff;
}
.carousel-item img{
    height: 400px;
    object-fit:contain;
}
.owl-carousel img{
    height: 200px;
}
</style>

<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container text-center " style="position:relative;">
  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
                for($i=1;$i<$n;$i++)
                     echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
            ?>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $arrimgs[0][0] ;?>" alt="First slide">
            </div>
            <?php
            for($i=1;$i<$n;$i++)
            {
                ?>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo $arrimgs[$i][0] ;?>" alt="First slide">
                </div>
            <?php }?>
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



        <div class="owl-carousel owl-theme pt-2">
            <?php
            for($i=0;$i<$n;$i++)
            {
            ?>
            <div class="item">
                    <img class="img-fluid w-100  img-thumbnail" src="<?php echo $arrimgs[$i][0] ;?>" alt="Card image">
            </div>
            <?php }?>

        </div>





        <div class="bg-light text-primary text-right rounded p-4 my-3">
            <div class="media">
                <div class="media-body">
                    <h2 class="py-2 "><?php echo $arrimg[3] ?></h2>
                    <p class="font-weight-bold"><?php echo $arrimg[4] ?></p>
                    <input id="rating-system" type="number" <?php if($login!=0) echo 'onchange="rate()"';?> class="rating" VALUE="<?php echo $arrimg[5] ?>" min="0" max="100" step="1">
                    <br><br>
                    <div id="ratemes"></div>
                    <p class=""><?php echo $arrimg[1] ?> </p>
                    <p class="text-muted"><?php echo $arrimg[0] ?></p>
                </div>
                <a href="#"><img class="ml-3" src="<?php echo $arrimg[2] ?>" width="60px" height="60px" alt="Generic placeholder image"></a>
            </div>
        </div>
        
<script src='https://vjs.zencdn.net/7.4.1/video.js'></script>


