<?php if (wp_is_mobile()) :?>
<?php else: ?><!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
	<?php

get_header(); ?>


<?php if ( have_posts() ) : ?>


	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_time('Y/n/j'); ?>

		<h2 id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>のページへ"><?php the_title(); ?></a>
		</h2>
		<?php the_content(); ?>


	<?php endwhile; ?>

<?php else : ?>

<?php endif; ?>
<?php previous_post_link('%link', '＜　前の口コミへ'); ?>
<?php next_post_link('%link', '次の口コミへ　＞'); ?>

<!-- pager -->
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<!-- /pager     -->

<div class="cf kekka-top kekka-bottom w632">

    <?php if ( have_posts() ) :
        my_result_count();  // ここら辺で表示します
    else :
        /* Nothing Found */
    endif;?>

<!--プラグインのwp_pagenaviの出力を変更
<nav class="box-pagination-01">
  <ul>
    <li><span class='pages'>5 / 10</span></li>
    <li><a class="first" href="#">« 先頭</a></li>
    <li><a class="previouspostslink" rel="prev" href="#">«</a></li>
    <li><span class='extend'>...</span></li>
    <li><a class="page smaller" href="#">3</a></li>
    <li><a class="page smaller" href="#">4</a></li>
    <li><span class='current'>5</span></li>
    <li><a class="page larger" href="#">6</a></li>
    <li><a class="page larger" href="#">7</a></li>
    <li><span class='extend'>...</span></li>
    <li><a class="larger page" href="#">10</a></li>
    <li><span class='extend'>...</span></li>
    <li><a class="nextpostslink" rel="next" href="#">»</a></li>
    <li><a class="last" href="#">最後 »</a></li>
  </ul>
</nav>
となる
-->
    <?php wp_pagenavi(); ?>
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
</div>


<!--
記事が所有するターム一覧を下記のような方法で出力してみます。
（archive.phpなどで記事を一覧表示させ、その各記事ごとに属するタームを表示させる場合）
-->
<?php
/*
$terms = wp_get_object_terms($post->ID,'info_cat');
if (!empty($terms) && !is_wp_error($terms)) {
  echo '<ul class="cat">';
  usort($terms,"cmp_parent");
  foreach ($terms as $term) {
    echo '<li class="cat-'.esc_attr($term->parent).'">'.esc_html($term->name).'</li>';
  }
  echo '</ul>';
}
*/
?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php endif; ?>