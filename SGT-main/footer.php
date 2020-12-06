


<div style="background-color:#2a81c9;color:#FFFFFF">
        <div class="container text-right">
            <div class=" row py-5">
                <div class="col-md-4 my-3 p-3">
                    <h3 style=" font-weight:bold;">تواصل معنا</h3>
                    <p style=" font-weight:bold;">أشترك فى الموقع الأن</p>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span
                                class="glyphicon glyphicon-envelope"></span></span>
                        <input id="Text1" type="text" class="form-control"
                            aria-describedby="basic-addon1" " placeholder=" أدخل بريدك الإليكترونى" />
                    </div>
                </div>
                <div class="col-md-3 my-3 p-3">
                    <h3 style=" font-weight:bold;">فريق العمل</h3>
                    <p style=" font-weight:bold;"><br />أفنان عتيق المطيرى<br />بشاير عقاب الشمرى<br />أسيل عطالله العنزى<br />غدير عيد الشمرى<br /><br /><br />مها مرجى الحربى</p>
                </div>
                <div class="col-md-5 my-3 p-3">
                    <h3 style=" font-weight:bold;">أحدث الأخبار</h3><br />
                    <a style=" font-weight:bold;">الخبر الخبر الخبر</a>
                    <p>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل 
                            تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل .</p>
                            <a style=" font-weight:bold;">الخبر الخبر الخبر</a>
                            <p>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل 
                                    تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل .</p>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color:#102e66;height: 10px;">
    </div>


    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="mymodallabel"
        style="margin-top:50px;direction: rtl">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">

                <div class="modal-header">
                    <h4 class="modal-title text-danger text-right" id="mymodallable2">تسجيل دخول </h4>
                </div>
                <form method="post" action="process/login_proc.php">
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
                <div class="modal-body text-right">
                    <div class="container-fluid" style="text-align:right">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span
                                    class="glyphicon glyphicon-user"></span></span>
                            <input class="form-control" aria-describedby="basic-addon1" ID="loginusername"
                                   name="un"
                                placeholder="أسم المستخدم" value="<?php echo $ucookie;?>" AutoCompleteType="None" autofocus requiredtype="text" />
                        </div>
                        <br />
                        <div class="input-group">
                            <input class="form-control" aria-describedby="basic-addon2" ID="loginpassword"
                                   name="pw"
                                TextMode="Password" placeholder="كلمة المرور" value="<?php echo $pcookie;?>" AutoCompleteType="None" required
                                type="password" />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                        <br />
                        <p class="text-left" style="font-weight:bold;font-size:12px;"><input id="Checkbox1" name="rem"
                                type="checkbox" /> تذكر هذا المستخدم</p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submit()" class="btn btn-success mx-2" ID="Button1">دخول</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">أغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="registeration" style="direction: rtl"  tabindex="-1" role="dialog" aria-labelledby="mymodallabel"
        style="margin-top:50px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">

                <div class="modal-header">
                    <h4 class="modal-title text-danger text-right" id="mymodallable2">التسجيل فى الموقع </h4>
                </div>
                <form method="post" action="process/regist.php" enctype="multipart/form-data" >
                <div class="modal-body text-left">
                    <div class="container-fluid" style="text-align:left">
                        <div class="form-check form-check-inline m-0  pb-1" id="radiogroup">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="usertype" checked id="talent" value="1"> مشاهد
                            </label>
                            <label class="form-check-label mx-2">
                                <input class="form-check-input" type="radio" name="usertype" id="watcher" value="2"> صاحب موهبة
                            </label>
                            <label class="form-check-label mx-2">
                                <input class="form-check-input" type="radio" name="usertype" id="watcher" value="3">معلن
                            </label>
                        </div>                        
                        <div class="input-group pb-1">
                            <span class="input-group-addon" id="basic-addon1"><span
                                    class="glyphicon glyphicon-user"></span></span>
                            <input class="form-control" name="fname" aria-describedby="basic-addon1" ID="name"
                                placeholder="الأسم بالكامل" AutoCompleteType="None" autofocus requiredtype="text" />
                        </div>
                        <div class="input-group pb-1">
                            <input class="form-control" name="uname" aria-describedby="basic-addon2" ID="loginusername"
                                TextMode="Password" placeholder="أسم المستخدم" AutoCompleteType="None" required
                                type="text" />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                        <div class="input-group pb-1">
                            <input class="form-control" name="pass" id="pass" aria-describedby="basic-addon2" ID="loginpassword"
                                TextMode="Password"  placeholder="كلمة المرور" AutoCompleteType="None" required
                                type="password" onkeyup='check();' />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                        <div class="input-group pb-1">
                            <input class="form-control" name="cpass" id="cpass" aria-describedby="basic-addon2" ID="loginpassword"
                                TextMode="Password"  placeholder="تاكيد كلمة المرور" AutoCompleteType="None" required
                                type="password" onkeyup='check();' />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>


                        </div><span id='message'></span>
                    
                        <div id="moreinfo" style="display:none;">
                        <div class="input-group pb-1">
                            <span class="input-group-addon" id="basic-addon1"><span
                                    class="glyphicon glyphicon-user"></span></span>
                            <input class="form-control" name="adr" aria-describedby="basic-addon1" ID="name"
                                placeholder="العنوان" AutoCompleteType="None" autofocus requiredtype="text" />
                        </div>
                        <div class="input-group pb-1">
                            <input class="form-control" name="mob" aria-describedby="basic-addon2" ID="loginusername"
                                TextMode="Password" placeholder="رقم الهاتف" AutoCompleteType="None" required
                                type="text" />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                            <div class="input-group pb-1">
                            <input class="form-control" name="em" aria-describedby="basic-addon2" ID="loginusername"
                                TextMode="Password" placeholder="البريد الاليكتروني" email AutoCompleteType="None" required
                                type="text" />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                            <div class="input-group pb-1">
                            <input class="form-control" name="bio" aria-describedby="basic-addon2" ID="loginusername"
                                 placeholder="السيره الذاتيه" AutoCompleteType="None" required
                                type="text" />
                            <span class="input-group-addon" id="basic-addon2"><span
                                    class="glyphicon glyphicon-lock"></span></span>
                        </div>
                        
                        <div class="form-group row pb-1">
                            <label for="staticEmail" class="col-sm-3 col-form-label text-left">نوع الموهبة</label>
                            <div class="col-sm-9">
                                <select id="inputState" name="tid" class="form-control">
                                    <option selected value="-1">اختر نوع موهبتك</option>
                                    <?php
                                    $cntallist=mysqli_connect(Host,UN,PW,DBname);
                                    $rslttallist=mysqli_query($cntallist,"select * from talents where active='1'");
                                    while ($arrtallist=mysqli_fetch_array($rslttallist)) {
                                        echo "<option value='$arrtallist[0]'>$arrtallist[1] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-1">
                            <label for="staticEmail" class="col-sm-3 col-form-label text-left">أرفع صورة </label>
                            <div class="col-sm-9">
                                    <input type="file" name="img" id="img" class="form-control-file" id="exampleFormControlFile1" >
                            </div>
                        </div>
                        
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submit()" class="btn btn-success mx-2" ID="Button1">تسجيل </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">أغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mymodallabel"
        style="margin-top:50px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body text-right">
                    <div class="container-fluid" style="text-align:right">
                        <form method="get" action="search.php">

                        <div class="input-group">
                            <span class="input-group-addon  rounded-left" id="basic-addon1"><button type="button"
                                    class="btn btn-success  rounded-left" ID="Button1" onclick="submit()"><i
                                        class="fas fa-search"></i></button></span>
                            <input class="form-control rounded-right" name="s" aria-describedby="basic-addon1"      ID="loginusername" placeholder="أدخل كلمة البحث" AutoCompleteType="None" autofocus
                                requiredtype="text" />
                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="notification" onclick="showAnnouncments()" tabindex="-1" role="dialog" aria-labelledby="mymodallabel"
        style="margin-top:50px;direction: rtl">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title text-danger text-center" id="mymodallable2">الأشعارات </h4>
                </div>

                <div class="modal-body text-right m-0 p-0">
                <ul class="list-group m-0 p-0" id="announmenu">

</ul>
                </div>
                
            </div>
        </div>
    </div>

<div class="modal fade" id="showphoto" tabindex="-1" role="dialog" aria-labelledby="mymodallabel" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content " id="modalphoto">
            <img class="img-fluid w-100 rounded" src="img\2.jpg" alt="Card image">
        </div>
    </div>
</div>



<!-- particles library -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    });
</script>

<script type="text/javascript">

    // Scrolling Effect

    $(window).on("scroll", function () {
        if ($(window).scrollTop()) {
            $('#mainnavbar').removeClass('bg-transparent');
            $('#mainnavbar').addClass('bg-light');

        }

        else {
            $('#mainnavbar').removeClass('bg-light');
            $('#mainnavbar').addClass('bg-transparent');
        }
    });

  
    $('#menubutton').on("click", function () {
        $('#mainnavbar').removeClass('bg-transparent');
        $('#mainnavbar').addClass('bg-light');
    });

    
    $("input[name='usertype']").change(function(e){
    if($("input:radio[name ='usertype']:checked").val() == '2') {
        $('#moreinfo').fadeIn();
    } else {
        $('#moreinfo').fadeOut();
    }

});
    

</script>
<?php if($login>0) {?>
<script>
    function announcount() {
        debugger
        var xhttp;
        str=<?php echo $login ?>;
        if (str == "") {
            document.getElementById("not_count").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("not_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "process/announcounter.php?q="+str, true);
        xhttp.send();
    }
    function timercount(){
        // do whatever you like here
        announcount();
        setInterval(announcount, 3000);
    }
timercount();

    function showAnnouncments() {
        debugger;
        var xhttp;
        str=<?php echo $login?>;
        if (str == "") {
            document.getElementById("announmenu").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("announmenu").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "process/getannoun.php?q="+str, true);
        xhttp.send();
        announcount();
    }
showAnnouncments();
    function viewvideo(a,n) {
        var xhttp;
        str=<?php echo $login?>;
        if (str == "") {
            document.getElementById("announmenu").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = "video.php?mid="+a;
            }
        };
        xhttp.open("GET", "process/openannoun.php?q="+str+"&a="+n, true);
        xhttp.send();
    }
    function viewimage(a,n) {
        var xhttp;
        str=<?php echo $login?>;
        if (str == "") {
            document.getElementById("announmenu").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = "image.php?mid="+a;
            }
        };
        xhttp.open("GET", "process/openannoun.php?q="+str+"&a="+n, true);
        xhttp.send();
    }

</script>
<?php }?>

<script>
    function modalchange(str) {
        debugger;
        s='<img class="img-fluid w-100 rounded" src="';
        s+=str;
        s+='"alt="Card image">';
        //  alert(s);
        document.getElementById('modalphoto').innerHTML=s;

    }
    var check = function() {
        if (document.getElementById('pass').value ==
            document.getElementById('cpass').value) {
            $('#pass').css('border-color', 'green');
            $('#cpass').css('border-color', 'green');

        } else {
            $('#pass').css('border-color', 'red');
            $('#cpass').css('border-color', 'red');
        }
    }

</script>
</body>

</html>