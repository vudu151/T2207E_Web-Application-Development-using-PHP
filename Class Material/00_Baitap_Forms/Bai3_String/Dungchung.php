<?php
//tìm và trả về chuỗi kết quả str2 nằm ở vị trí nào trong str1
function Timchuoi($str1, $str2)
{
	//strpos($str1,$str2): trả về false nếu không tìm thấy, 
	//ngược lại trả về vị trí của str2 trong str1
	$i = strpos($str1,$str2);//java: i = str1.indexOf(str2);
	//3 dấu === kiểm tra cả giá trị lẫn kiểu dữ liệu
	if($i===false)//i = false (vừa giá trị = 0 và kiểu dữ liệu là boolean)
		return "$str2 không có trong $str1";
	else if($i===0)//i = 0 dạng số nguyên
		return "$str2 nằm ở vị trí đầu tiên trong $str1";
	else
		return "$str2 nằm ở vị trí $i trong $str1";
}
//hàm tách chuỗi bởi dấu phẩy và tính tổng các con số trong chuỗi
function Tongchuoi($str)
{
	//trả về mảng arr chứa các chuỗi con sau khi tách bởi dâu phẩy
	$arr = explode("," ,$str);
	$tong=0;
	foreach($arr as $s)
	{
		if(is_numeric($s))//Lọc:nếu chuỗi con s ở dạng số
			$tong += $s; //dấu + là cộng số sẽ tự chuyển chuỗi thành số
	} 
	return $tong;
}
?>




