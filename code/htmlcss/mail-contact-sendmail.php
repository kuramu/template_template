<?php


$naiyou = $_POST["naiyou"];
$cnpname = $_POST["cnpname"];
$namey = $_POST["namey"];
$ad = $_POST["ad"];
$tell = $_POST["tell"];
$otoiawase = $_POST["otoiawase"];
$otoiawase = ereg_replace ("<br />","\n",$otoiawase);

		//メール送信
		mb_language("Ja") ;
		mb_internal_encoding("UTF-8") ;
		$urljump = 'http://www.seostyle.net/mail-contact-completion.php';
		$mailto = $ad;//宛先ユーザー用
		$mailto2 = "";//宛先管理者用
		$subject="【SEO STYLE】お問い合わせ受付のお知らせ";//件名ユーザー用
		$subject2="【SEO STYLE お問い合わせ】フォームメール投稿内容";	//件名管理者用
		$content = file_get_contents("mailTemplate/mail-contact.txt",true);//メールテンプレート  メールテンプレートファイルへのパス
		$content = str_replace("%%NAIYOU%%",$naiyou,$content);//置き換え単語
		$content = str_replace("%%CNPNAME%%",$cnpname,$content);//置き換え単語
		$content = str_replace("%%NAMEY%%",$namey,$content);//置き換え単語
		$content = str_replace("%%AD%%",$ad,$content);//置き換え単語
		$content = str_replace("%%TELL%%",$tell,$content);//置き換え単語
		$content = str_replace("%%OTOIAWASE%%",$otoiawase,$content);//置き換え単語

		$mailfrom="From:" .mb_encode_mimeheader("SEO STYLE運営事務局") ."<info@lifestyle-design.jp>"; //送信元

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//必須項目の取り出し
$necessary = $_POST;
unset($necessary['bikou']); //必須項目ではないので除外。必須項目ではないものを入れる
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




if (strpos($_SERVER["HTTP_USER_AGENT"], "Googlebot") == false && !in_array("", $necessary)) {
		mb_send_mail($mailto2,$subject2,$content,$mailfrom);//管理者向け送信処理 (宛先,件名,本文,送信元)
		mb_send_mail($mailto,$subject,$content,$mailfrom);	//ユーザー向け送信処理 (宛先,件名,本文,送信元)
   		header("Location: " . $urljump);
}


?>

