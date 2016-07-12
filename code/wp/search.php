<?php

get_header(); ?>

<h2><?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</h2>
<!-- 投稿情報 loop -->
<?php if(have_posts()) : ?>
    <?php while(have_posts()):the_post() ?>
        <h3><?php the_title(); ?></h3>
        <div class="post">
            <?php if (has_post_thumbnail()) : ?>
                <p class="postThumbnail"><?php the_post_thumbnail(); ?></p>
            <?php endif; ?>
            <p><?php the_content('詳細はこちら'); ?></p>
        </div><!-- /post -->
    <?php endwhile; ?>
<?php else: ?>
    <div class="post">
        <p>申し訳ございません。<br />該当する記事がございません。</p>
    </div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>