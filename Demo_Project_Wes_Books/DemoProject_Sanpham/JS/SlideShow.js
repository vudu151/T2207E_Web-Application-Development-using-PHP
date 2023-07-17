// JavaScript Document
//khai báo mảng chứa tên các file ảnh
var hinhanh = new Array("promotion-01.png","promotion-02.png","promotion-03.png");
//lưu id của đồng hồ hẹn giờ
var idDongho =-1;
var i=0;
//Hàm hiển thị ảnh show mỗi x giây
function SlideShow()
{
	anh = document.getElementById("anh_slide");//lấy tham chiếu để thẻ có id=anh_slide
	anh.src = "hinhanh/slides/" + hinhanh[i];//thay src để hiển thị ảnh mới
	i++;//tăng ảnh 1 đơn vị
	if(i==hinhanh.length)//nếu i vượt quá số phần tử (n-1) của mảng thì quay lại = 0
		i=0;
	idDongho=window.setTimeout("SlideShow();", 2000);//sau 2 giây gọi lại hàm SlideShow
}
