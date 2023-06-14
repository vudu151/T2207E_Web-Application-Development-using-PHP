<?php
    //Hàm tìm và trả về str2 nằm ở vị trí nào so với chuỗi 1
    function TimChuoi($str1, $str2) {
    $i = strpos($str1, $str2);       //Java: i = str1.indexOf(str2);
    if($i === false)                 //===: kiểm tra cả giá trị(=0) và kiểu dữ liệu(boolean)
        return "$str2 không có trong $str1";
    else if($i === 0)
        return "$str2 nằm ở vị trí đầu tiên trong $str1";
    else
        return "$str2 nằm ở vị trí $i trong $str1";
    }

    //Hàm tách chuỗi bởi dấu phẩy và tính tổng các con số trong chuỗi
    function TongChuoi($str)
    {
        //Trả về mảng arr khi tách chuỗi bởi các dấu phẩy
        $arr = explode(",", $str);
        $tong = 0;
        foreach ($arr as $s)
        {
            if(is_numeric($s)==true)
                $tong += $s;   //Dấu cộng là số sẽ tự động chuyển chuỗi thành số
        }
        return $tong;
    }
?>