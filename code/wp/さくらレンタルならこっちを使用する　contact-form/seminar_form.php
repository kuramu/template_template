<?php
/*
Template Name: セミナーContactForm
 */
 ?>

	<?php get_header(); ?>

	<?php
        require_once(dirname(__FILE__).'/lib/functions.php');
        
	if (!empty($_POST['ContactForm'])){

		switch($_POST['ContactForm']){

			case 'confirm' :
                                confirm();
                                $data = getData();

				include_once(dirname(__FILE__).'/seminar/confirm.php');
                                break;

			case 'complate' :
                                complate();
                                $data = getData();
				include_once(dirname(__FILE__).'/seminar/complate.php');
                                
                                break;

		}

	}else{
                index();
                $data = getData();
		include_once(dirname(__FILE__).'/seminar/insert.php');
	}

	?>

	<?php get_footer(); ?>

