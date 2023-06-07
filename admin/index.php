<?php 
include "header.php";
include "class/admin.php";
if($_POST)
{
    $check = new Admin;
    $check_exit = $_POST['name'];
    $check_exit = $check->select_name($check_exit);

    if ($check_exit) {
        $result = $check_exit->fetch_assoc();
        $id = $result['id'];
        $check_pass = $result['Pass_word'];
        $check_right = $_POST['password'];

        if (password_verify($check_right,$check_pass)) 
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $result['position'];
            $add = new Admin;
            $add_status = $add->status($id);
            header('location:../admin/index.php');
            exit;
        }
        else
        {
            echo "<script>alert('Sai Mật khẩu'); 
            window.location.href='../admin/login.php';</script>";
            exit;
        }

    } else {
        echo "<script>alert('Sai Tên đăng nhập'); 

        window.location.href='../admin/login.php';</script>";
        exit;
    }
}


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}


include"slider.php";
?>