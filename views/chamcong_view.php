<?

if (isset($_GET['search'])) {
  $keyword = $_GET['keyword'];
  if (!empty($keyword)) {
    $nghiphep_info = $obj->search_lichsunghiphep($keyword, $admin_role, $admin_id);



    $nghiphep_datas = array();
    while ($nghiphep_ftecth = mysqli_fetch_assoc($nghiphep_info)) {
      $nghiphep_datas[] = $nghiphep_ftecth;
    }
    $search_item = count($nghiphep_datas);
  } else {
    header('location:nghiphep_history.php');
  }
} else {
  $nghiphep_info = $obj->show_lichsu_nghiphep($admin_role, $admin_id);

  $nghiphep_datas = array();

  while ($nghiphep_ftecth = mysqli_fetch_assoc($nghiphep_info)) {
    $nghiphep_datas[] = $nghiphep_ftecth;
  }
}







function search_nghiphep($keyword, $admin_role, $admin_id)
    {
        if ($admin_role == 'NhanVien') {
            $query = "
                SELECT danhsachnghiphep.*, taikhoan.*, nghiphep.* 
                FROM nghiphep
                LEFT JOIN danhsachnghiphep 
                ON danhsachnghiphep.nghiphep = nghiphep.id_nghiphep
                LEFT JOIN taikhoan 
                ON danhsachnghiphep.nhanVien = taikhoan.id_tk  
                WHERE (danhsachnghiphep.nhanVien LIKE '%$keyword%'  
                       OR nghiphep.id_nghiphep LIKE '%$keyword%' 
                       OR nghiphep.loaiNghiphep LIKE '%$keyword%')
                  AND danhsachnghiphep.nhanVien = '$admin_id'";
        } else {
            $query = "
                SELECT danhsachnghiphep.*, taikhoan.*, nghiphep.* 
                FROM nghiphep
                LEFT JOIN danhsachnghiphep
                ON danhsachnghiphep.nghiphep = nghiphep.id_nghiphep
                LEFT JOIN taikhoan 
                ON danhsachnghiphep.nhanVien = taikhoan.id_tk 
                WHERE (danhsachnghiphep.nhanVien LIKE '%$keyword%' 
                       OR nghiphep.id_nghiphep LIKE '%$keyword%' 
                       OR taikhoan.hoTen LIKE '%$keyword%' 
                       OR nghiphep.loaiNghiphep LIKE '%$keyword%')";
        }
    
        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }
?>