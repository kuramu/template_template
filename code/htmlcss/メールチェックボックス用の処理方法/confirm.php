

<?php

$company = $_POST["company"];

$names = $_POST["names"];

$posts = $_POST["posts"];
$emails = $_POST["emails"];
$issue02 = $_POST["issue02"];

$comment = $_POST["comment"];
$comment = nl2br($comment);

$quest01 = $_POST["quest01"];

/*
$naiyou = $_POST["naiyou"];
$namey = $_POST["namey"];
$ad = $_POST["ad"];
$otoiawase = $_POST["otoiawase"];
$otoiawase = nl2br($otoiawase);
*/
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<link rel="shortcut icon" href="ico/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="content-script-type" content="text/javascript">
<meta name="robots" content="index,follow">
<meta name="description" content="御社の「海外進出」「海外事業展開」をスピーディーかつ的確に経営サポートするグローバル顧問のお問い合わせフォームです。海外ビジネスを検討中の方はサイエストのグローバル顧問にお問い合わせください。">
<meta name="keywords" content="グローバル顧問,海外進出,支援,海外事業,展開,成功,問い合わせ,資料請求">
<title>お問い合わせフォーム｜海外進出支援・海外事業展開の「グローバル顧問」</title>
<link href="css/base.css" rel="stylesheet" type="text/css" media="all">
<link href="css/stylea.css" rel="stylesheet" type="text/css" media="all">
<link href="css/content.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.lib.js" type="text/javascript"></script>
<link href="css/form.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="common.js"></script>
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PRSGXJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRSGXJ');</script>
<!-- End Google Tag Manager -->
<div id="wrapper" class="contact">


<div id="container">

  <div id="pankuzu">
<br>
  </div>
  <div id="main" class="clearfix">


<div id="sec01">
  <h4 id="tel"><img src="images/01title.png" width="450" height="44" alt="“御社”と“海外”をつなぎます。"></h4>
  <p class="text">
    グローバル顧問に関するお問い合わせや資料のご請求はお電話、<br>
    または下記のお問い合わせフォームにて承っております。
  </p>
  <div class="tel clear"><img src="images/01tel.png" width="920" height="50" alt="TEL：03-5797-7650"></div>
</div><!-- / #sec01 -->

<a id="mf"></a>

<div id="sec02">
  <h4 id="form"><img src="images/02title.png" width="920" height="60" alt="メールでのお問い合わせ"></h4>
  <p class="text">
入力した情報をご確認下さい
  </p>
  <h5>お問い合わせフォーム</h5>


<!--▽フォーム ここから-->
<form method="post" action="mail-contact-sendmail.php">
  <table summary="お問い合わせフォーム" class="frmTable01">
    <caption>お客様情報</caption>
    <tr>
      <th><div><img src="common_img/icon_hissu.png" alt="必須" width="40" height="20"><label for="company">貴社名</label></div></th>
      <td><?php echo $company ?>
	</td>
    </tr>
    <tr>
      <th><div><img src="common_img/icon_hissu.png" alt="必須" width="40" height="20"><label for="name">ご担当者様名</label></div></th>
      <td><?php echo $names ?>
	  </td>
    </tr>
    <tr>
      <th><div><img src="common_img/icon_ninni.png" alt="任意" width="40" height="20"><label for="post">部署・役職</label></div></th>
      <td><?php echo $posts ?>
	  </td>
    </tr>
    <tr>
      <th><div><img src="common_img/icon_hissu.png" alt="必須" width="40" height="20"><label for="email">メールアドレス</label></div></th>
      <td><?php echo $emails ?>

      </td>
    </tr>
  </table>
  <table summary="お問い合わせフォーム" class="frmTable01">
    <caption>お問い合わせ項目</caption>
    <tr>
      <th><div><img src="common_img/icon_hissu.png" alt="必須" width="40" height="20"><label for="issue02">お問い合わせ項目</label></div></th>
      <td><?php 
foreach ($issue02 as $value) {
  echo $value ."<br>";
} ?>

      </td>
    </tr>
  </table>
    <div class="">
    <table summary="お問い合わせフォーム" class="frmTable01">
      <tr>
        <th><div><img src="common_img/icon_ninni.png" alt="任意" width="40" height="20"><label for="comment">ご相談内容</label></div></th>
        <td><?php echo $comment ?>
        </td>
      </tr>
    </table>
  </div>
      <table summary="お問い合わせフォーム" class="frmTable01">
    <caption>当サイトをご覧になったきっかけ</caption>
    <tr>
      <th><div><img src="common_img/icon_hissu.png" alt="必須" width="40" height="20"><label for="quest01">媒体</label></div></th>
      <td><?php 
foreach ($quest01 as $value1) {
  echo $value1 ."<br>";
} ?>
      </td>
    </tr>
  </table>
		<div style="text-align: center;margin-top:30px;">
			<input onclick="javascript:history.back();" id="btn-reset" class="btn_reset" type="button" value="" name="">
			<input id="btn-send" type="submit" name="btn_submit" value="送信" class="btn_submit">
		</div>


      <?php
            foreach($_POST as $key => $val){
                if(is_array($val)){
                    foreach($val as $key2 => $val2){
                        echo "<input type=\"HIDDEN\" name=\"".$key."[".$key2."]\" value=\"$val2\">\n";
                    }
                }else{
                    if($key!="btnExec" and $key!="submit_x" and $key!="submit_y"){
                        echo "<input type=\"HIDDEN\" name=\"$key\" value=\"".htmlspecialchars($val, ENT_QUOTES)."\">\n";
                    }
                }
            }
        ?>

</form>
<!--△フォーム ここまで-->
</div><!-- / #sec02 -->



  </div><!-- / #main -->
</div><!-- / #container -->

<div id="footer">

  <dl id="footer_info">
    <dt><img src="https://globalkomon.com/common_img/footer_logo.png" width="380" height="80" alt="グローバル顧問 by CYEST サイエスト株式会社"></dt>
    <dd>
      <address>〒107-0052　東京都港区赤坂2-17-69 赤坂フェニックスビル3F</address>
      <ul>
        <li><img src="https://globalkomon.com/common_img/footer_info_tel.png" width="290" height="44" alt="TEL：03-5797-7650"></li>
      </ul>
    </dd>
  </dl>

</div><!-- / #footer -->
</div><!-- / #wrapper -->


<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=QDI95Ud";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=QDI95Ud" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
</body>
</html>