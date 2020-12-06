<?php include  "header.php";
if($login<1) {
    echo "<script>";
    echo 'window.location.href = "index.php"';
    echo "</script>";
}

$cninfo=mysqli_connect(Host,UN,PW,DBname);
if($role=='talent') {
        $rsltinfo=mysqli_query($cninfo,"select * from users u join talented t on (u.id=t.id) where u.id=$login");
    }
else{
    $rsltinfo=mysqli_query($cninfo,"select * from users where  id=$login");
}
$user=mysqli_fetch_array($rsltinfo);
?>
<!-- page content -->


<style>

</style>

<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container text-center " style="position:relative;">
  <div class="row px-2">
      <div class="col-md">
    
      </div>

      <div class="col-md-6 bg-light text-primary text-center rounded p-4 my-3 w-md-50 ">
    <h3 class="py-2 font-weight-bold">تعديل بيانات </h3>
    <hr class="py-1">
          <?php
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          if(isset($_SESSION['error'])) {
              echo '
                    <div class="alert alert-danger" role="alert">
                        ' . $_SESSION['error'] . '
                    </div> ';
              unset($_SESSION['error']);
          }
          ?>
          <?php
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          if(isset($_SESSION['suc'])) {
              echo '
                    <div class="alert alert-success" role="alert">
                        ' . $_SESSION['suc'] . '
                    </div> ';
              unset($_SESSION['suc']);
          }
          ?>
          <form method="post" action="process/edit_info.php" enctype="multipart/form-data">

          <div class="text-center mb-3">
 <?php if($role=='talent') echo '<img src="'.$user[8].'"class="Responsive image img-thumbnail rounded-circle" style="height:300px!important;width:300px!important;" alt="..."> ';?>
</div>


    <div class="input-group mb-2">
        <input type="hidden"  value="<?php echo $user[0]?>" name="uid">
        <input type="hidden"  value="<?php echo $user[4]?>" name="urole">
      <input type="text"  class="form-control text-right" dir="ltr" name="fn" placeholder="أسم بالكامل" value="<?php echo $user[1] ?>" aria-label="Search for...">
      <span class="input-group-btn">
      </span>
    </div>
              <div class="input-group mb-2">
      <input type="text"  class="form-control text-right" dir="ltr" name="un" placeholder="أسم المستخدم" value="<?php echo $user[2] ?>" aria-label="Search for...">
      <span class="input-group-btn">
      </span>
    </div>
    <div class="input-group  mb-2">
      <input type="password"  class="form-control text-right" dir="ltr" name="pw" placeholder="كلمة المرورٍ" value="<?php echo $user[3] ?>" aria-label="Search for...">
      <span class="input-group-btn">
      </span>
    </div>
              <?php if($role=='talent'){?>
                  <div class="input-group pb-1" dir="rtl">
                            <span class="input-group-addon" id="basic-addon1"><span
                                        class="glyphicon glyphicon-user"></span></span>
                      <input class="form-control" name="adr" aria-describedby="basic-addon1" ID="name"
                             placeholder="العنوان" AutoCompleteType="None" autofocus requiredtype="text"  value="<?php echo $user[7] ?>" />
                  </div>


                  <div class="input-group pb-1"dir="rtl">
                      <input class="form-control" name="mob" aria-describedby="basic-addon2" ID="loginusername"
                             TextMode="Password" dir="rtl" placeholder="رقم الهاتف" AutoCompleteType="None" required  value="<?php echo $user[6] ?>"
                             type="text" />
                      <span class="input-group-addon" id="basic-addon2"><span
                                  class="glyphicon glyphicon-lock"></span></span>
                  </div>


                  <div class="input-group pb-1"dir="rtl">
                      <input class="form-control" name="em" aria-describedby="basic-addon2" ID="loginusername"
                             TextMode="Password" dir="rtl" placeholder="البريد الاليكتروني" email AutoCompleteType="None" required  value="<?php echo $user[10] ?>"
                             type="text" />
                      <span class="input-group-addon" id="basic-addon2"><span
                                  class="glyphicon glyphicon-lock"></span></span>
                  </div>


                  <div class="input-group pb-1"dir="rtl">
                      <input class="form-control" name="bio" aria-describedby="basic-addon2" ID="loginusername"
                             TextMode="Password" dir="rtl" placeholder="السيره الذاتيه" AutoCompleteType="None" required  value="<?php echo $user[11] ?>"
                             type="text" />
                      <span class="input-group-addon" id="basic-addon2"><span
                                  class="glyphicon glyphicon-lock"></span></span>
                  </div>

                  <div class="form-group row pb-1"dir="rtl">
                      <label for="staticEmail" class="col-sm-3 col-form-label text-right">نوع الموهبة</label>
                      <div class="col-sm-9">
                          <select id="inputState" name="tid" class="form-control">
                              <option  value="-1">اختر نوع موهبتك</option>
                              <?php
                              $cntallist1=mysqli_connect(Host,UN,PW,DBname);
                              $rslttallist=mysqli_query($cntallist1,"select * from talents where active='1'");
                              while ($arrtallist=mysqli_fetch_array($rslttallist)) {
                                  echo "<option ";
                                  if($user[9]==$arrtallist[0]) echo " selected ";
                                  echo "value='$arrtallist[0]'>$arrtallist[1] </option>";
                              }
                              ?>
                          </select>
                      </div>
                  </div>

                  <div class="form-group row pb-1"dir="rtl">
                      <label for="staticEmail" class="col-sm-3 col-form-label text-right">أرفع صورة </label>
                      <div class="col-sm-9">
                          <input type="file" name="img" id="img" class="form-control-file" id="exampleFormControlFile1" >
                      </div>
                  </div>
              <?php }?>
    <button type="button" onclick="submit()" class="btn btn-success" ID="Button1">حفظ</button>
          </form>

</div>

      <div class="col-md">
      
      </div>
  </div>






    </div>
</div>


<script>
</script>

<?php include "footer.php"?>