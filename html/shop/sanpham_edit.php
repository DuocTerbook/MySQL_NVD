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
        //đọc dữ liệu cần sửa
        if(isset($_GET["masp"])){
            //lấy mã nhân viên cần sửa
            $MASP= $_GET["masp"];
            //tạo truy vấn đọc dữ liệu từ bảng nhân viên
            $sql_edit_nvd= "SELECT * FROM sanpham WHERE MASP='$MASP'";
            // thực thi câu lệnh truy vấn
            $result_edit_nvd = $conn_nvd->query($sql_edit_nvd);
            //đọc bản ghi từ kết quả
            $row_edit_nvd = $result_edit_nvd->fetch_array();
        }else{
            header("Location: product.php");
        }
        //đọc dữ liệu phòng ban
        $sql_pb_nvd = "SELECT * FROM SHOP WHERE 1=1";
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
            $sql_update_nvd= "UPDATE sanpham SET";
            $sql_update_nvd.="TENSP='$TENSP',";
            $sql_update_nvd.="SOLUONG='$SOLUONG',";
            $sql_update_nvd.="GIAMUA='$GIAMUA',";
            $sql_update_nvd.="GIABAN='$GIABAN',";
            $sql_update_nvd.="ANH='$ANH',";
            $sql_update_nvd.="TRANGTHAI='$TRANGTHAI',";
            $sql_update_nvd.="MASHOP='$MASHOP'";
            $sql_update_nvd.=" WHERE MASP='$MASP'";
            if($conn_nvd->query($sql_update_nvd)){
                   header("Location:product.php"); 
            }else{
                $error_message_nvd="Lỗi sửa dữ liệu". mysqli_error($conn_nvd);
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
                            <input type="text" name="MASP" id="MASP" readonly
                                value="<?php echo  $row_edit_nvd["MASP"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="TENSP" id="TENSP"
                                value="<?php echo  $row_edit_nvd["TENSP"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="SOLUONG" id="SOLUONG"
                                value="<?php echo  $row_edit_nvd["SOLUONG"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá mua</td>
                        <td>
                        <input type="text" name="GIAMUA" id="GIAMUA"
                                value="<?php echo  $row_edit_nvd["GIAMUA"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá bán</td>
                        <td>
                        <input type="text" name="GIABAN" id="GIABAN"
                                value="<?php echo  $row_edit_nvd["GIABAN"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh</td>
                        <td>
                        <input type="file" name="ANH" id="ANH"
                                value="<?php echo  $row_edit_nvd["ANH"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI" >
                                <option value="1" <?php if($row_edit_nvd["TRANGTHAI"]==1){echo "selected";}?>>Hoạt động</option>
                                <option value="0" <?php if($row_edit_nvd["TRANGTHAI"]==0){echo "selected";}?>>Không hoạt động</option>
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
                                <option value="<?php echo $row["MASHOP"]?>"
                                <?php
                                    if($row["MASHOP"]==$row_edit_nvd["MASHOP"]){
                                        echo "selected";
                                    }
                                ?>
                                >
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
        <a href="sanpham.php">Danh sách sản phẩm</a>
    </section>
</body>
</html>