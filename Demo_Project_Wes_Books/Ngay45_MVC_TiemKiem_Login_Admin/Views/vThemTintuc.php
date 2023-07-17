    	<div id="content_left"> 
        	<div class="left1">
            	<h3>CHỨC NĂNG</h3>
                <p><a href="?module=<?=$module?>&act=them">Thêm Tin tức</a></p>
                <p><a href="?module=<?=$module?>">Danh sách Tin tức</a></p>
                <p><a href="?module=<?=$module?>">Thống kê</a></p>
            </div>

        </div>
        <div id="content_right"> 
        	<h1> QUẢN LÝ TIN TỨC</h1>
            <h2> THÊM TIN TỨC</h2>
            <div id="right_detail">
            <form name="form1" method="post" action="?module=<?=$module?>&act=xulythem">
              <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="120" height="30">Tiêu đề:</td>
                  <td width="380"><input type="text" name="t1" id="t1" size="80"></td>
                </tr>
                <tr>
                  <td height="30">Tóm tắt:</td>
                  <td><textarea rows="5" cols="50" id="t2" name="t2"></textarea></td>
                </tr>
                <tr>
                  <td height="30">Nội dung:</td>
                  <td><textarea rows="5" cols="50" id="t3" name="t3"></textarea></td>
                </tr>
                <tr>
                  <td height="30">Hình ảnh:</td>
                  <td><input type="text" name="t4" id="t4" size="80"></td>
                </tr>
                 <tr>
                  <td height="30">Trạng thái:</td>
                  <td><input type="checkbox" name="c1" id="c1" value="1"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
                </tr>
              </table>
            </form>

			</div>
        </div>
