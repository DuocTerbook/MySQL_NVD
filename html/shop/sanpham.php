<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        $sql_nvd = "SELECT * FROM sanpham WHERE 1=1";
        $result_nvd = $conn_nvd->query($sql_nvd);
        //Duyệt và hiển thị kết quả -> tbody
    ?>
    <section class="container">
        <h1>Danh sách sản phẩm</h1>
        <hr/>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Mã shop</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result_nvd->num_rows>0){
                        $stt=0;
                        while($row_nvd = $result_nvd->fetch_array()):
                        $stt++;
                ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $row_nvd["MASP"];?></td>
                    <td><?php echo $row_nvd["TENSP"];?></td>
                    <td><?php echo $row_nvd["SOLUONG"];?></td>
                    <td><?php echo $row_nvd["GIAMUA"];?></td>
                    <td><?php echo $row_nvd["GIABAN"];?></td>
                    <td><?php echo $row_nvd["ANH"];?></td>
                    <td><?php echo $row_nvd["TRANGTHAI"];?></td>
                    <td><?php echo $row_nvd["MASHOP"];?></td>
                    <td>
                        <a href="sanpham_edit.php?masp=<?php echo $row_nvd["MASP"];?>">Sửa</a>|
                        <a href="sanpham.php?masp=<?php echo $row_nvd["MASP"];?>">Xóa</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                }
                ?>
            </tbody>
        </table>
        <a href="sanpham_add.php" class="btn">Thêm mới sản phẩm</a>
        <?php
        if(isset($_GET["masp"])){
            $masp = $_GET["masp"];
            $sql_delete_nvd = "DELETE FROM SANPHAM where MASP ='$masp'";
            if($conn_nvd->query($sql_delete_nvd)){
                header("Location:sanpham.php");
            }else{
                echo "<script> alert('lỗi xóa'); </script>";
            }
        }
    ?>
    </section>
</body>
</html>