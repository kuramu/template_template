<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="" />
<link href="<?php echo get_template_directory_uri(); ?>/sp/css/style.css" rel="stylesheet" type="text/css" media="all">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>




<?php wp_head(); ?>

<meta name="format-detection" content="telephone=no" />

</head>
<body <?php body_class(); ?>>
