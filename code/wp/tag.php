<?php if (wp_is_mobile()) :?>
<?php else: ?><!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
	<?php

get_header(); ?>



		<?php if ( have_posts() ) : ?>



			<?php while ( have_posts() ) : the_post(); ?>


			<?php the_title(); ?>
			<?php the_time('Y/n/j'); ?>

			<?php the_content(); ?>


			<?php endwhile; ?>



		<?php else : ?>

		<?php endif; ?>

<?php previous_post_link('%link', '＜　前の口コミへ'); ?>
<?php next_post_link('%link', '次の口コミへ　＞'); ?>

<div class="cf kekka-top kekka-bottom w632">

    <?php if ( have_posts() ) :
        my_result_count();  // ここら辺で表示します
    else :
        /* Nothing Found */
    endif;?>
    <?php wp_pagenavi(); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php endif; ?>