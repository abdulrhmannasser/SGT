<?php include  "admin_header.php";
if($auth!=true) {
    echo "<script>";
    echo 'window.location.href = "admin.php"';
    echo "</script>";
}
$cnrev=mysqli_connect(Host,UN,PW,DBname);
$rsltrev=mysqli_query($cnrev,"select m.*,u.fullname from media m join users u on m.talent_id=u.id where state='pending'");
?>
<style>
    thead,tbody,tfoot,tr,td{
        width:100% !important;
        white-space:nowrap;

    }
</style>


<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container " style="">
        <div class="bg-light text-primary  rounded py-5 px-4">

            <table id="myTable" class="table table-responsive table-bordered table-hover ">
                <thead >
                <tr>
                    <th>رفض</th>
                    <th>موافقه</th>
                    <th>رابط</th>
                    <th>تاريخ الرفع</th>
                    <th>الحاله</th>
                    <th>نوع الموهبه</th>
                    <th>وصف الموهبه</th>
                    <th>اسم الموهوب</th>

                </tr>
                </thead>
                <tbody>
                <?php
                while ($arrtl=mysqli_fetch_array($rsltrev))
                {
                    ?>

                    <tr>
                        <?php $tid=$arrtl[0]?>
                        <td><a href="process/adm_talent_des.php?tid=<?php echo $tid;?>&des=2"> رفض</a></td>
                        <td><a href="process/adm_talent_des.php?tid=<?php echo $tid;?>&des=1">موافقه</a></td>
                        <td><a href="<?php if($arrtl[4]=='video')echo "video.php?mid=$arrtl[0]"; else echo "image.php?mid=$arrtl[0]"; ?>">عرض</a></td>
                        <td><?php echo $arrtl[1];?></td>
                        <td><?php if($arrtl[3]=="accepted") echo 'موافق عليه'; else if ($arrtl[3]=='refused') echo "مرفوض"; else if ($arrtl[3]=="pending")echo"تحت المراجعه" ;?></td>
                        <td><?php if($arrtl[4]=='video')echo "فيديو"; else echo "صور";?></td>
                        <td><?php  if(strlen($arrtl[2])>40)  echo substr($arrtl[2],0,35)."..."; else echo $arrtl[2];?></td>
                        <td><?php echo $arrtl[6];?></td>
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





<?php include "footer.php"?>