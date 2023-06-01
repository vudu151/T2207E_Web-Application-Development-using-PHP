// JavaScript Document
function check(input_text)
{
	if(input_text.value=="")
	{
		document.getElementById("baoloi").innerHTML="chưa nhập dữ liệu";
		input_text.focus();//đặt lại focus vào text hiện tại
		return false;
	}
	if(isNaN(input_text.value))
	{
		document.getElementById("baoloi").innerHTML="phải nhập số";
		input_text.focus();//đặt lại focus vào text hiện tại
		return false;
	}
	if(parseFloat(input_text.value)<0 || parseFloat(input_text.value)>10)
	{
		document.getElementById("baoloi").innerHTML="điểm phải >=0 và <=10";
		input_text.focus();//đặt lại focus vào text hiện tại
		return false;
	}
	document.getElementById("baoloi").innerHTML="";
}

//kiểm tra toán,văn, anh không trống và phải là số
function kiemtra()
{
	tToan = document.getElementById("tToan");
	tVan = document.getElementById("tVan");
	tAnh = document.getElementById("tAnh");
	if(tToan.value==""||tVan.value==""||tAnh.value=="")
	{
		alert("Mời nhập đầy đủ điểm các môn");
		return false;
	}
	if(isNaN(tToan.value)||isNaN(tVan.value)
							||isNaN(tAnh.value))
	{
		alert("điểm phải nhập số");
		return false;
	}
	toan = parseFloat(tToan.value);
	van = parseFloat(tVan.value);
	anh = parseFloat(tAnh.value);
	if(toan<0||toan>10||van<0||van>10||anh<0||anh>10)
	{
		alert("điểm phải >=0 và <=10");
		return false;
	}
}