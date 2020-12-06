<?php
if(isset($_GET['mid'])) {
    include "../dbinfo.php";
    $t=0;
    $mid=$_GET['mid'];

    $cncom=mysqli_connect(Host,UN,PW,DBname);
    $cnscom=mysqli_connect(Host,UN,PW,DBname);
    $rstlscom = mysqli_query($cnscom, "select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role like 'judge'");
    $rstlcom = mysqli_query($cncom, "select c.message,u.fullname,c.comment_date from comments c join users u on(c.ffrom=u.id) where media_id=$mid and role not like 'judge'");

                while ($arrcom=mysqli_fetch_array($rstlscom))
                {

                $t=1;
                    echo'
                    <div class="media mb-3">
                        <div class="media-body" style="border-bottom:1px solid rgba(0,0,0,.1);">
                            <h4 class=""><i class="fas fa-star"></i> '.$arrcom[1].' </h4>

                            <p class="">'.$arrcom[0].' </p>
                            <p class="text-muted">'.$arrcom[2].'</p>
                        </div>
                        <a href="#"><img class="ml-3" src="img/profile.png" width="30px" height="30px" alt="Generic placeholder image"></a>
                        <hr class="py-1">
                    </div>';
                }

while ($arrcom=mysqli_fetch_array($rstlcom))
{
    $t=1;
    echo'
    <div class="media mb-3">
        <div class="media-body" style="border-bottom:1px solid rgba(0,0,0,.1);">
            <h4 class="">'.$arrcom[1].'</h4>

            <p class="">'.$arrcom[0].' </p>
            <p class="text-muted">'.$arrcom[2].'</p>
        </div>
        <a href="#"><img class="ml-3" src="img/profile.png" width="30px" height="30px" alt="Generic placeholder image"></a>
        <hr class="py-1">
    </div>';
 }
if($t==0)
    echo 'لا يوجد تعليلاق';


}