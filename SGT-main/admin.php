<?php include  "admin_header.php";
if($auth==true) {
    echo "<script>";
    echo 'window.location.href = "adm_talent_rev.php"';
    echo "</script>";
}

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
    <h3 class="py-2 font-weight-bold">تسجيل دخول المدير</h3>
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
          <form method="post" action="process/adm_login_proc.php">
    <div class="input-group">
      <input type="text"  class="form-control text-right" name="un" placeholder="أسم المستخدم" aria-label="Search for...">
      <span class="input-group-btn">
      </span>
    </div>
<br>
    <div class="input-group">
      <input type="password"  class="form-control text-right" name="pw" placeholder="كلمة المرورٍ" aria-label="Search for...">
      <span class="input-group-btn">
      </span>
    </div>
    <br>
    <button type="button" onclick="submit()" class="btn btn-success" ID="Button1">دخول</button>
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