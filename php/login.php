
<!-- 設定網頁編碼為UTF-8 -->

    <script src='https://www.google.com/recaptcha/api.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form name="form" method="post" onload="pwdform=this;console.log(pwdform);">
帳號：<input name="id" type="text" placeholder="輸入你的帳號"  /> <br>
密碼：<input name="pw" type="password" placeholder="輸入你的密碼" value="" /> <br>

<!--div class="g-recaptcha" data-sitekey="<?php
include('php/recaptcha.inc.php');
echo $site;
?>"></div-->
<input type="button" name="button" value="登入" onclick="
var form=this.parentNode;
var ThisWindow=GetAncenstorAeroWindow(form);
POSTRequestToObjHtml('php/connect.php','id='+form.querySelector('[name=id]').value+'&pw='+form.querySelector('[name=pw]').value,ThisWindow.querySelector('.content'));
" />
<!--input type="button" name="button2" value="申請帳號" onclick="location.href='register.php'" /-->
    <!--input type="button" name="cancel" value="取消" onclick="location.href=backhref" /-->
</form>
