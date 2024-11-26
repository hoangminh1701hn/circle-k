<?php

    include("class/adminback.php");
    $obj= new adminback();
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
    $admin_role = $_SESSION['role'];
    if($admin_id==null){
        header("location:dangnhap.php");
    }

    if(isset($_GET['adminLogout'])){
        if($_GET['adminLogout']=="logout"){
            $obj->admin_logout();
        }
    }
?> 

<?php 
    include ("includes/header.php")
?>

  <body>
  <body>
            <div class="main-panel">
                <div class="content-wrapper">
                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashboard_view.php');
                                        }elseif($views=="chamcong" ){
                                            include ("views/chamcong_view.php");
                                        }elseif($views=="chamcong_manage"){
                                            include ("views/chamcong_manage_view.php");
                                        }elseif($views=="nhanvien_add" ){
                                            include ("views/nhanvien_add_view.php");
                                        }elseif($views=="nhanvien_manage"){
                                            include ("views/nhanvien_manage_view.php");
                                        }elseif($views=="nghiphep_manage"){
                                            include ("views/nghiphep_manage_view.php");
                                        }elseif($views=="nghiphep_history" ){
                                            include ("views/nghiphep_history_view.php");
                                        }elseif($views=="luong_manage" ){
                                            include ("views/luong_manage_view.php");
                                        }elseif($views=="dangkyfaceid" ){
                                            include ("views/dangkyfaceid_view.php");
                                        }elseif($views=="luong_add1" ){
                                            include ("views/luong_add1_view.php");
                                        }elseif($views=="luong_edit" ){
                                            include ("views/luong_edit_view.php");
                                        }elseif($views=="luong_add2" ){
                                            include ("views/luong_add2_view.php");
                                        }elseif($views=="nhanvien_edit" ){
                                            include ("views/nhanvien_edit_view.php");
                                        }elseif($views=="nghiphep_add" ){
                                            include ("views/nghiphep_add_view.php");
                                        }elseif($views=="thuong_manage" ){
                                            include ("views/thuong_manage_view.php");
                                        }elseif($views=="thuong_add" ){
                                            include ("views/thuong_add_view.php");
                                        }elseif($views=="thuong_edit" ){
                                            include ("views/thuong_edit_view.php");
                                        }elseif($views=="phat_manage" ){
                                            include ("views/phat_manage_view.php");
                                        }elseif($views=="phat_add" ){
                                            include ("views/phat_add_view.php");
                                        }elseif($views=="phat_edit" ){
                                            include ("views/phat_edit_view.php");
                                        }elseif($views=="loaiphat_manage" ){
                                            include ("views/loaiphat_manage_view.php");
                                        }elseif($views=="loaiphat_add" ){
                                            include ("views/loaiphat_add_view.php");
                                        }elseif($views=="loaiphat_edit" ){
                                            include ("views/loaiphat_edit_view.php");
                                        }elseif($views=="loaithuong_manage" ){
                                            include ("views/loaithuong_manage_view.php");
                                        }elseif($views=="loaithuong_add" ){
                                            include ("views/loaithuong_add_view.php");
                                        }elseif($views=="loaithuong_edit" ){
                                            include ("views/loaithuong_edit_view.php");
                                        }elseif ($views== "insurance_manage") {
                                            include("views/insurance_manage_view.php");
                                        }elseif ($views== "add_insurance") {
                                            include("views/add_insurance_view.php");
                                        }elseif ($views== "edit_insurance") {
                                            include("views/edit_insurance_view.php");
                                        }elseif ($views== "nghiphep_edit") {
                                            include("views/nghiphep_edit_view.php");
                                        }elseif ($views== "doimatkhau") {
                                            include("views/doimatkhau_view.php");
                                        }elseif ($views== "hoso") {
                                            include("views/hoso_view.php");
                                        }elseif ($views== "hoso_edit") {
                                            include("views/hoso_edit_view.php");
                                        }
                                        else{
                                            echo '<script>
                                            window.location.href = "http://localhost/doantn/dashboard.php";
                                            </script>';
                                        }

                                    }
                                ?>
                </div>
            </div>

<?php 
    include ("includes/footer.php")
?>