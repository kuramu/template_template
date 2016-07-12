<?php



/**

 * Template Name: mail-contact-check

 */

 get_header(); ?>

<?php
$naiyou = $_POST["naiyou"];
$cnpname = $_POST["cnpname"];
$namey = $_POST["namey"];
$ad = $_POST["ad"];
$tell = $_POST["tell"];
$otoiawase = $_POST["otoiawase"];
$otoiawase = nl2br($otoiawase);
?>

<div id="h-out">
<h2 class="wrapper" id="p-title">お問い合わせ<span>|　CNTACT US</span></h2>
</div>

<article id="conbox" class="wrapper" role="main">







<section id="form-wap">
<form id="form" class="form" method="POST" action="http://www.seostyle.net/wp-content/themes/newseostyle/mail-contact-sendmail.php">

<dl class="cf">
<dt>
お問い合わせ内容
</dt>

<dd>
<?php echo $naiyou ?>
</dd>
</dl>


<dl class="cf">
<dt>
会社名
</dt>

<dd>
<?php echo $cnpname ?>
</dd>

</dl>


<dl class="cf">
<dt>
お名前
</dt>

<dd>
<?php echo $namey ?>
</dd>

</dl>


<dl class="cf">
<dt>
メールアドレス
</dt>

<dd>
<?php echo $ad ?>
</dd>


</dl>


<dl class="cf">
<dt>
お電話番号
</dt>

<dd>
<?php echo $tell ?>
</dd>


</dl>


<dl class="cf">
<dt>
ご意見・お問い合わせ
</dt>
<dd>
<?php echo $otoiawase ?>
</dd>


</dl>





<div id="entrybutton">
    <p><a href="javascript:history.back();"><img src="<?php echo get_template_directory_uri(); ?>/images/remodo.gif" alt="戻る" /></a></p>
    <button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/images/send-b.gif" alt="送信ボタン"></button>
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


<!--<input type="hidden" name="naiyou" value="<?php //echo $naiyou ?>">-->





</form>

</section>




</article>



<?php get_footer(); ?>