<?php



/*

Template Name: contactFormsp

 */



/**

 *　必要なファイルを呼び込む

 * 関数ファイル

 *

 */

get_header(sp);



?>















<?php

require_once(dirname(__FILE__).'/lib/functions.php');



/**

 * コントローラーの読み込み

 *

 */

include_once(dirname(__FILE__).'/Controller/Contact.php');

$Contact = New Contact();

/**

 * メインコンテンツ読み込み

 *

 *

 */

if (!empty($_POST['ContactForm'])){

	switch($_POST['ContactForm']){

		case 'confirm' :

			$Contact->confirm();

			$data = getData();



			include_once(dirname(__FILE__).'/Template/contact-sp/confirm.php');

		break;

		case 'complate' :

			$Contact->complate();

			$data = getData();

			var_dump($data);

			include_once(dirname(__FILE__).'/Template/contact-sp/complate.php');

		break;

	}

}else{

	//POST情報にContactFormがない場合は、入力画面へ遷移

	$Contact->index();

	$data = getData();

	include_once(dirname(__FILE__).'/Template/contact-sp/insert.php');

}



/**

 * フッター情報取得

 *

 *

 */



?>



<?php

get_footer(sp);

?>