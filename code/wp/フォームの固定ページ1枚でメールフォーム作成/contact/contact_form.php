<?php
/*
Template Name: ContactForm
 */
 ?>

<?php if (wp_is_mobile()) :// 携帯ｔの場合:?>
	<?php get_header('sp'); ?>
<?php else: // PCの場合?>
	<?php get_header(); ?>
<?php endif; ?>


	<?php

	require_once(dirname(__FILE__).'/lib/functions.php');



	/**

	 * コントローラーの読み込み

	 *

	 */

	include_once(dirname(__FILE__).'/Controller/Contact.php');

	$contact = New Contact();

	/**

	 * メインコンテンツ読み込み

	 *

	 *

	 */

	if (!empty($_POST['ContactForm'])){

		switch($_POST['ContactForm']){

			case 'confirm' :

				$contact->confirm();

				$data = getData();



				include_once(dirname(__FILE__).'/Template/Contact/confirm.php');

			break;

			case 'complate' :

				$contact->complate();

				$data = getData();

				include_once(dirname(__FILE__).'/Template/Contact/complate.php');

			break;

		}

	}else{

		//POST情報にContactFormがない場合は、入力画面へ遷移

		$contact->index();

		$data = getData();

		include_once(dirname(__FILE__).'/Template/Contact/insert.php');

	}

	?>

<?php if (wp_is_mobile()) :// スマホｔの場合:?>
	<?php get_footer('sp'); ?>
<?php else: // PCの場合?>
	<?php get_footer(); ?>
<?php endif; ?>

