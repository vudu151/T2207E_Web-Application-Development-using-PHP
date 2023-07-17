<style type="text/css">
.modal {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: white;
  margin: 15% auto;
  padding: 5px;
  width: 30%;
  border-radius: 0;
  font-family: 'Roboto', sans-serif;
}
.modal-content p:nth-child(1) { 
			margin: 0px; height:25px;  background: #a9171d; 
			padding-top:5px; padding-left:10px; color:white; 
			font-weight:bold; text-transform:uppercase; text-align:center;}
.modal-content p:nth-child(2) { color:black; text-align:center; margin:10px}
.modal-content p:nth-child(3) { text-align:right; margin:0px;}
.modal-content a{color: black; text-decoration: none; font-size:12px; margin-right: 20px; padding: 5px;}
.modal-content a:hover{background-color: whitesmoke;color: red;}
</style>

<div id="myModal" class="modal">

  <div class="modal-content">
    <p> 
    <span class="title_kq">THÔNG BÁO</span>
    </p>
    <p><?=$thongbao?></p>
    <p><a href="<?=$link_tieptuc?>">Tiếp tục</a></p>
  </div>
</div>
