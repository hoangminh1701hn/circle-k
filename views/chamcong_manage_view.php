function update_donxinnghi($data)
    {
        $id_np= $data['id_np'];
        $nhanVien = $data['nhanVien'];
        $lyDo = $data['lyDo'];
        $tuNgay = $data['tuNgay'];
        $denNgay = $data['denNgay'];
        


        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['hinhanh']['tmp_name'])) {
            $hinhanh_name = $_FILES['hinhanh']['name'];
            $hinhanh_size = $_FILES['hinhanh']['size'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
            $img_ext = pathinfo($hinhanh_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($hinhanh_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($hinhanh_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `nghiphep` WHERE id_np=$id_np";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhanh'];
                    unlink("uploads/nghiphep/" . $pre_img);

                    $query = "UPDATE `nghiphep` SET `nhanVien` = '$nhanVien', `lyDo` = '$lyDo', `hinhanh` = '$hinhanh_name', `tuNgay` = '$tuNgay', `denNgay` = '$denNgay';";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($hinhanh_tmp, "uploads/avatar/" . $hinhanh_name)) {
                        echo '<script>
                            alert("Chỉnh sửa tài khoản thành công");
                            window.location.href = "nghiphep_edit.php";
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
            $query = "UPDATE `nghiphep` SET `nhanVien` = '$nhanVien', `lyDo` = '$lyDo', `hinhanh` = '$hinhanh_name', `tuNgay` = '$tuNgay', `denNgay` = '$denNgay';";

            if (mysqli_query($this->connection, $query)) {
                echo '<script>
                    alert("Chỉnh sửa tài khoản thành công");
                    window.location.href = "nghiphep_edit.php";
                </script>';
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }