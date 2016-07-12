<?php


$company = $_POST["company"];

$names = $_POST["names"];

$posts = $_POST["posts"];
$emails = $_POST["emails"];
$issue02 = $_POST["issue02"];
$issue03 = '';
foreach($issue02 as $value){
	$issue03 .= $value."\r\n";
}

$comment = $_POST["comment"];
$comment = ereg_replace ("<br />","\n",$comment);
$quest01 = $_POST["quest01"];
$quest02 = '';
foreach($quest01 as $value){
	$quest02 .= $value."\r\n";
}

		//メール送信
		mb_language("Ja") ;
		mb_internal_encoding("UTF-8") ;
		$urljump = 'complete.html';
		$mailto = $emails;//宛先ユーザー用
		$mailto2 = "yoshikawa@lifestyle-design.jp";//宛先管理者用
		// $mailto2 = "ichishima@lifestyle-design.jp";
		$subject="【グローバル顧問】お問い合わせ受付のお知らせ";//件名ユーザー用
		$subject2="【グローバル顧問】フォームメール投稿内容";	//件名管理者用

		$content = file_get_contents("mailTemplate/mail-contact.txt",true);//メールテンプレート  メールテンプレートファイルへのパス
		$content2 = file_get_contents("mailTemplate/mail-contact2.txt",true);//メールテンプレート  メールテンプレートファイルへのパス

		$content = str_replace("%%COMPANY%%",$company,$content);//置き換え単語
		$content = str_replace("%%NAMES%%",$names,$content);//置き換え単語
		$content = str_replace("%%POSTS%%",$posts,$content);//置き換え単語
		$content = str_replace("%%EMAILS%%",$emails,$content);//置き換え単語
		$content = str_replace("%%ISSUE02%%",$issue03,$content);//置き換え単語
		$content = str_replace("%%COMMENT%%",$comment,$content);//置き換え単語
		$content = str_replace("%%QUEST01%%",$quest02,$content);//置き換え単語



		$content2 = str_replace("%%COMPANY%%",$company,$content2);//置き換え単語
		$content2 = str_replace("%%NAMES%%",$names,$content2);//置き換え単語
		$content2 = str_replace("%%POSTS%%",$posts,$content2);//置き換え単語
		$content2 = str_replace("%%EMAILS%%",$emails,$content2);//置き換え単語
		$content2 = str_replace("%%ISSUE02%%",$issue03,$content2);//置き換え単語
		$content2 = str_replace("%%COMMENT%%",$comment,$content2);//置き換え単語
		$content2 = str_replace("%%QUEST01%%",$quest02,$content2);//置き換え単語


		$mailfrom="From:" .mb_encode_mimeheader("グローバル顧問") ."<info@>"; //送信元



		mb_send_mail($mailto,$subject,$content,$mailfrom);	//ユーザー向け送信処理 (宛先,件名,本文,送信元)
		mb_send_mail($mailto2,$subject2,$content2,$mailfrom);//管理者向け送信処理 (宛先,件名,本文,送信元)
   		header("Location: " . $urljump);

?>

