<?php include  "header.php";?>
<!-- page content -->
<?php

    if($login==0 || $role!="advertiser") {
        echo "<script>";
        echo 'window.location.href = "index.php"';
        echo "</script>";
    }

    $cntl=mysqli_connect(Host,UN,PW,DBname);
    $rstltl=mysqli_query($cntl,"select * from ads where ads_id=$login");

?>

<style>
thead,tbody,tfoot,tr,td{
  width:100% !important;
white-space:nowrap;

}
</style>
<div class="border border-secondary border-top-0" style="background-color:#2a81c9;padding-top:100px;padding-bottom:50px;">
    <div class="container text-right " style="position:relative;">
  <div class="row px-2">
      

      <div class="col-12 bg-light text-primary text-right rounded p-4 my-3 w-md-50 ">
    <h3 class="py-2 font-weight-bold">ارفع اعلانك </h3>
    <hr class="py-1">
 

    <form  method="post" action="process/upload_ads.php" enctype="multipart/form-data">
        <input type="hidden" name="tid" value="<?php echo $login?>"/>


        <div class="form-group row pb-1" id="viddiv">
                            <div class="col-sm-9">
                                    <input type="file" class="form-control-file" name="file1" id="file1" >
                            </div>
                            <label for="staticEmail" class="col-sm-3 col-form-label text-right">أرفع صوره </label>
        </div>

        <div class="form-group row pb-1">
                            <div class="col-sm-9">
                                    <input type="text" class="form-control" name="desc" >
                            </div>
                            <label for="staticEmail" class="col-sm-3 col-form-label text-right">وصف الاعلان</label>
        </div>

        <input type="submit" class="btn btn-success" ID="Button1" value="رفع المحتوي"/>
</form>


</div>

      <div class="col-12 bg-light text-primary  rounded py-5 px-4">

    <table id="myTable" class="table table-responsive table-bordered table-hover ">
                <thead >
                <tr>
                    <th>عرض</th>
                    <th>حذف</th>
                    <th>الحاله</th>
                    <th>وصف الاعلان</th>

                </tr>
                </thead>
                <tbody>
                <?php
                function escapeJavaScriptText($string)
                {
                    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
                }
                    while ($arrtl=mysqli_fetch_array($rstltl))
                    {
                        $str=escapeJavaScriptText($arrtl[2]);

                        ?>

                <tr>
                    <td> <a onclick="modalchange('<?php echo $str?>')" href="#showphoto" data-toggle="modal" data-target="#showphoto">عرض</a></td>

                    <td><a href="process/delete_ads?aid=<?php echo $arrtl[0]?>">خذف</a> </td>
                    <td><?php if($arrtl[3]=="accepted") echo 'موافق عليه'; else if ($arrtl[3]=='refused') echo "مرفوض"; else if ($arrtl[3]=="pending")echo"تحت المراجعه" ;?></td>
                    <td><?php  if(strlen($arrtl[2])>90)  echo substr($arrtl[4],0,87)."..."; else echo $arrtl[4];?></td>
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
$("input[name='uploadtype']").change(function(e) {
    debugger
    if ($("input:radio[name ='uploadtype']:checked").val() == '1') {
        $('#viddiv').fadeIn();
        $('#imgdiv').fadeOut();
    } else {
        $('#imgdiv').fadeIn();
        $('#viddiv').fadeOut();
    }
});
</script>


<?php include  "footer.php";?>