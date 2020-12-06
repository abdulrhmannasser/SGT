<?php include  "header.php";?>
<!-- page content -->
<?php
if(isset($_GET['mid']))
    $mid=$_GET['mid'];
else {
    echo "<script>";
    echo 'window.location.href = "index.php"';
    echo "</script>";
}

$cnvideo=mysqli_connect(Host,UN,PW,DBname);
$cncom=mysqli_connect(Host,UN,PW,DBname);
$cnscom=mysqli_connect(Host,UN,PW,DBname);
    $rsltvideo=mysqli_query($cnvideo,"call video_details($mid)");
$rstlscom=mysqli_query($cnscom,"select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role like 'judge'");
$rstlcom=mysqli_query($cncom,"select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role not like 'judge'");
$arrvideo=mysqli_fetch_array($rsltvideo);
if($arrvideo['state']!='accepted' and $role!='admin')
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

</style>
<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container text-center " style="position:relative;">

      <?php if ($role=='admin') echo' <a class="btn btn-success" href="adm_talent_rev.php">الرجوع الي المراجعه</a> ';?>

        <video id='my-video' class='video-js' controls preload='auto' width='640' height='264'
  
   data-setup='{ "aspectRatio":"640:267", "playbackRates": [1,0.5, 1.5, 2] }'>
    <source src='<?php echo $arrvideo[2] ?>' type='video/mp4'>

    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
    </p>
  </video>

  <div class="bg-light text-primary text-right rounded p-4 my-3">    
    <div class="media">
        <div class="media-body">
            <a href="viewtalented.php?tid=<?php echo $arrvideo[8]?>">
                <h2 class="py-2 "><?php echo $arrvideo[4] ?></h2></a>
            <p class="font-weight-bold"><?php echo $arrvideo[5] ?></p>

            <input id="rating-system" type="number" <?php if($login!=0) echo 'onchange="rate()"';else echo 'onchange="rateerror('.$arrvideo[6] .')"';?> class="rating" VALUE="<?php echo $arrvideo[6] ?>" min="0" max="100" step="1">
            <br><br>
            <div id="ratemes"></div>
            <p class=""><?php echo $arrvideo[1] ?> </p>
            <p class="text-muted"><?php echo $arrvideo[0] ?></p>
        </div>
        <a href="#"><img class="ml-3" src="<?php echo $arrvideo[3] ?>" width="60px" height="60px" alt="Generic placeholder image"></a>
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
    function rateerror(n) {
        debugger
        var elem=document.getElementById("ratemes");

        s='<div class="alert alert-warning" role="alert">';
        s +='عذرا يجب تسجيل الدخول للتسجيل';
        s +=  '</div>';
        elem.innerHTML= s;
        x=parseFloat(n);
        $("#rating-system").val(x);

    }
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