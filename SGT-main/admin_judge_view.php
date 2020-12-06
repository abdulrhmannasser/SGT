<?php include  "admin_header.php";
if($auth!=true ) {
    echo "<script>";
    echo 'window.location.href = "admin.php"';
    echo "</script>";
}
$cnrev=mysqli_connect(Host,UN,PW,DBname);
$rsltrev=mysqli_query($cnrev,"select * from  users where role='judge'");
?>
<style>
    thead,tbody,tfoot,tr,td{
        width:100% !important;
        white-space:nowrap;

    }
</style>
<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container text-right " style="position:relative;">
        <div class="col-12 bg-light text-primary text-right rounded p-4 my-3 w-md-50 ">


            <form method="post" action="process/adm_add_judge.php">
                <h3 class="py-2 font-weight-bold">تسجيل الحكم جديد</h3>
                <hr class="py-1">

                <div class="input-group">
                    <input type="text"  class="form-control text-right" name="fname" placeholder="اسم الحكم كامل " aria-label="Search for...">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <div class="input-group">
                    <input type="text"  class="form-control text-right" name="uname" placeholder="اسم المستخدم " aria-label="Search for...">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <div class="input-group">
                    <input type="password"  class="form-control text-right" name="pw"  placeholder="كلمه المرور " aria-label="Search for...">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <button type="button" class="btn btn-success" onclick="submit()" ID="Button1">حفظ</button>
            </form>

</div>
<!--<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">-->
        <div class="col-12 bg-light text-primary  rounded py-5 px-4">

            <h3 class="font-weight-bold">جدول الحكام</h3>
            <hr class="py-1">

        <div class="container " style="">

            <table id="myTable" class="table table-responsive table-bordered table-hover ">
                <thead >
                <tr>
<!--                    <th>حذف</th>-->
                    <th>تعديل</th>
                    <th>كلمه المرور</th>
                    <th>اسم الدخول</th>
                    <th>اسم الحكم بالكامل</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while ($arrtl=mysqli_fetch_array($rsltrev))
                {
                    ?>

                    <tr>
                        <?php $tid=$arrtl[0]?>
                    <!--    <td><a href="process/adm_delete_judge.php?vid=<?php echo $tid;?>"><i class="fas fa-times"></i> جذف</a></td>-->
                        <td><a href="admin_judge_edit.php?vid=<?php echo $tid;?>"><i class="fas fa-edit"></i>تعديل</a></td>
                        <td><?php echo $arrtl[3];?></td>
                        <td><?php echo $arrtl[2];?></td>
                        <td><?php echo $arrtl[1];?></td>


                    </tr>

                <?php }?>

                </tbody>

            </table>


        </div>
    </div>


</div>
</div>

<script>

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>


