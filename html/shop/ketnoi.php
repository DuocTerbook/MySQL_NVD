<?php
$conn_nvd=new mysqli("localhost","root","","k2cnt3_nvd_shop");
if(!$conn_nvd){
    echo"<h2> lỗi: ". mysqli_error($conn_nvd) ."</h2>";
}else{
    echo"<h2> nguyenvanduoc-2210900016 </h2>";
}
?>