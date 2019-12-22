<?php
    include "../../lib/ShoppingCart.php";

    if(isset($_SESSION["GioHang"]) != null)
    {
        $gioHang=unserialize($_SESSION["GioHang"]);
    }
    else
        $gioHang=new ShoppingCart();
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $gioHang->Add($id);

        $_SESSION["GioHang"] = serialize($gioHang);

        DataProvider::ChangeURL("../../index.php?a=5");
    }

    $sub=1;
    if(isset($_GET["sub"]))
        $sub = $_GET["sub"];
    switch($sub){
        case 1:
            include "../GioHang/pDanhSach.php";
        break;
        case 2:
            include "../GioHang/pThongBaoDatHangThanhCong.php";
        break;
        default:
            DataProvider::ChangeURL("../../index.php?a=404");
        break;
    }
?>