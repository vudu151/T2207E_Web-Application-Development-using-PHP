<?php
require_once("KetnoiCSDL.php");
/*
Hàm  UploadFile dùng để upload tệp từ $inputName vào thư mục $Folder
*/
function UploadFile($inputName, $Folder)
{
    if(isset($_FILES[$inputName]) && $_FILES[$inputName]["error"]==0)
    {
        $tenanh = $_FILES[$inputName]["name"];
        $temp_file = $_FILES[$inputName]["tmp_name"];
        move_uploaded_file($temp_file,"$Folder/$tenanh");
        return $tenanh;
    }
    else
        return "";
}
//hiển thị các thẻ <option value="Giá trị"> Nhãn </option> từ bảng $tenbang
//$cotid: là tên cột để lấy giá trị đưa vào value
//$cotname: là tên cột để lấy giá trị đưa vào Nhãn của Option
//$selectedid: là giá trị so sánh để đưa thuộc tính Selected vào Option
function TaoSelect($tenbang,$cotid,$cotname,$selectedid)
{
	$conn = ConnectDB();
	$sql = "SELECT * FROM $tenbang";
	$pdo_smt = $conn->prepare($sql);
	$ketqua = $pdo_smt->execute();
	if($ketqua==FALSE)
		die("<p>Lỗi tạo select</p>");
	$rows = $pdo_smt->fetchAll();
	foreach($rows as $row)
	{
		$id = $row[$cotid];
		$ten = $row[$cotname];
		if($id==$selectedid)//nếu id của bản ghi hiện tại bằng selectedid (cần chọn)
			echo "<option value='$id' selected> $ten </option>\n";
		else
			echo "<option value='$id' > $ten </option>\n";	
	}
}
?>