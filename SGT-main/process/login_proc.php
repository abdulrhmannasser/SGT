<?php
if (isset($_POST["un"])&&isset($_POST["pw"]))
{
    $un=$_POST["un"];
    $pw=$_POST["pw"];
    include "../dbinfo.php";
    $cn=mysqli_connect(Host,UN,PW,DBname);
//select ifnull(check_login('MMans','1223'),'wrong')
    $rslt=mysqli_query($cn,"select ifnull(check_login('$un','$pw'),'wrong')");
    $arr=mysqli_fetch_array($rslt);
    if($arr[0]=='wrong')
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"]="اسم المستخدم او كلمه المرور غير صحيحه";
        //header("location:../index.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        if (isset($_POST["rem"]))
        {

            if ($_POST["rem"]=='on')
            {
                setcookie("usercookie",$un,time()+(86400 * 30),"/");
                setcookie("passcookie",$pw,time()+(86400 * 30),"/");
            }
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //session_start();
        $res1=mysqli_query($cn,"select id from users where username='$un'");
        $arr1=mysqli_fetch_array($res1);
        $_SESSION["uid"]=$arr1[0];
        $_SESSION["role"]=$arr[0];

        //header("location:../index.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

else  header("location:../index.php?error=inv");