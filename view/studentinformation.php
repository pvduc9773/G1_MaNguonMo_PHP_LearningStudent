<?php
include_once("header.php");
include_once("nav.php");
?>
<?php 
        include_once("../model/entity/student.php");
        $anhDaiDien = $maSinhVien = $hoTen = $ngaySinh = $emai = "";
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $maSinhVien = $_REQUEST["txtMaSinhVien"];
            $hoTen = $_REQUEST["txtHoTen"];
            $ngaySinh = $_REQUEST["datNgaySinh"];
            $emai = $_REQUEST["txtEmail"];

            $student = new Student($hoTen, '', '', '');
            if (filter_var($emai, FILTER_VALIDATE_EMAIL)) {
                // echo "<h1>Email hợp lệ.</h1>";
            } else {
                // echo "<h1>Email không hợp lệ.</h1>";
            }
            
            var_dump($_FILES);
            if ($_FILES["fileAnhDaiDien"]["name"] != "") {
                echo "Đã Upload File";
                // code save file to server
                move_uploaded_file($_FILES["fileAnhDaiDien"]["tmp_name"], "upload/avatar.png");
            } else {
                echo "Chưa Upload File";
            }
        }
?>

    <!--Content-->
    <div class="modal-content">
    <!--Header-->
        <div class="modal-header">
            <h3 class="modal-title">Thông tin sinh viên</h3>
        </div>

        <!--Body-->
        <div class="modal-body">
            <form method="POST" id="insert_form" enctype="multipart/form-data">
                <div >
                    <label>Mã sinh viên</label>
                    <input type="text" name="txtMaSinhVien"  id="txtMaSinhVien"  class="form-control" value="<?php echo $maSinhVien; ?>" />
                    <label>Họ tên</label>
                    <input type="text" name="txtHoTen"  id="txtHoTen" class="form-control" value="<?php echo $hoTen; ?>"/>
                    <label>Ngày sinh</label>
                    <input type="date" name="datNgaySinh"  id="datNgaySinh" class="form-control" value="<?php echo $ngaySinh; ?>" />
                    <label>Email</label>
                    <input type="email" name="txtEmail"  id="txtEmail" class="form-control" value="<?php echo $emai; ?>" />
                    <label>Ảnh đại diện</label>
                    <input require type="file" name="fileAnhDaiDien" id="fileAnhDaiDien" class="form-control" value="<?php echo $anhDaiDien; ?>">
                    <br/>
                    <input type="submit" name="insert" id="insert" value="Lưu" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>

<?php include_once("footer.php"); ?>