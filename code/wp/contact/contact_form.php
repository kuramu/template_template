

<?php if (wp_is_mobile()) :?>



<?php

if((strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !==false)||

(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !==false))

{

    header('location: /contact/contact_form.php');

}else{

    header('location: /contact/contact_formsp.php');

}

?>



<?php else: ?>









<?php



/*

Template Name: contactForm

 */



/**

 *　必要なファイルを呼び込む

 * 関数ファイル

 *

 */

get_header();



?>





<main id="main-content" role="main">

            <section class="top-box">



























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



			include_once(dirname(__FILE__).'/Template/contact/confirm.php');

		break;

		case 'complate' :

			$Contact->complate();

			$data = getData();

			include_once(dirname(__FILE__).'/Template/contact/complate.php');

		break;

	}

}else{

	//POST情報にContactFormがない場合は、入力画面へ遷移

	$Contact->index();

	$data = getData();

	include_once(dirname(__FILE__).'/Template/contact/insert.php');

}



/**

 * フッター情報取得

 *

 *

 */



?>



<?php

get_footer();


?>

<?php endif; ?>