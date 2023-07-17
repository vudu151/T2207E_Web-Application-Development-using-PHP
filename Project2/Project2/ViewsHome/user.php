<?php 
    $row = $account->data;
?>

<div class="user-home">
    <div class="user-home-content">
        <div class="account-info box">
            <div class="account-info-content box-content">
                <p class="title__heading">THÔNG TIN TÀI KHOẢN</p>
                <table class="table-info">
                    <tr>
                        <td>Tên tài khoản: </td>
                        <td><?=$row["Username"]?></td>
                    </tr>
                    <tr>
                        <td>ID: </td>
                        <td><?=$row["Id"]?></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu: </td>
                        <td>***...***</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <?php
                        $email_hidden = $row["Email"];

                        $parts = explode("@", $email_hidden);
                        $un = $parts[0];
                        $domain = $parts[1];

                        $hiddenEmail = substr($un, 0, 5) . str_repeat("*", strlen($un) - 5) . "@" . substr($domain, 0, 2) . str_repeat("*", strlen($domain) - 2);
                        ?>
                        <td><?=$hiddenEmail?></td>
                    </tr>
                </table>
                <div class="fix-info">
                    <a href="?module=user&act=fixaccount">Thay đổi thông tin tài khoản?</a>
                </div>
            </div>
        </div>

        <div class="person-info box">
            <div class="person-info-content box-content">
                <p class="title__heading">THÔNG TIN CÁ NHÂN</p>
                <table class="table-info">
                    <tr>
                        <td>Họ và tên: </td>
                        <td><?=$row["FirstName"]?> <?=$row["LastName"]?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td><?=$row["Address"]?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <td><?=$row["Phone"]?></td>
                    </tr>
                </table>
                <div class="fix-info">
                    <a href="?module=user&act=fixuserinfo">Thay đổi thông tin cá nhân?</a>
                </div>
            </div>
        </div>
    </div>
</div>