<?php if (wp_is_mobile()) :?>
	<?php get_header(sp); ?>
	<?php echo apply_filters('the_content', get_post_meta($post->ID, '_my_extend_editor', true)); ?>
	<?php get_footer(sp); ?>
<?php else: ?><!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->



<?php

get_header(); ?>


	<h2 id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>のページへ"><?php the_title(); ?></a>
	</h2>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php the_time('Y/n/j'); ?>


	<?php the_content(); ?>


	<?php endwhile; ?>

<?php else : ?>

<?php endif; ?>
<?php previous_post_link('%link', '＜　前の口コミへ'); ?>
<?php next_post_link('%link', '次の口コミへ　＞'); ?>


<!-- Wp-pagenavi     -->
<?php
/*
!!!大事!!!
<?php if(function_exists('wp_pagenavi')): ?>
	<div class="cf kekka-top kekka-bottom">
		<?php wp_pagenavi(); ?>
	</div>
<?php else : ?>
<?php endif; ?>
・Wp-pagenavi設定項目の確認（表示するページ数等）
・ページナビゲーションテキストは、タグ使用可（スタイル付けるとき必要）
・表示設定 1ページに表示する最大投稿数の確認

*/
?>
<?php

/*************************
固定ページ
**************************/

if (have_posts()) : query_posts('posts_per_page=20&paged='.$paged); ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<?php while (have_posts()) : the_post(); /* 繰り返し処理開始 */?>
<!-- 繰り返し処理 -->
<?php endwhile; /*繰り返し処理終了*/ ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php wp_reset_query();endif; ?>

<!-- Wp-pagenavi -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php endif; ?>