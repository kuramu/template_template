<?php


$shokushu = $_POST["shokushu"];
$name2 = $_POST["name2"];
$hurigana2 = $_POST["hurigana2"];
$seibetu = $_POST["seibetu"];
$nen = $_POST["nen"];
$tuki = $_POST["tuki"];
$hi = $_POST["hi"];
$address2 = $_POST["address2"];
$tell2 = $_POST["tell2"];
$shiboudouki = $_POST["shiboudouki"];
$shiboudouki = ereg_replace ("<br />","\n",$shiboudouki);

		//メール送信
		mb_language("Ja") ;
		mb_internal_encoding("UTF-8") ;
		$urljump = 'http://cyestc.com/mail-recruit-completion.php';
		$mailto = $address2;//宛先ユーザー用
		$mailto2 = "recruit@cyestc.com,yoshikawa@lifestyle-design.jp,kuzawa@lifestyle-design.jp,y.tsukasaki@cyestc.com,joe.m@executivesjapan.com";//宛先管理者用
		// $mailto2 = "ichishima@lifestyle-design.jp";
		$subject="【サイエスト株式会社】エントリーフォーム受付のお知らせ";//件名ユーザー用
		$subject2="【サイエスト株式会社】エントリーフォーム投稿内容";	//件名管理者用

		$content = file_get_contents("mailTemplate/mail-recruit.txt",true);//メールテンプレート  メールテンプレートファイルへのパス
		$content2 = file_get_contents("mailTemplate/mail-recruit2.txt",true);//メールテンプレート  メールテンプレートファイルへのパス

		$content = str_replace("%%SHOKUSHU%%",$shokushu,$content);//置き換え単語
		$content = str_replace("%%NAME2%%",$name2,$content);//置き換え単語
		$content = str_replace("%%HURIGANA2%%",$hurigana2,$content);//置き換え単語
		$content = str_replace("%%SEIBETU%%",$seibetu,$content);//置き換え単語
		$content = str_replace("%%NEN%%",$nen,$content);//置き換え単語
		$content = str_replace("%%TUKI%%",$tuki,$content);//置き換え単語
		$content = str_replace("%%HI%%",$hi,$content);//置き換え単語
		$content = str_replace("%%ADDRESS2%%",$address2,$content);//置き換え単語
		$content = str_replace("%%TELL2%%",$tell2,$content);//置き換え単語
		$content = str_replace("%%SHIBOUDOUKI%%",$shiboudouki,$content);//置き換え単語

		$content2 = str_replace("%%SHOKUSHU%%",$shokushu,$content2);//置き換え単語
		$content2 = str_replace("%%NAME2%%",$name2,$content2);//置き換え単語
		$content2 = str_replace("%%HURIGANA2%%",$hurigana2,$content2);//置き換え単語
		$content2 = str_replace("%%SEIBETU%%",$seibetu,$content2);//置き換え単語
		$content2 = str_replace("%%NEN%%",$nen,$content2);//置き換え単語
		$content2 = str_replace("%%TUKI%%",$tuki,$content2);//置き換え単語
		$content2 = str_replace("%%HI%%",$hi,$content2);//置き換え単語
		$content2 = str_replace("%%ADDRESS2%%",$address2,$content2);//置き換え単語
		$content2 = str_replace("%%TELL2%%",$tell2,$content2);//置き換え単語
		$content2 = str_replace("%%SHIBOUDOUKI%%",$shiboudouki,$content2);//置き換え単語
		$mailfrom="From:" .mb_encode_mimeheader("サイエスト株式会社") ."<recruit@cyestc.com>"; //送信元


		mb_send_mail($mailto,$subject,$content,$mailfrom);	//ユーザー向け送信処理 (宛先,件名,本文,送信元)
		mb_send_mail($mailto2,$subject2,$content2,$mailfrom);//管理者向け送信処理 (宛先,件名,本文,送信元)
   		header("Location: " . $urljump);

?>

