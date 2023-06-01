<?php
//kiểm tra và trả lại thông báo lỗi dạng chuỗi
function KiemtraSo($n)
{
	if($n=="")
		return "Chưa nhập";
	if(!is_numeric($n))
		return "Không phải là số";
	return "";//không có lỗi
}
//hàm đầu vào là ngày tháng năm sinh, trả về: tuổi bao nhiêu năm, tháng, ngày
function XemTuoi($ngay,$thang,$nam)
{
	
	//tạo thời gian gian bằng hàm date_create
	$ngaysinh = date_create("$nam/$thang/$ngay");
	//lấy thời gian hiện tại
	$ngayhientai=date_create();
	//trả về số năm, tháng, ngày
	$hieuso_tg = date_diff($ngaysinh,$ngayhientai);
	$str = $hieuso_tg->format("%y tuổi %m tháng %d ngày <br>Tổng số %a ngày");
	return $str;
}
//hàm đầu vào là chuỗi chứa "nam/thang/ngay" của ngày sinh
//trả về: tuổi bao nhiêu năm, tháng, ngày
function XemTuoi2($str_ngaysinh)
{
	
	//tạo thời gian gian bằng hàm date_create
	$ngaysinh = date_create($str_ngaysinh);
	//lấy thời gian hiện tại
	$ngayhientai=date_create();
	//trả về số năm, tháng, ngày
	$hieuso_tg = date_diff($ngaysinh,$ngayhientai);
	$str = $hieuso_tg->format("%y tuổi %m tháng %d ngày <br>Tổng số %a ngày");
	return $str;
}
?>

