<?php include  "header.php";?>
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

        <?php if ($role=='admin') echo' <a class="btn btn-success" href="adm_talent_rev.php">الرجوع الي المراجعه</a> ';?>
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
                    <a href="viewtalented.php?tid=<?php echo $arrimg[7]?>">
                    <h2 class="py-2 "><?php echo $arrimg[3] ?></h2></a>
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
        <?php if($login!=0)
            echo '
<div class="bg-light text-primary text-right rounded p-4 my-3">
    <h3 class="py-2 font-weight-bold">أترك لنا تعليقك</h3>
    <hr class="py-1">
    <form id="foo">
    <div class="input-group">
    
      <input type="text"  name="comment" required class="form-control text-right" placeholder="أكتب تعليقك هنا" aria-label="Search for...">
      <input type="hidden"  value="'.$login.'" name="uid" >
      <input type="hidden"  value="'.$mid.'" name="mid">
       <input type="hidden"  value="لقد علق '.$arruser[1].' علي موهبتك"  name="com">

      <span class="input-group-btn">
        <input class="btn btn-secondary" type="submit" value="أرسل"/>
      </span>
    </div>
    </form>
    <div id="response"></div>

</div>';?>




        <div class="bg-light text-primary text-right rounded p-4 my-3">
            <h1 class="py-2 font-weight-bold">التعليقات</h1>
            <hr class="py-1">
            <div id="comments">


                <?php
                while ($arrcom=mysqli_fetch_array($rstlscom))
                {
                    ?>
                    <div class="media mb-3">
                        <div class="media-body" style="border-bottom:1px solid rgba(0,0,0,.1);">
                            <h4 class=""><i class="fas fa-star"></i><?php echo $arrcom[1] ?></h4>

                            <p class=""><?php echo $arrcom[0] ?> </p>
                            <p class="text-muted"><?php echo $arrcom[2] ?></p>
                        </div>
                        <a href="#"><img class="ml-3" src="img/profile.png" width="30px" height="30px" alt="Generic placeholder image"></a>
                        <hr class="py-1">
                    </div>
                <?php } ?>
                <?php
                while ($arrcom=mysqli_fetch_array($rstlcom))
                {
                    ?>
                    <div class="media mb-3">
                        <div class="media-body" style="border-bottom:1px solid rgba(0,0,0,.1);">
                            <h4 class=""><?php echo $arrcom[1] ?></h4>

                            <p class=""><?php echo $arrcom[0] ?> </p>
                            <p class="text-muted"><?php echo $arrcom[2] ?></p>
                        </div>
                        <a href="#"><img class="ml-3" src="img/profile.png" width="30px" height="30px" alt="Generic placeholder image"></a>
                        <hr class="py-1">
                    </div>
                <?php } ?>


            </div>

        </div>
    </div>
</div>

    <script>
        $(document).ready(function(){
            $('#foo').submit(function(){
                $('#response').html("<b>جاري التحميل</b>");
                $.ajax({
                    type: 'POST',
                    url: 'process/comment_media.php',
                    data: $(this).serialize()
                })
                    .done(function(data){
                        $('#response').html(data);

                    })
                    .fail(function() {
                        alert( "فشل التعليق" );

                    });
                return false;

            });
        });
    </script>
    <script>
        uid=<?php echo $login;?>;
        mid=<?php echo $mid;?>;

        function rate()
        {
            debugger;
            str=$("#rating-system").val();
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ratemes").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "process/rate_media.php?rate=" + str+"&uid="+uid+"&mid="+mid, true);
                xmlhttp.send();
            }
        }


    </script>

<script>
$('#comments').paginate({
    scope: $('.media'),
    perPage:2,
});

$('.rating').rating({
            theme: 'krajee-fa',
            filledStar: '<i class="fas fa-star"></i>',
            emptyStar: '<i class="far fa-star"></i>',
            size: 'sm',
            stars: 5,
            showCaption: false,
            rtl: true,


        });

</script>
<script src='https://vjs.zencdn.net/7.4.1/video.js'></script>


<?php include  "footer.php";?>