


    固定ページの現在いる階層別の分岐
    <?php if ( is_nobugot_special_subpage_checke() ): ?>
        子ページ及び孫ページ
    <?php else: ?>
        その他
    <?php endif ?>

<!-- カレント付きカテゴリリスト-->
<ul>
<?php
  $categories = get_categories('hide_empty=1&title_li=&taxonomy=category&exclude=1');
  if (is_array($categories)) {
    foreach($categories as $category):
      $cat_id = $category->cat_ID;
      $cat_title = $category->cat_name;
      $cat_url = get_category_link($cat_id);
      echo "<li";
      if (is_category($cat_id)) {
        echo ' class="current"';
      }
      echo "><a href='$cat_url' title='$cat_title'>$cat_title</a></li>";
    endforeach;
  }
?>
</ul>


<ul>
<?php wp_list_categories(array('title_li'=>'', 'taxonomy'=>'uservoicecategory', 'show_count'=>1)); ?>
</ul>

<!-- サイドバーカテゴリ出力　スラッグ名をクラスに出力-->
<ul>
<?php
$args=array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories=get_categories($args);
foreach($categories as $category) {
  echo '<li class="cat-'. $category-> slug .'">';
  echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
  echo '</li>';
}
?>
</ul>


<?php $myposts = get_posts('numberposts=4&category=24'); foreach($myposts as $post) : ?>
<dl class="side-osusuem">
                    <dt><time pubdate datetime="<?php the_time('Y/n/j'); ?>"><?php the_time('Y/n/j'); ?></time></dt>

<dd><span>&#9656;</span><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></dd>
                </dl>
<?php endforeach; ?>
----------
<?php
    $categories = get_categories('parent=0&hide_empty=0&orderby=id');
    if (is_array($categories)) {
        foreach($categories as $category):
            $v_cat_id = $category->cat_ID;
            $v_cat_Parent_title = $category->cat_name;
            $v_cat_Parent_t_a = wp_specialchars($v_cat_Parent_title);
            $v_cat_Parent_t_u = attribute_escape($v_cat_Parent_title);
            $v_cat_Parent_url = get_category_link($v_cat_id);
            $v_cat_child_list = wp_list_categories("orderby=id&hide_empty=0&title_li=&use_desc_for_title=0&child_of=$v_cat_id&depth=1&echo=0&sort_column=name&optioncount=1&hide_empty=1&hierarchical=0&exclude=24");
            if ( strpos($v_cat_child_list, __('No categories')) === false) {
                echo "<ul>\n$v_cat_child_list\n</ul>\n";
            }
        endforeach;
    }
?>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('side') ) : ?>
<?php endif; ?>
