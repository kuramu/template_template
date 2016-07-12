<?php if (wp_is_mobile()) :?>
<?php else: ?><!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
	<?php

get_header(); ?>


<?php if ( have_posts() ) : ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>



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
<!-- /pager-->

<div class="cf kekka-top kekka-bottom w632">

    <?php if ( have_posts() ) :
        my_result_count();  // ここら辺で表示します
    else :
        /* Nothing Found */
    endif;?>
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



<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php endif; ?>