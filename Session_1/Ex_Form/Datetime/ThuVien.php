<?php
    //Kiểm tra và trả lại thông báo lỗi dạng chuỗi
    function KiemtraSo($n)
    {
        if($n=="")
            return "Chưa nhập";
        if(!is_numeric($n))
            return "Không phải là số";
        return "";   //Không có lỗi
    }

    //Hàm đầu vào là ngày thánh năm sinh và trả về: tuổi bao nhiêu năm, thánh, ngày
    function XemTuoi_1($ngay,$thang,$nam)
    {
        //Tạo thời gian bằng hàm date_create
        $ngaysinh = date_create("$nam/$thang/$ngay");
        $ngayhientai = date_create();   //Lấy thời gian hiện tại 
        $hieuso_tg = date_diff($ngaysinh,$ngayhientai);   //Trả về số năm,thánh,ngày
        $str = $hieuso_tg ->format("%y tuổi %m tháng %d ngày <br>Tổng số %a ngày");
        return $str;
    }

    //Hàm đầu vào là chuỗi chưa "nam/thang/ngay" của ngày sinh --> trả về : tuổi bao nhiêu năm, thánh,ngày
    function XemTuoi_2($str_ngaysinh)
    {
        //Tạo thời gian bằng hàm date_create
        $ngaysinh = date_create($str_ngaysinh);
        $ngayhientai = date_create();   //Lấy thời gian hiện tại
        $ngayhientai = date_create();
        $hieuso_tg = date_diff($ngaysinh,$ngayhientai);
        $str = $hieuso_tg -> format("%y tuổi %m tháng %d ngày <br> Tổng số %a ngày");
        return $str;
    }
?>