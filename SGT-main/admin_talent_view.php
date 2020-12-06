<?php include  "admin_header.php";
if($auth!=true ) {
    echo "<script>";
    echo 'window.location.href = "admin.php"';
    echo "</script>";
}
$cnrev=mysqli_connect(Host,UN,PW,DBname);
$rsltrev=mysqli_query($cnrev,"select * from  talents ");
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


            <form method="post" action="process/adm_add_talent.php" enctype="multipart/form-data">
                <h3 class="py-2 font-weight-bold">تسجيل نوع موهبه</h3>
                <hr class="py-1">

                <div class="input-group">
                    <input type="text"  class="form-control text-right" name="tname" placeholder="اسم نوع الموهبه " aria-label="Search for...">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <div class="input-group">
                    <input type="text"  class="form-control text-right" name="des" placeholder="التفاصيل " aria-label="Search for...">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <div class="input-group">
                    <input type="file"   class="form-control form-control-file text-right" name="img">
                    <span class="input-group-btn">
      </span>
                </div>
                <br>
                <button type="button" class="btn btn-success" onclick="submit()" ID="Button1">حفظ</button>
            </form>
        </div>

    <div class="col-12 bg-light text-primary  rounded py-5 px-4"  >

        <h3 class="font-weight-bold" >جدول انواع المواهب</h3>
        <hr class="py-1">

        <div class="container " style="" >

            <table id="myTable" class="table table-responsive table-bordered table-hover ">
                <thead >
                <tr>
                   <th>تغيير الحاله</th>
                    <th>تعديل</th>
                    <th>الحاله</th>
                    <th>تفاصيل</th>
                    <th>نوع الموهبه</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while ($arrtl=mysqli_fetch_array($rsltrev))
                {
                    ?>

                    <tr>
                        <?php $tid=$arrtl[0]?>
                        <td><a href="process/adm_state_talent.php?vid=<?php echo $tid;?>"><i class="fas fa-edit"></i>غير الحاله</a></td>
                        <td><a href="admin_talent_edit.php?vid=<?php echo $tid;?>"><i class="fas fa-edit"></i>تعديل</a></td>
                        <td><?php if($arrtl[4]=='0') echo 'متوقف'; else echo 'مفعل'?></td>
                        <td><?php  if(strlen($arrtl[3])>67)  echo substr($arrtl[3],0,70)."..."; else echo $arrtl[3];?></td>
                        <td><?php echo $arrtl[1];?></td>
                    </tr>

                <?php }?>

                </tbody>

            </table>


        </div>
    </div>


</div>


<script>

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>



