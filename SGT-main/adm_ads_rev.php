<?php include  "admin_header.php";
if($auth!=true) {
    echo "<script>";
    echo 'window.location.href = "admin.php"';
    echo "</script>";
}
$cnrev=mysqli_connect(Host,UN,PW,DBname);
$rsltrev=mysqli_query($cnrev,"select m.*,u.fullname from ads m join users u on m.ads_id=u.id where state!='accepted'");
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
                    <th>عرض</th>
                    <th>الحاله</th>
                    <th>نوع الموهبه</th>
                    <th>وصف الموهبه</th>
                    <th>اسم الموهوب</th>

                </tr>
                </thead>
                <tbody>
                <?php
                function escapeJavaScriptText($string)
                {
                    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
                }
                while ($arrtl=mysqli_fetch_array($rsltrev))
                {
                    $str=escapeJavaScriptText($arrtl[2]);
                    ?>

                    <tr>
                        <?php $tid=$arrtl[0]?>
                        <td><a href="process/adm_ads_des.php?tid=<?php echo $tid;?>&des=2"> رفض</a></td>
                        <td><a href="process/adm_ads_des.php?tid=<?php echo $tid;?>&des=1">موافقه</a></td>
                        <td> <a onclick="modalchange('<?php echo $str?>')" href="#showphoto" data-toggle="modal" data-target="#showphoto">عرض</a></td>
                        <td><?php echo $arrtl[1];?></td>
                        <td><?php if($arrtl[3]=="accepted") echo 'موافق عليه'; else if ($arrtl[3]=='refused') echo "مرفوض"; else if ($arrtl[3]=="pending")echo"تحت المراجعه" ;?></td>
                        <td><?php  if(strlen($arrtl[4])>40)  echo substr($arrtl[4],0,35)."..."; else echo $arrtl[4];?></td>
                        <td><?php echo $arrtl[5];?></td>
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


<?php include  "footer.php";?>

