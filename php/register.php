<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script src="../js/cookie.js"></script>
    <script type="text/javascript">
	var backhref = getCookie("href");
    </script>
<style type="text/css">
        <!--
		@import url(../css/input.css);
        -->
    </style>
     
<form name="form" method="post" action="register_finish.php">
  <p>帳號：
    <input type="text" name="id" /> <br>
    密碼：<input type="password" name="pw" /> <br>
    再一次輸入密碼：<input type="password" name="pw2" />
    <br />
    使用者名稱(暱稱)：
    <input type="text" name="username" id="username" />
    <br>
    <div class="g-recaptcha" data-sitekey="<?php
include('recaptcha.inc.php');
echo $site;
?>"></div>
  <br />
<br>
    <input type="submit" name="button" value="確定" />
    <input type="reset" name="reset" value="清除" />
    <input type="button" name="cancel" value="取消" onclick="location.href=backhref;" />
  </p>
</form>

<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>" async defer></script>