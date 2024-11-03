<?php
class  adminback
{
    protected $connection;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "circlek";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        mysqli_set_charset($this->connection, 'UTF8');
        if (!$this->connection) {
            die("Kết nối đến cơ sở dữ liệu bị lỗi!!!");
        }
    }

    function admin_login($data)
    {
        $admin_email = $data["email"];
        $admin_pass = md5($data['pass']);
        $query_check = "SELECT * FROM `taikhoan` WHERE email = '$admin_email'";
        $query = "SELECT * FROM `taikhoan` WHERE email = '$admin_email' AND matkhau = '$admin_pass'";
        $result_check = mysqli_query($this->connection, $query_check);
        $result = mysqli_query($this->connection, $query);
        if (mysqli_num_rows($result_check) > 0) {
            if (mysqli_num_rows($result) > 0) {
                $admin_info = mysqli_fetch_assoc($result);
                        header("location:../index.php");
                        session_start();
                        $_SESSION['admin_id'] = $admin_info['id_tk'];
                        $_SESSION['admin_email'] = $admin_info['email'];
                        $_SESSION['role'] = $admin_info['role'];
                        $_SESSION['username'] = $admin_info['hoten'];
   
            } else {
                $log_msg = 2;
                return $log_msg;
            }
        } else {
            $log_msg = 3;
            return $log_msg;
        }
    }


    function admin_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['role']);
        
        session_destroy();
        header("location:../doantn/dangnhap.php");
        exit();
    }

    // function admin_password_recover($recover_email)
    // {
    //     $query = "SELECT * FROM `taikhoan` WHERE `email`='$recover_email'";
    //     if (mysqli_query($this->connection, $query)) {
    //         $row =  mysqli_query($this->connection, $query);
    //         return $row;
    //     }
    // }

    // function update_admin_password($data)
    // {
    //     $u_admin_id = $data['admin_update_id'];
    //     $u_admin_pass = md5($data['admin_update_password']);

    //     $query = "UPDATE `admin_info` SET `admin_pass`='$u_admin_pass' WHERE `admin_id`= $u_admin_id";

    //     if (mysqli_query($this->connection, $query)) {
    //         $update_mag = "You password updated successfull";
    //         return $update_mag;
    //     } else {
    //         return "Failed";
    //     }
    // }

    function add_admin_user($data)
    {
        $user_hoten = $data['user_hoten'];
        $user_email = $data['user_name'];
        $user_pass = md5($data['user_password']);
        $user_phone = $data['user_sdt'];
        $user_adress = $data['user_adress'];
        $user_role = $data['user_role'];
        $user_gender = $data['user_gender'];

        // Upload hình đại diện
        $hinhdaidien_name = $_FILES['hinhDaiDien']['name'];
        $hinhdaidien_tmp = $_FILES['hinhDaiDien']['tmp_name'];
        $hinhdaidien_path = "uploads/avatar/" . $hinhdaidien_name;

        move_uploaded_file($hinhdaidien_tmp, $hinhdaidien_path);

        $query = "INSERT INTO `taikhoan`( `hoTen`, `Sdt`, `diaChi`, `gioiTinh`, `email`, `matKhau`, `role`,`hinhDaiDien` ) VALUES ('$user_hoten','$user_phone','$user_adress','$user_gender','$user_email','$user_pass','$user_role','$hinhdaidien_name')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm tài khoản thành công");
            window.location.href = "nhanvien_manage.php";
            </script>';
        }
    }

    function show_admin_user()
    {
        $query = "SELECT * FROM `taikhoan` ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_admin_user_by_id($user_id)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `id_tk`='$user_id'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function show_admin_user_by_nhaxuong($nhaxuong)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `nhaxuong`='$nhaxuong'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function update_hoso($data)
    {
        $u_id = $data['id_acc'];
        $name = $data['name'];
        $sdt = $data['sdt'];
        $diachi = $data['diachi'];
        $doanhnghiep = $data['doanhnghiep'];
        $vungsanxuat = $data['vungsanxuat'];
        $nhaxuong = $data['nhaxuong'];
        $thongtin = $data['thongtin'];
        // $trangthai = $data['trangthai'];

        if (!empty($_FILES['hinhDaiDien']['tmp_name'])) {
            $hinhdaidien_name = $_FILES['hinhDaiDien']['name'];
            $hinhdaidien_size = $_FILES['hinhDaiDien']['size'];
            $hinhdaidien_tmp = $_FILES['hinhDaiDien']['tmp_name'];
            $img_ext = pathinfo($hinhdaidien_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($hinhdaidien_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($hinhdaidien_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `taikhoan` WHERE id_acc=$u_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhdaidien'];
                    unlink("uploads/avatar/" . $pre_img);

                    $query = "UPDATE `taikhoan` SET `doanhnghiep` = '$doanhnghiep', `vungsanxuat` = '$vungsanxuat', `nhaxuong` = '$nhaxuong', `hoten` = '$name', `dienthoai` = '$sdt', `diachi` = '$diachi', `thongtin` = '$thongtin', `hinhDaiDien` = '$hinhdaidien_name' WHERE `id_acc` = '$u_id';";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($hinhdaidien_tmp, "uploads/avatar/" . $hinhdaidien_name)) {
                        $msg = 1; // Thành công
                        return $msg;
                    } else {
                        $msg = 2; // Thất bại
                        return $msg;
                    }
                } else {
                    $msg = 3; // Kích thước hoặc định dạng không hợp lệ
                    return $msg;
                }
            } else {
                $msg = 4; // Định dạng file không hợp lệ
                return $msg;
            }
        } else {
            // Nếu không có tệp ảnh mới được chọn, chỉ cập nhật thông tin người dùng mà không cần di chuyển tệp ảnh cũ
            $query = "UPDATE `taikhoan` SET `doanhnghiep` = '$doanhnghiep', `vungsanxuat` = '$vungsanxuat', `nhaxuong` = '$nhaxuong', `hoten` = '$name', `dienthoai` = '$sdt', `diachi` = '$diachi', `thongtin` = '$thongtin' WHERE `id_acc` = '$u_id';";

            if (mysqli_query($this->connection, $query)) {
                $msg = 5; // Thành công
                return $msg;
            } else {
                $msg = 6; // Thất bại
                return $msg;
            }
        }
    }


    function update_admin($data)
    {
        $user_id = $data['user_id'];
        $user_hoten = $data['user_hoten'];
        $user_email = $data['user_email'];
        $user_sdt = $data['user_sdt'];
        $user_adress = $data['user_adress'];
        $user_gender = $data['user_gender'];
        $user_role = $data['user_role'];


        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['hinhDaiDien']['tmp_name'])) {
            $hinhdaidien_name = $_FILES['hinhDaiDien']['name'];
            $hinhdaidien_size = $_FILES['hinhDaiDien']['size'];
            $hinhdaidien_tmp = $_FILES['hinhDaiDien']['tmp_name'];
            $img_ext = pathinfo($hinhdaidien_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($hinhdaidien_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($hinhdaidien_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `taikhoan` WHERE id_tk=$user_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhDaiDien'];
                    unlink("uploads/avatar/" . $pre_img);

                    $query = "UPDATE `taikhoan` SET `hoTen` = '$user_hoten', `Sdt` = '$user_sdt', `diaChi` = '$user_adress', `gioiTinh` = '$user_gender', `email` = '$user_email', `role` = '$user_role', `hinhDaiDien` = '$hinhdaidien_name' WHERE `taikhoan`.`id_tk` = '$user_id';";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($hinhdaidien_tmp, "uploads/avatar/" . $hinhdaidien_name)) {
                        echo '<script>
                            alert("Chỉnh sửa tài khoản thành công");
                            window.location.href = "nhanvien_manage.php";
                        </script>';
                    } else {
                        echo "Upload failed!";
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            // Nếu không có tập tin hình ảnh mới được tải lên, giữ nguyên ảnh cũ và chỉ cập nhật thông tin khác của sản phẩm
            $query = "UPDATE `taikhoan` SET `hoTen` = '$user_hoten', `Sdt` = '$user_sdt', `diaChi` = '$user_adress', `gioiTinh` = '$user_gender', `email` = '$user_email', `role` = '$user_role' WHERE `taikhoan`.`id_tk` = '$user_id';";

            if (mysqli_query($this->connection, $query)) {
                echo '<script>
                    alert("Chỉnh sửa tài khoản thành công");
                    window.location.href = "nhanvien_manage.php";
                </script>';
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }

    function delete_admin($admin_id)
    {
        $sel_query = "DELETE FROM `taikhoan` WHERE `id_tk`=$admin_id";
        // $query = mysqli_query($this->connection, $sel_query);
        // $fetch = mysqli_fetch_assoc($query);
        // $img_name = $fetch['hinhdaidien'];


        if (mysqli_query($this->connection, $sel_query)) {
            // unlink('uploads/avatar/' . $img_name);
            echo '<script>
            alert("Xóa tài khoản thành công");
            window.location.href = "nhanvien_manage.php";
            </script>';
        }
    }

    function add_luong($data) {
        $taiKhoan = $data['taiKhoan'];  // Check if this key exists in $_POST
        $luongTheoGio = $data['luongTheoGio'];
        $soGioLam = $data['soGioLam'];
        $phuCap = $data['phuCap'];
        $tienThuong = $data['tienThuong'];
        $tienPhat = $data['tienPhat'];
        $thang=$data['thang'];
        $luongThucNhan = $data['luongThucNhan'];
    
        $query = "INSERT INTO `luong` (`taiKhoan`, `luongTheoGio`, `soGioLam`, `phuCap`, `thuong`, `phat`,`thang`, `luongThucNhan`) 
                  VALUES ('$taiKhoan', '$luongTheoGio', '$soGioLam', '$phuCap', '$tienThuong', '$tienPhat','$thang', '$luongThucNhan')";
    
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
                alert("Thêm Lương thành công");
                window.location.href = "luong_add1.php";
            </script>';
        } else {
            return "Thêm Lương thất bại!";
        }
    }
    

    function show_luong()
    {
        $query = "SELECT * FROM `luong`";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }
    public function tinhSoGioLamTheoThang($employee_id, $thang) {
        $totalHours = 0;
    
        // Lấy năm và tháng từ biến $thang
        $year = date('Y'); // Năm hiện tại
        $month = str_pad($thang, 2, '0', STR_PAD_LEFT); // Đảm bảo tháng có 2 chữ số
    
        // Truy vấn dữ liệu từ MySQL với điều kiện lọc theo tháng
        $sql = "SELECT * FROM `attendance` 
                WHERE `employee_id` = '$employee_id' 
                AND `status` LIKE 'Đã ra' 
                AND MONTH(`time_in`) = '$month' 
                AND YEAR(`time_in`) = '$year'";
        
        $result = mysqli_query($this->connection, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $timeIn = strtotime($row['time_in']);
                $timeOut = strtotime($row['time_out']);
    
                // Kiểm tra nếu time_out không NULL
                if ($timeOut !== false) {
                    // Tính số giờ làm việc cho mỗi bản ghi
                    $hours = ($timeOut - $timeIn) / 3600; // Tính số giờ
                    $totalHours += $hours;
                }
            }
        } else {
            echo "<h3 style='color: red;'>Không tìm thấy bản ghi cho nhân viên trong tháng $thang!!</h3><br>";
        }
    
        return $totalHours;
    }
    
    
    
    
    function delete_luong($id)
    {
        $query = "DELETE FROM `luong` WHERE  id_luong = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "luong_manage.php";
            </script>';
        }
    }

    function show_luong_byID($id)
    {
        $query = "SELECT * FROM `luong` WHERE id_luong = $id";

        if (mysqli_query($this->connection, $query)) {
            $luong_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($luong_info);
        }
    }

    function show_taikhoanbyid($id)
    {
        $query = "SELECT * FROM `taikhoan` WHERE id_tk = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function update_luong($data)
    {
        $id_luong = $data['id_luong'];
        $luongTheoGio = $data['luongTheoGio'];
        
        $soGioLam = $data['soGioLam'];
        $phuCap = $data['phuCap'];
        $tienThuong = $data['tienThuong'];
        $tienPhat = $data['tienPhat'];
        $luongThucNhan = $data['luongThucNhan'];

        $query = "UPDATE `luong` SET `luongTheoGio`= '$luongTheoGio', `soGioLam`= '$soGioLam',`phuCap`= '$phuCap',`thuong`= '$tienThuong',`phat`= '$tienPhat',`luongThucNhan`= '$luongThucNhan' WHERE id_luong =  $id_luong";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "luong_manage.php";
            </script>';
        }
    }
    function xacnhan_luong($id_luong)
    {
        $ngayThanhToan =  date('Y-m-d H:i:s');
        $query = "UPDATE `luong` SET `ngayThanhToan` = '$ngayThanhToan' WHERE `id_luong` = '$id_luong'";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Cập nhật thành công");
            window.location.href = "luong_manage.php";
            </script>';
        }
    }
    function thayDoiChu($str)
    {
        // Mảng ánh xạ các ký tự có dấu thành không dấu
        $accentsMap = array(
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
            'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
            'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
            'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
            'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
            'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
            'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
            'đ' => 'd',
            'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
            'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A',
            'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
            'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
            'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
            'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
            'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
            'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
            'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y',
            'Đ' => 'D'
        );

        // Thay thế các ký tự có dấu thành không dấu
        $str = strtr($str, $accentsMap);
        // Loại bỏ các khoảng trắng
        $str = preg_replace('/\s+/', '', $str);
        // Loại bỏ các ký tự không phải chữ cái hoặc số
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        // Trả về chuỗi đã được xử lý
        return $str;
    }
    function show_lichsu_nghiphep()
    {
        $query = "SELECT * FROM `nghiphep`";

        if (mysqli_query($this->connection, $query)) {
            $nghiphep_info = mysqli_query($this->connection, $query);
            return $nghiphep_info;
        }
    }
    function show_xin_nghiphep()
    {
        $query = "SELECT * FROM `nghiphep` WHERE `trangthai`='DangXuLy'";

        if (mysqli_query($this->connection, $query)) {
            $nghiphep_info = mysqli_query($this->connection, $query);
            return $nghiphep_info;
        }
    }
    public function duyet_trangthai_nghiphep($id_np)
    {
        $query = "UPDATE `nghiphep` SET `trangThai` = 'Duyet' WHERE `id_np` = '$id_np'";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Duyệt thành công");
            window.location.href = "nghiphep_manage.php";
            </script>';
        }
    }
    public function tuchoi_trangthai_nghiphep($id_np)
    {
        $query = "UPDATE `nghiphep` SET `trangThai` = 'TuChoi' WHERE `id_np` = '$id_np'";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Từ chối thành công");
            window.location.href = "nghiphep_manage.php";
            </script>';
        }
    }
    function add_donxinnghi($data)
    {
        $nhanVien = $data['nhanVien'];
        $lyDo = $data['lyDo'];
        $tuNgay = $data['tuNgay'];
        $denNgay = $data['denNgay'];
    
      
        $hinhAnh = '';
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
            $uploadDir = 'uploads/nghiphep/';
            $uploadFile = $uploadDir . basename($_FILES['hinhanh']['name']);
    
            
            $check = getimagesize($_FILES['hinhanh']['tmp_name']);
            if ($check !== false) {
               
                if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $uploadFile)) {
                    $hinhanh = $uploadFile;
                } else {
                    return "Có lỗi khi upload hình ảnh!";
                }
            } else {
                return "File upload không phải là hình ảnh!";
            }
        }
    
        
        $query = "INSERT INTO `nghiphep` ( `nhanVien`, `lyDo`, `hinhanh`, `tuNgay`, `denNgay`, `trangThai`) VALUES ('$nhanVien', '$lyDo', '$hinhanh', '$tuNgay', '$denNgay', 'DangXuLy')";
    
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Đơn xin nghỉ được thêm thành công. Vui lòng chờ đợi cửa hàng trưởng phê duyệt ");
            window.location.href = "nghiphep_history.php";
            </script>';
        } else {
            return "Thêm thất bại!";
        }
    }
    

    function show_thuong()
    {
        $query = "SELECT * FROM `thuong`";

        if (mysqli_query($this->connection, $query)) {
            $thuong = mysqli_query($this->connection, $query);
            return $thuong;
        }
    }
    function show_phat()
    {
        $query = "SELECT * FROM `phat`";

        if (mysqli_query($this->connection, $query)) {
            $phat = mysqli_query($this->connection, $query);
            return $phat;
        }
    }

    function delete_thuong($id)
    {
        $query = "DELETE FROM `thuong` WHERE  `id_thuong` = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "loaithuong_manage.php";
            </script>';
        }
    }
    function delete_phat($id)
    {
        $query = "DELETE FROM `phat` WHERE  `id_phat` = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "loaiphat_manage.php";
            </script>';
        }
    }
  
    function add_thuong($data)
    {
        $loaiThuong = $data['loaiThuong'];
        $soTienThuong = $data['soTienThuong'];
        $query = "INSERT INTO `thuong`( `loaiThuong`,`soTienThuong`) VALUES ('$loaiThuong','$soTienThuong')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm danh mục thành công");
            window.location.href = "loaithuong_manage.php";
            </script>';
        } else {
            return "Thêm danh mục thất bại!";
        }
    }
    function add_phat($data)
    {
        $loaiPhat = $data['loaiPhat'];
        $soTienPhat = $data['soTienPhat'];
        $query = "INSERT INTO `phat`( `loaiPhat`,`soTienPhat`) VALUES ('$loaiPhat','$soTienPhat')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm danh mục thành công");
            window.location.href = "loaiphat_manage.php";
            </script>';
        } else {
            return "Thêm danh mục thất bại!";
        }
    }

    function update_thuong($data)
    {
        $id_thuong = $data['id_thuong'];
        $loaiThuong = $data['loaiThuong'];
        $soTienThuong = $data['soTienThuong'];
        $query = "UPDATE `thuong` SET `loaiThuong` = '$loaiThuong', `soTienThuong` = '$soTienThuong' WHERE `id_thuong` = '$id_thuong';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "loaithuong_manage.php";
            </script>';
        }
    }
    function update_phat($data)
    {
        $id_phat = $data['id_phat'];
        $loaiPhat = $data['loaiPhat'];
        $soTienPhat = $data['soTienPhat'];
        $query = "UPDATE `phat` SET `loaiPhat` = '$loaiPhat', `soTienPhat` = '$soTienPhat' WHERE `id_phat` = '$id_phat';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "loaiphat_manage.php";
            </script>';
        }
    }
    function show_loaithuongbyid($id)
    {
        $query = "SELECT * FROM `thuong` WHERE `id_thuong` = '$id'";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }
    function show_loaiphatbyid($id)
    {
        $query = "SELECT * FROM `phat` WHERE `id_phat` = '$id'";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function show_dsthuong()
    {
        $query = "SELECT * FROM `danhsachthuong` ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function show_dsphat()
    {
        $query = "SELECT * FROM `danhsachphat` ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function delete_dsthuong($id)
    {
        $query = "DELETE FROM `danhsachthuong` WHERE  `id_dst` = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "thuong_manage.php";
            </script>';
        }
    }
    function delete_dsphat($id)
    {
        $query = "DELETE FROM `danhsachphat` WHERE  `id_dsp` = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "phat_manage.php";
            </script>';
        }
    }

    function add_dsthuong($data)
    {
        $nhanVien = $data['nhanVien'];
        $thuong = $data['thuong'];
    
        $checkQuery = "SELECT * FROM `danhsachthuong` WHERE `nhanVien` = '$nhanVien' AND `thuong` = '$thuong'";
        $result = mysqli_query($this->connection, $checkQuery);
        
        if (mysqli_num_rows($result) > 0) {
            
            $updateQuery = "UPDATE `danhsachthuong` SET `soLanThuong` = `soLanThuong` + 1 WHERE `nhanVien` = '$nhanVien' AND `thuong` = '$thuong'";
            if (mysqli_query($this->connection, $updateQuery)) {
                echo '<script>
                alert("Cập nhật thành công");
                window.location.href = "thuong_manage.php";
                </script>';
            } else {
                return "Cập nhật thất bại!";
            }
        } else {
            $insertQuery = "INSERT INTO `danhsachthuong`(`nhanVien`, `thuong`, `soLanThuong`) VALUES ('$nhanVien', '$thuong', 1)";
            if (mysqli_query($this->connection, $insertQuery)) {
                echo '<script>
                alert("Thêm thành công");
                window.location.href = "thuong_manage.php";
                </script>';
            } else {
                return "Thêm thất bại!";
            }
        }
    }
    
  
    function add_dsphat($data)
    {
        $nhanVien = $data['nhanVien'];
        $phat = $data['phat'];
    
        $checkQuery = "SELECT * FROM `danhsachphat` WHERE `nhanVien` = '$nhanVien' AND `phat` = '$phat'";
        $result = mysqli_query($this->connection, $checkQuery);
        
        if (mysqli_num_rows($result) > 0) {
            
            $updateQuery = "UPDATE `danhsachphat` SET `soLanPhat` = `soLanPhat` + 1 WHERE `nhanVien` = '$nhanVien' AND `phat` = '$phat'";
            if (mysqli_query($this->connection, $updateQuery)) {
                echo '<script>
                alert("Cập nhật thành công");
                window.location.href = "phat_manage.php";
                </script>';
            } else {
                return "Cập nhật thất bại!";
            }
        } else {
            $insertQuery = "INSERT INTO `danhsachphat`(`nhanVien`, `phat`, `soLanPhat`) VALUES ('$nhanVien', '$phat', 1)";
            if (mysqli_query($this->connection, $insertQuery)) {
                echo '<script>
                alert("Thêm thành công");
                window.location.href = "phat_manage.php";
                </script>';
            } else {
                return "Thêm thất bại!";
            }
        }
    }
    
    function show_dsthuongbyid($id)
    {
        $query = "SELECT * FROM `danhsachthuong` where `id_dst` = '$id' ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function show_dsphatbyid($id)
    {
        $query = "SELECT * FROM `danhsachphat` where `id_dsp` = '$id' ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function update_dsthuong($data)
    {
        $id_dst = $data['id_dst'];
        $nhanVien = $data['nhanVien'];
        $thuong = $data['thuong'];
        $soLanThuong = $data['soLanThuong'];

        $query = "UPDATE `danhsachthuong` SET `nhanVien` = '$nhanVien', `thuong` = '$thuong', `soLanThuong` = '$soLanThuong' WHERE `id_dst` = '$id_dst';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "thuong_manage.php";
            </script>';
        }
    }


    function update_dsphat($data)
    {
        $id_dsp = $data['id_dsp'];
        $nhanVien = $data['nhanVien'];
        $phat = $data['phat'];
        $soLanPhat = $data['soLanPhat'];

        $query = "UPDATE `danhsachphat` SET `nhanVien` = '$nhanVien', `phat` = '$phat', `soLanPhat` = '$soLanPhat' WHERE `id_dsp` = '$id_dsp';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "phat_manage.php";
            </script>';
        }
    }

    function tongtien_thuong($employee_id)
    {
        $query = "SELECT SUM(dt.soLanThuong * t.soTienThuong) AS tong_tien_thuong
              FROM danhsachthuong dt
              JOIN thuong t ON dt.thuong = t.id_thuong
              WHERE dt.nhanVien = '$employee_id'";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tongtien = $row['tong_tien_thuong'];
            return $tongtien;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function tongtien_phat($employee_id)
    {
        $query = "SELECT SUM(dp.soLanPhat * p.soTienPhat) AS tong_tien_phat
              FROM danhsachphat dp
              JOIN phat p ON dp.phat = p.id_phat
              WHERE dp.nhanVien = '$employee_id'";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tongtien = $row['tong_tien_phat'];
            return $tongtien;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
























}
