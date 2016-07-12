<?php if (wp_is_mobile()) :?>
<?php else: ?><!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
	<?php
get_header(); ?>


<?php
/* $post = $wp_query->post;
if ( in_category('kind') ) {
include(TEMPLATEPATH . '/single-kind.php');
} elseif ( in_category('life') ) {
include(TEMPLATEPATH . '/single-life.php');
} elseif ( in_category('question') ) {
include(TEMPLATEPATH . '/single-question.php');
} elseif ( in_category('kiji') ) {
include(TEMPLATEPATH . '/single-kiji.php');
}
*/
?>


<div itemscope itemtype="http://schema.org/Article" class="blog-box">

	<span itemprop="articleSection" class="sincha <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->category_nicename; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>

	<p class="b-hidu"><span itemprop="datePublished" content="<?php echo get_the_date("Y-n-j"); ?>"><?php echo get_the_date("Y.n.j"); ?></span><span><?php echo get_the_date("（D）"); ?><?php echo get_the_date("H:i"); ?></span></p>
	<h2 id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>のページへ"><?php the_title(); ?></a>
	</h2>
	<?php the_time('Y/n/j'); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

	<?php
	if ( has_post_thumbnail()) {
		echo '<p class="ga-chu"> ';
	the_post_thumbnail('large');
	echo '</p>';
	} else {
	echo '';
	};
	?>

	<!--
	<?php
	if ( has_post_thumbnail()) {
		echo '<p class="ga-chu"> ';
	the_post_thumbnail('large');
	echo '</p>';
	} else {
	echo '<p class="ga-chu"><img itemprop="image" src="' . get_bloginfo('template_url') .'/images/b-no-img.gif" /></p>';
	};
	?>
	-->
	<div class="b-thecontent contentte" itemprop="articleBody">
	<?php the_content(); ?>
	</div>



	<?php endwhile; ?>

<?php else : ?>

<?php endif; ?>

</div><!-- blog-box-->


<?php previous_post_link('%link', '＜　前の口コミへ'); ?>
<?php next_post_link('%link', '次の口コミへ　＞'); ?>
<div id="prev_next" class="clearfix">  
<?php
$prevpost = get_adjacent_post(false, '', true); //前の記事
$nextpost = get_adjacent_post(false, '', false); //次の記事
if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
?>
<?php
 if ( $prevpost ) { //前の記事が存在しているとき
  echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="prev" class="clearfix">
        <div id="prev_title">PREV</div>
        ' . get_the_post_thumbnail($prevpost->ID, array(100,100)) . '
        <p>' . get_the_title($prevpost->ID) . '</p></a>';
 } else { //前の記事が存在しないとき
 echo  '<div id="prev_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
  </div></a></div>';
 }
 if ( $nextpost ) { //次の記事が存在しているとき
  echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="next" class="clearfix">  
        <div id="next_title">NEXT</div>
        ' . get_the_post_thumbnail($nextpost->ID, array(100,100)) . '
		<p>'. get_the_title($nextpost->ID) . '</p></a>';
 } else { //次の記事が存在しないとき
 echo '<div id="next_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
 </div></a></div>';
 }
?>
<?php } ?>
</div>

<!-- Wp-pagenavi     -->
<?php

/*
<?php if(function_exists('wp_pagenavi')): ?>
	<div class="cf kekka-top kekka-bottom">
		<?php wp_pagenavi(); ?>
	</div>
<?php else : ?>
<?php endif; ?>
!!!大事!!!

・Wp-pagenavi設定項目の確認（表示するページ数等）
・ページナビゲーションテキストは、タグ使用可（スタイル付けるとき必要）
・表示設定 1ページに表示する最大投稿数の確認

*/
?>


<?php

/*************************
カスタム投稿タイプ
**************************/

if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php
global $post;
$args = array(
'posts_per_page' => 20, /* 一覧に表示するページ数 */
'post_type' => 'nyan',/* 投稿タイプ */
'paged' => get_query_var( 'paged' ),/* ページネーションする場合は必須 */
);
$postslist = get_posts($args);
foreach ( $postslist as $post) : setup_postdata(post); /* 繰り返し処理開始 */
?>

<!-- 繰り返し処理 -->


<?php endforeach; /*繰り返し処理終了*/ ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<!-- Wp-pagenavi -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php endif; ?>