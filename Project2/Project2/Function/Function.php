<?php
//$inputName: tên của input chọn file, 
//$Folder là tên thư mục trên Server để lưu tệp Upload lên
//hàm trả về tên file trên máy chủ sau khi upload, trả về chuỗi rỗng nếu lỗi
function UploadFile($inputName, $Folder)
{
	if($_FILES[$inputName]["error"]!=0)
	 	return "";//trả về rỗng là lỗi
	$filename = "";
	$tmp_name = "";
 	$filename=$_FILES[$inputName]["name"];//lấy tên tệp gốc của file upload
	$tmp_name = $_FILES[$inputName]["tmp_name"];
	//kiểm tra đuôi tệp phải là jpg, png, gif
	$arr = explode(".",$filename);//tách chuỗi thành mảng các chuỗi con với dấu chấm
	$file_ext = strtolower(end($arr));//lấy phần tử cuối chính là đuôi tệp và chuyển thành chữ thường
	$list_anh = array("jpg","png","gif","jpeg");
	if(in_array($file_ext, $list_anh)==false)//nếu đuôi tệp không có trong danh sách tệp ảnh
		return "";
	move_uploaded_file($tmp_name, "$Folder/$filename");
	return $filename; 
}
//Hàm ShowOptions($rows, $valueColumn, $labelColumn, $selectedVal)
function ShowOptions($rows, $valueColumn, $labelColumn, $selectedVal)
{
	foreach($rows as $row)
	{
		$value = $row[$valueColumn];
		$label = $row[$labelColumn];
		$selected = "";
		if($row[$valueColumn]== $selectedVal)
			$selected = "selected";
		echo "<option value='" . $value. "' " . $selected . ">" . $label ."</option>\n";
	}
}

function SendMail($email,$random_number){   
    require "library/PHPMailer-master/src/PHPMailer.php"; 
    require "library/PHPMailer-master/src/SMTP.php"; 
    require 'library/PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'Group4SellBook@gmail.com'; // SMTP username
        $mail->Password = 'wikoflmjdlosbfda';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('Group4SellBook@gmail.com', 'Group4' ); 
        $mail->addAddress( $email , ""); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Xác nhận Email';
        $noidungthu = 'Dãy số xác nhận của bạn là: ' . $random_number ; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
}//function SendMail
?>