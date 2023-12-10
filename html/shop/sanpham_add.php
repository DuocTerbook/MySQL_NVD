<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thông tin sản phẩm</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        $sql_pb_nvd = "SELECT * FROM shop WHERE 1=1";
        $res_pb_nvd = $conn_nvd->query($sql_pb_nvd);
        // => hiển thị trong điều khiển select
        // Thực hiện thêm dữ liệu
        $error_message_nvd ="";
        if(isset($_POST["btnSubmit_nvd"])){
            // lấy dữ liệu trên form
            $MASP = $_POST["MASP"];
            $TENSP = $_POST["TENSP"];
            $SOLUONG = $_POST["SOLUONG"];
            $GIAMUA = $_POST["GIAMUA"];
            $GIABAN = $_POST["GIABAN"];
            $ANH = $_POST["ANH"];
            $TRANGTHAI = $_POST["TRANGTHAI"];
            $MASHOP = $_POST["MASHOP"];
            //kiểm trả khóa chính không được trùng
            $sql_check_nvd = "SELECT MASP FROM SANPHAM WHERE MASP = 'MASP' ";
            $res_check_nvd = $conn_nvd->query($sql_check_nvd);
            if($res_check_nvd->num_rows>0){
                $error_message_nvd="Lỗi trùng khóa chính.";
            }
            $sql_insert_nvd = "INSERT INTO `sanpham` (`MASP`, `TENSP`, `SOLUONG`,`GIAMUA`, `GIABAN`, `ANH`, `TRANGTHAI`, `MASHOP`)";
            $sql_insert_nvd.="VALUES ('$MASP','$TENSP','$SOLUONG','$GIAMUA','$GIABAN','$ANH','$TRANGTHAI','$MASHOP');";
            if($conn_nvd->query($sql_insert_nvd)){
                error_log($ANH);
                   header("Location: sanpham.php"); 
            }else{
                $error_message_nvd="Lỗi thêm mới". mysqli_error($conn_nvd);
            }
        }
    ?>
    <section class="container">
        <h1>Thêm mới thông tin sản phẩm</h1>
        <form name="frm_nvd" method="post" action="">
            <table border="1" width="100%" cellspacing="5" cellpadding="5">
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>
                            <input type="text" name="MASP" id="MASP">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="TENSP" id="TENSP">
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="SOLUONG" id="SOLUONG">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá bán</td>
                        <td>
                            <input type="text" name="GIAMUA" id="GIAMUA">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá mua</td>
                        <td>
                            <input type="text" name="GIABAN" id="GIABAN">
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh</td>
                        <td>
                            <input type="file" name="ANH" id="ANH">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI" >
                                <option value="1" selected>Hoạt động</option>
                                <option value="0" selected>Không hoạt động</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mã shop</td>
                        <td>
                            <select name="MASHOP" id="MASHOP">
                                <?php
                                    while($row = $res_pb_nvd->fetch_array()):        
                                ?>
                                <option value="<?php echo $row["MASHOP"]?>">
                                    <?php echo $row["TENSHOP"]?>
                                </option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Thêm" name="btnSubmit_nvd">
                            <input type="reset" value="Làm lại" name="btnReset_nvd">
                        </td>
                    </tr>
                </tbody>
            </table>    
            <div>
                <?php echo $error_message_nvd;?>
            </div>
        </form>
        <a href="sanpham.php">Danh sách nhân viên</a>
    </section>
</body>
</html>