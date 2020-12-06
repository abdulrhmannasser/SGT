<?php
include  "admin_header.php";
if($auth!=true or !isset($_GET['vid'])) {
    echo "<script>";
    echo 'window.location.href = "admin.php"';
    echo "</script>";
}
$vid=$_GET['vid'];
$cnj=mysqli_connect(Host,UN,PW,DBname);
$rsltj=mysqli_query($cnj,"select * from users where id=$vid");
$arrj=mysqli_fetch_array($rsltj);
?>
    <!-- page content -->


    <style>
    </style>
    <div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
        <div class="container text-center " style="position:relative;">
            <div class="row px-2">
                <div class="col-md">

                </div>

                <div class="col-md bg-light text-primary text-center rounded p-4 my-3 w-md-50 ">
                    <form method="post" action="process/adm_edit_judge.php">
                    <h3 class="py-2 font-weight-bold">تعديل بيانات الحكم </h3>
                    <hr class="py-1">
                        <input type="hidden" name="vid" value="<?php echo $vid;?>">
                    <div class="input-group">
                        <input type="text"  class="form-control text-right"  value="<?php echo $arrj[1];?>" name="fname" placeholder="اسم الحكم كامل " aria-label="Search for...">
                        <span class="input-group-btn">
      </span>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text"  class="form-control text-right" value="<?php echo $arrj[2];?>" name="uname" placeholder="اسم المستخدم " aria-label="Search for...">
                        <span class="input-group-btn">
      </span>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="password"  class="form-control text-right" value="<?php echo $arrj[3];?>" name="pw"  placeholder="كلمه المرور " aria-label="Search for...">
                        <span class="input-group-btn">
      </span>
                    </div>
                    <br>
                    <button type="button" class="btn btn-success" onclick="submit()" ID="Button1">تعديل</button>
                </form>

                </div>

                <div class="col-md">

                </div>
            </div>
        </div>
    </div>


<?php include  "footer.php";?>