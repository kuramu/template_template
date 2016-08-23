<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<!--　ALL IN ONESEOではカスタム投稿のアーカイブページのtitleがでてこないため -->
<?php if ( is_post_type_archive() ) : ?>
<title><?php post_type_archive_title(); ?> ｜ <?php bloginfo('name'); ?></title>
<?php else :?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php endif;?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" media="all">


<?php
wp_deregister_script('jquery-ui-core');
 ?>
<?php wp_head(); ?>

<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
<![endif]-->

<?php
echo '<script type="text/javascript">var templatePath = "' . get_template_directory_uri() . '";</script>';
//js内
/*
templatePath + '/images/btn-view-more.gif'
$(this).find("img").attr("src",templatePath +"/images/top-close.gif");
$("#loading p").html("<img src='" + templatePath +"/images/gif-load.gif'/>");
*/
?>

<!-- カスタムフィールドを使って記事ごとにスタイルシートを設定する カスタムフィールドに css という名前をつけて、値にスタイルを書けば、<style> タグが出力されて記事ごとにスタイルシートを設定できます。 -->
<?php if (is_single()) : ?>
<?php $css = get_post_meta($post->ID, 'css', true); ?>
<?php if (!empty($css)) : ?>
        <style type="text/css">
        <?php echo $css; ?>
        </style>
<?php endif; ?>
<?php endif; ?>

<!-- 外部CSSを読み込みたい場合css という名前のカスタムフィールドの値に、別途用意したスタイルシートのURLを入力すればOK -->
<?php if (is_single()) : ?>
<?php $css = get_post_meta($post->ID, 'css', true); ?>
<?php if (!empty($css)) : ?>
        <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
<?php endif; ?>
<?php endif; ?>

</head>
<body <?php //body_class(); ?>>




<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>


<?php wp_nav_menu(array('theme_location' => 'gnav','container' => false,'menu_id' => 'gnav')); ?>
<!--
カスタムメニューを表示させたいテンプレートファイルの任意の位置に下記を挿入。
// グローバルナビ
<?php wp_nav_menu(array('theme_location' => 'gnav','container' => false,'menu_id' => 'gnav')); ?>
// サイドナビ
<?php wp_nav_menu(array('theme_location' => 'sidenav','container' => false,'menu_id' => 'sidenav')); ?>
// フッターナビ
<?php wp_nav_menu(array('theme_location' => 'footernav','container' => false,'menu_id' => 'fnav')); ?>

キーワード	省略時の値	意味
menu	''	カスタムメニューのIDを指定
container	'div'	ナビゲーションメニューを囲むタグ名を指定
container_class	''	ナビゲーションメニューを囲むタグのクラス名を指定
container_id	''	ナビゲーションメニューを囲むタグのIDを指定
menu_class	'menu'	ナビゲーションメニューを囲むタグのクラス名を指定
menu_id	''	ナビゲーションメニューを囲むタグのIDを指定
echo	true	ナビゲーションメニューを表示する場合はtrue、文字列として取得する場合はfalseを指定
fallback_cb	'wp_page_menu'	メニューが存在しない場合に実行するコールバック関数名を指定（wp_page_menu）
before	''	メニューのリンク（aタグ）の前に出力する文字列を指定
after	''	メニューのリンク（aタグ）の後に出力する文字列を指定
link_before	''	メニューの文字列の前に出力する文字列を指定
link_after	''	メニューの文字列の後に出力する文字列を指定
depth	0	階層数を指定（0はすべてを表示、1ならばメニューバーのみ）。
walker	''	コールバック関数名を指定
theme_locaution	''	テーマ内のロケーションIDを指定。
-->



