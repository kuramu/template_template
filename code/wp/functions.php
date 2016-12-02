<?php
//pre_get_postsの実際のコード例

/*

function pre_get_posts_custom($query) {
  if( is_admin() || ! $query->is_main_query() ){
      return;
  }


  //カテゴリーページの表示件数を5件にし、カテゴリID2を除外する
  if ( $query->is_category() ) {
      $query->set( 'posts_per_page', '5' );
      $query->set( 'cat','-2' );
      return;
  }

  //検索結果ページで固定ページやカスタム投稿を除外する

  if( $query->is_search() ){
     $query->set( 'post_type','post' );
     return;
  }

 // カスタム投稿アーカイブartistページで
  //カスタム投稿タイプ:artistでタクソノミーfrom内にあるタームusの記事を取得する

  if( $query->is_post_type_archive( 'artist' ) ){
   $taxquery = array(
        array(
           'taxonomy' => 'from',
           'field' => 'slug',
           'terms' => array( 'us' )
        )
   );
   $query->set( 'tax_query' , $taxquery );
  }

  //Feed(RSS)ページでカスタム投稿タイプ(複数ある場合)も含めて出力させる

  if( $query->is_feed() ){
   $query->set( 'post_type',array( 'foo','bar' ) );
  }

}
add_action( 'pre_get_posts', 'pre_get_posts_custom' );

*/


//////////////////////////
//pre_get_posts ページ条件
/*

TOPページ
$query->is_home()

詳細ページ
$query->is_single()

固定ページ
$query->is_page()

アーカイブページ
$query->is_archive()

カスタム投稿タイプアーカイブページ カスタム投稿タイプを入れてください
$query->is_post_type_archive( 'post_type' )

日付アーカイブページ
$query->is_date()

年別アーカイブページ
$query->is_year()

月別アーカイブページ
$query->is_month()

制作者アーカイブページ
$query->is_author()

カテゴリーページ
$query->is_category()

カテゴリーページ 配列での指定(カテゴリID3,カテゴリスラッグfoo,カテゴリ名Bar barのいずれか)
$query->is_category( array(3,'foo','Bar bar') )

タグページ
$query->is_tag()

タクソノミーページ
$query->is_tax()

タクソノミーページ fooというスラッグのタクソノミーアーカイブが表示された時
$query->is_tax( 'foo' )

タクソノミーページ bar1,bar2のスラッグがfooタクソノミーアーカイブで表示された時
$query->is_tax( 'foo', array('bar1','bar2') )

検索結果ページ
$query->is_search()

フィードページ
$query->is_feed()

404ページ
$query->is_404()
*/

  //pre_get_posts 色々なクエリがセット可能ですが、いくつかご紹介致します。
/*

現在のページ番号を取得
$query->set( 'paged',get_query_var( 'paged' ) );

表示数の変更
$query->set( 'posts_per_page',5  );

特定タクソノミーの取得 タクソノミー:foo_cat,ターム:slug_foo
$taxquery = array(
 array(
   'taxonomy' => 'foo_cat',
   'field' => 'slug',
   'terms' => array( 'slug_foo' )
 )
);
$query->set( 'tax_query' , $taxquery );

カテゴリーID3の記事取得
$query->set( 'cat','3' );

カテゴリーID2の記事を除外する
$query->set( 'cat','-2' );

特定カテゴリー名の記事を取得する(スラッグ指定)
$query->set( 'category_name','foo' )

特定カテゴリーを除外する
$query->set( 'category__not_in',array(2,3) );

取得する記事のタイプを投稿のみにする(固定ページやカスタム投稿タイプを除外する)
$query->set( 'post_type','post' );
*/






//////////////////////////
  //ライトボックスプラグインなどもjquery読み込めるためFunction化
  function modify_jquery() {
      if (!is_admin()) {
          // comment out the next two lines to load the local copy of jQuery
          wp_deregister_script('jquery');//Wordpress内で参照しているjQueryは使用しない
          wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, '1.10.1');
          wp_enqueue_script('jquery');
      }
  }
  add_action('init', 'modify_jquery');


/*
 * 親テーマのディレクトリまでのパスを取得するショートコードを追加
ショートコードを使わない場合
echo get_post_meta(get_the_ID(), 'custom_field_name', true);
ショートコードを使う場合
echo apply_filters('the_content', get_post_meta(get_the_ID(), 'custom_field_name', true));
実際のカスタムフィールドには下記のように入力すれば良いかと思われます。
<script src="[theme_url]/js/sample.js"></script>
 */
function getTemplateDirectoryUrl() {
    return get_template_directory_uri();
}
add_shortcode('theme_url','getTemplateDirectoryUrl');


/**
 * Dequeue resources ハンドル名を指定して不用JSとCSSを削除する。
 **/
/*
function my_dequeue_styles() {
    wp_dequeue_style( 'wp-pagenavi' ); //不用CSSを削除
    wp_dequeue_style( 'wordpress-popular-posts' );
    wp_dequeue_style( 'wp-social-bookmarking-light' );
    wp_dequeue_style( 'msl-main' );
    wp_dequeue_style( 'msl-custom' );
}
add_action( 'wp_print_styles', 'my_dequeue_styles' );

function my_dequeue_scripts() {
    wp_dequeue_script( 'masterslider-core' );  //不用JSを削除 (例)
}
add_action( 'wp_print_scripts', 'my_dequeue_scripts' );
*/


/*
functions.phpで外部CSSの読み込みを一括管理する
*/
/*
function register_style() {
  wp_register_style('style', get_bloginfo('template_directory').'/style.css');
  wp_register_style('home', get_bloginfo('template_directory').'/css/home.css');
  wp_register_style('single', get_bloginfo('template_directory').'/css/single.css');
  wp_register_style('category', get_bloginfo('template_directory').'/css/category.css');
  wp_register_style('archive-information', get_bloginfo('template_directory').'/css/archive-information.css');
  wp_register_style('page', get_bloginfo('template_directory').'/css/page.css');
}
   function add_stylesheet() {
     register_style();
     // 全ページ共通
     wp_enqueue_style('style');
     // TOPページ専用
     if (is_home()){
        wp_enqueue_style('home');
     }
     // 投稿・カスタム投稿ページ専用
     elseif (is_single()) {
        wp_enqueue_style('single');
     }
     // カテゴリページ専用
     elseif (is_category()) {
        wp_enqueue_style('category');
     }
     // カスタム投稿アーカイブページ専用
     elseif (is_post_type_archive('ポストタイプ名')) {
        wp_enqueue_style('archive-information');
     }
     // 固定ページ専用
     elseif (is_page()) {
        wp_enqueue_style('single');
     }
   }
add_action('wp_print_styles', 'add_stylesheet');
*/

/*
functions.phpで外部Javascriptの読み込みを一括管理する
*/

/*
if (!is_admin()) {
   function register_script(){
     wp_register_script('rollover', get_bloginfo('template_directory').'/js/rollover.js');
     wp_register_script('slide', get_bloginfo('template_directory').'/js/slide.js');
     wp_register_script('jquery-lightbox', get_bloginfo('template_directory').'/js/jquery-lightbox.js');
   }
   function add_script() {
     register_script();
     // 全ページ共通
     wp_enqueue_script('rollover');
     // TOPページ専用
     if (is_home()) {
        wp_enqueue_script('slide');
     }
     // 固定ページIDが“1”と“3”のページ専用
     elseif (is_page(array(1,3))) {
        wp_enqueue_script('jquery-lightbox');
     }
   }
   add_action('wp_print_scripts', 'add_script');
}
*/

/*
テーマのメインコンテンツの横幅をあらかじめ定義するには、functions.php 内で $content_width を指定します。こうすることでメディアにアップロードされた画像や、YouTube等の外部埋め込みメディアもコンテンツ幅にピッタリサイズで表示されるようになり、別のテーマに変更した時もその値が保持されます。各プラグインでも最適化されるように設計されていますよ。ちなみにWordPressの公式テーマディレクトリーにテーマを登録するには、この $content_width の設定が必須です。幅の値はお好みで調整してくださいね！
*/
if ( ! isset( $content_width ) ) {
  $content_width = 700;
}

//検索のためのポストタイプの部分でどこを検索するか調べあられう
function enable_post_type_search_template($template){
    if ( is_search() ) {
        $post_types = get_query_var('post_type');

        foreach ( (array) $post_types as $post_type )
            $templates[] = "search.php";
        $templates[] = 'search.php';

        $template = get_query_template('search',$templates);
    }
    return $template;
}
add_filter('template_include','enable_post_type_search_template');


//投稿form内でもコメントアウトタグが使えるように鳴る
remove_filter( 'the_content', 'wptexturize' );

// スラッグが「contact」以外のページからスタイルを削除する
add_action( 'wp_print_styles', 'deregister_styles' );
function deregister_styles() {
  if ( ! is_page( 'contact' ) ) {
    wp_deregister_style( 'contact-form-7' );
  }
  // IDが「10」以外のページからスタイルを削除する
    if ( ! is_page(10) ) {
    wp_deregister_style( 'contact-form-7' );
  }
}



// 全ページからスタイルを削除する
/*
add_action( 'wp_print_styles', 'deregister_styles' );
function deregister_styles() {
  wp_deregister_style( 'contact-form-7' );
}
*/

// 全ページからスクリプトを削除する
/*
add_action( 'wp_print_scripts', 'deregister_scripts' );
function deregister_scripts() {
  wp_deregister_script( 'contact-form-7' );
}
*/

//スマホ用のcontentスツ力のカスタムフィールドを用意
//meta boxを追加
//add_action( 'admin_init', 'custom_editor_input_meta_box' );
//edit_form_after_editor で追加
/* これで出力 <?php echo apply_filters('the_content', get_post_meta($post->ID, '_my_extend_editor', true)); ?>

これは？？→<?php echo get_post_meta($post->ID,'_my_extend_editor',true);?> */
add_action( 'edit_form_after_editor', 'custom_editor_input' );
add_action( 'save_post', '_metabox_save' );

function custom_editor_input_meta_box() {

    add_meta_box( 'extend_edit_field', 'extend edit field', 'custom_editor_input', 'post', 'normal', 'high' );
}

function custom_editor_input() {
    global $post;
    $args= array(
                'textarea_rows'=> 6,
                'teeny'=> false,
                'quicktags'=> true
            );
    echo '<h2>スマホ用コンテンツ</h2>';
echo '<input type="hidden" name="extend_edit_field_noncename" id="extend_edit_field_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

    $content= get_post_meta($post->ID,'_my_extend_editor',true);
    wp_editor( $content, 'my_extend_editor',$args );
}

function _metabox_save($post_id) {
    if ( ! wp_verify_nonce( $_POST['extend_edit_field_noncename'], plugin_basename(__FILE__) )) {
     return $post->ID;
 }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    $custom_css= $_POST['my_extend_editor'];
    update_post_meta($post_id, '_my_extend_editor', $custom_css);
}


////////////////////////
//本体のアップデート通知を非表示
//add_filter('pre_site_transient_update_core', create_function('$a', "return  null;"));
//プラグインの更新情報を非表示
/*
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
*/
    // コアファイルの自動更新をすべて無効化
//add_filter( 'auto_update_core', '__return_false' );

    // メジャーアップグレードの更新を有効化
//add_filter( 'allow_major_auto_core_updates', '__return_true' );

    // マイナーアップグレードの更新を無効化
//add_filter( 'allow_minor_auto_core_updates', '__return_false' );

    // 開発版の更新を有効化
//define( 'WP_AUTO_UPDATE_CORE', true );

    // すべての自動更新を無効化する
//add_filter( 'automatic_updater_disabled', '__return_true' );




add_action( 'init', 'nekomimi_auto_update' );

function nekomimi_auto_update() {
    // 開発版の更新を有効化
    // add_filter( 'allow_dev_auto_core_updates', '__return_true' );

    // マイナーアップグレードの自動更新を無効化
     //add_filter( 'allow_minor_auto_core_updates', '__return_false' );

    // メジャーアップグレードの自動更新を有効化
    // add_filter( 'allow_major_auto_core_updates', '__return_true' );

    // プラグインの自動更新を有効化
    // add_filter( 'auto_update_plugin', '__return_true' );

    // テーマファイルの自動更新を有効化
    // add_filter( 'auto_update_theme', '__return_true' );

    // 翻訳ファイルの自動更新を無効化
     //add_filter( 'auto_update_theme', '__return_false' );

    // 通知メール機能を無効化
     //add_filter( 'auto_core_update_send_email', '__return_false' );

    // 通知メールにデバッグ情報の表示を含める
    // add_filter( 'automatic_updates_send_debug_email', '__return_true' );

    // 通知メールの宛先を変更する
    //
}

//ショートコードの作り方//投稿画面で [follow] と//////////////////////

function follow_me() {
    return 'お気軽にフォローしてくださいね！ <a href="http://twitter.com/WebDesignRecipe">@WebDesignRecipe</a>';
}
add_shortcode('follow', 'follow_me');

//////////////////////////
//属性を付けたオリジナルショートコードの作り方//投稿画面では、[url href="http://webdesignrecipes.com/"]Webデザインレシピ[/url] とすれば OK////////////////////

function blank_link($atts, $content = null) {
  extract(shortcode_atts(array(
    "href" => 'http://'
  ), $atts));
  return '<a href="'.$href.'" target="_blank">'.$content.'</a>';
}
add_shortcode("url", "blank_link");


//Custom CSS Widget///カスタム CSS 専用のボックスが出現！ここに CSS を書くと、<head> 内に style タグで出力されます。////////////////////////////////////////
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
  if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
      echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
      endwhile; endif;
      rewind_posts();
  }
}
///////////////////////////////////////////

//ページネーションを追加
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination clearfix\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

/* ==wpの更新を非表示に========================
// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');
// APIによるバージョンチェックの通信をさせない
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');
//プラグイン更新通知を非表示 管理画面左メニューに赤丸で表示されるプラグイン更新通知を非表示
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
//テーマ更新通知を非表示 管理画面左メニューに赤丸で表示されるテーマ更新通知を非表示
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
==========================*/


/* ==========================
  ページネーション
//pagination

//ループ外に書きを記述
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>

function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination\">";
//         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged - 1)."\" class=\"arrow\">≪前へ</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href=\"".get_pagenum_link($i)."\" class=\"inactive\" >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\" class=\"arrow\">次へ≫</a>";
//         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}
==========================*/



/*
<div class="cf kekka-top w632">
<?php if ( have_posts() ) :
  my_result_count();  // ここら辺で表示します
  while ( have_posts() ) :
    the_post();
  endwhile;
else :
endif;?>
<?php wp_pagenavi(); ?>

/div>



■CSS
.wp-pagenavi a, .wp-pagenavi span {
    background-color: #FFFFFF;
    border: 1px solid #AAAAAA;
    border-radius: 5px;
    box-shadow: 2px 2px 0 #AAAAAA;
    display: block;
    font-weight: bold;
    padding: 5px;
    text-align: center;
      display: inline-block;
}

.wp-pagenavi .extend{
    border:0;
    box-shadow:none;
-webkit-box-shadow:none;
-moz-box-shadow:none;
-ms-box-shadow:none;
}

.wp-pagenavi span.current {
    background-color: #D0D0D0;
    border: 0 none;
    box-shadow: none;
    color: #FFF;
    display: inline-block;
     padding: 6px 7px;
}


.wp-pagenavi a:link,.wp-pagenavi a:visited {
    color:#474747;
}

.wp-pagenavi .nextpostslink{
    background-color: #8EC755;
}

.wp-pagenavi .nextpostslink:link, .wp-pagenavi .nextpostslink:visited {
    color:#fff;
}
.wp-pagenavi .last{
    display: none;
}
*/
//ページネーションの20 件中 1－5 件目を表示WPページnaviとからませる
function my_result_count() {
  global $wp_query;

  $paged = get_query_var( 'paged' ) - 1;
  $ppp   = get_query_var( 'posts_per_page' );
  $count = $total = $wp_query->post_count;
  $from  = 0;
  if ( 0 < $ppp ) {
    $total = $wp_query->found_posts;
    if ( 0 < $paged )
      $from  = $paged * $ppp;
  }
  printf(
    '<p class="zenkensu"><span>%1$s</span>件中 %2$s%3$s件目を表示</p>',
    $total,
    ( 1 < $count ? ($from + 1 . '〜') : '' ),
    ($from + $count )
  );
}



//固定ページではビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page(){
	global $typenow;
	if( $typenow == 'page' ){
		add_filter('user_can_richedit', 'disable_visual_editor_filter');
	}
}
function disable_visual_editor_filter(){
	return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

//※Breadcrumb NavXT設定  liを管理画面から入力するためにfunction.phpにを付け足す
function my_bcn_allowed_html($allowed_html)
{
 $allowed_html['li']= array(
 'title'=> true,
 'class'=> true,
 'id'=> true,
 'dir'=> true,
 'align'=> true,
 'lang'=> true,
 'xml:lang'=> true,
 'aria-hidden'=> true,
 'data-icon'=> true,
 'itemref'=> true,
 'itemid'=> true,
 'itemprop'=> true,
 'itemscope'=> true,
 'itemtype'=> true
 );
 return $allowed_html;
}
add_filter('bcn_allowed_html', 'my_bcn_allowed_html');



remove_action( 'wp_head', 'wp_generator' );
//WordPressのバージョンを示すmetaタグ
remove_action('wp_head', 'wp_shortlink_wp_head');
//link rel=’shortlink’    WordPressの投稿IDを使った短いURL（デフォルトのURL）を表示
remove_filter( 'the_content', 'wptexturize' );
//記事本文中にHTMLコメントタグを書けるための設定
remove_action( 'wp_head', 'rsd_link' );
//link rel="EditURI" type="application/rsd+xml" title="RSD"  リモート投稿をする時に使用。外部アプリケーションから情報を取得するためのプロトコル「RSD(Really Simple Discovery)」のリンクを吐き出す。ブログ投稿ツールを使っている時には必要。


//出力文字数制限設定す文字数以上は点々をつけるそれ以下は何もつけない
/*
ページ内に
<?php trim_str_by_chars( get_the_content(), 30 ); ?>
をいれるget_the_content()はget_the_title()でも可
*/
function trim_str_by_chars( $str, $len, $echo = true, $suffix = '...', $encoding = 'UTF-8' ) {
    if ( ! function_exists( 'mb_substr' ) || ! function_exists( 'mb_strlen' ) ) {
        return $str;
    }
    $len = (int)$len;
    if ( mb_strlen( $str = wp_specialchars_decode( strip_tags( $str ), ENT_QUOTES, $encoding ), $encoding ) > $len ) {
        $str = wp_specialchars( mb_substr( $str, 0, $len, $encoding ) . $suffix );
    }
    if ( $echo ) {
        echo $str;
    } else {
        return $str;
    }
}



//テーマをウィジェット対応にする
register_sidebar( array('name' => 'サイドバーウィジェット-1',
'id' => 'sidebar-1',
'description' => 'サイドバーのウェジェットエリア',//サイドバーの説明なのでなくても良い
'before_widget' => '<div id="%1$s" class="widget%2$s">',//%1$sは、ID・クラス付与のため
'after_widget' => '</div>',
'before_title' => '<h4 class="menu_underh2">',
'after_title' => '</h4>',
));
register_sidebars(1,array('name'=>'サイドバー1',
	'id' => 'sidebar-1',
	'description' => 'サイドバーのウェジェットエリア',//サイドバーの説明なのでなくても良い
    'before_widget' => '<ul><li>',
    'after_widget' => '</li></ul>',
    'before_title' => '<h4 class="menu_underh2">',
    'after_title' => '</h4>',
    ));
/*
//テーマでウィジェットが使えるようにしたので、次は編集したウィジェットをサイドバーに表示するようにします。

//‘name’=>’ ‘,で任意の名前にできます。
//そこで付けた名前をdynamic_sidebar(‘ ‘)の部分に記述します。
<div id="sidebar">
     <?PHP if(is_active_sidebar ('sidebar-1')):
          <!--管理画面で設定したものがあれば表示-->
          dynamic_sidebar('sidebar-1');
     else: ?>
          <!--管理画面で設定したものがない場合は以下で表示-->
          <div class="widget">
               <h2>ウィジェットなし</h2>
          </div>
     <?PHP endif; ?>
</div>
*/



//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//more-linkの#moreを消す
function remove_more_jump_link($link) {
  $offset = strpos($link, '#more-');
  if ($offset) {
    $end = strpos($link, '"',$offset);
  }
  if ($end) {
    $link = substr_replace($link, '', $offset, $end-$offset);
  }
  return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//コメント入力欄をカスタマイズしてウェブサイト(URL)やメールアドレスを簡単に消す
/*

add_filter('comment_form_default_fields', 'mytheme_remove_url');
function mytheme_remove_url($arg) {
$arg['url'] = '';
$arg['email'] = '';
return $arg;
}
*/
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//WordPress で「全◯件中◯件〜◯件目を表示」を表示する
//index.php, archive.php, category.php, date.php などの記事一覧系テンプレートファイルに、以下のように書きます。
/*if ( have_posts() ) :
  my_result_count();  // ここら辺で表示します
  while ( have_posts() ) :
    the_post();
  endwhile;
else :
endif;
*/
/*
function my_result_count() {
  global $wp_query;

  $paged = get_query_var( 'paged' ) - 1;
  $ppp   = get_query_var( 'posts_per_page' );
  $count = $total = $wp_query->post_count;
  $from  = 0;
  if ( 0 < $ppp ) {
    $total = $wp_query->found_posts;
    if ( 0 < $paged )
      $from  = $paged * $ppp;
  }
  printf(
    '<p>全%1$s件中 %2$s%3$s件目を表示</p>',
    $total,
    ( 1 < $count ? ($from + 1 . '〜') : '' ),
    ($from + $count )
  );
}
*/
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//WordPressでビジュアルエディタ表示と、実際に投稿された時の表示を揃えるカスタマイズ方法
//editor-style.cssを都度サイトのレイアウトに似せる形で書き換える


add_theme_support('editor-style');
add_editor_style('editor-style.css');
function custom_editor_settings( $initArray ){
	$initArray['body_class'] = 'editor-area';
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//カスタムメニュー  functions.phpに下記を挿入し、
register_nav_menus(array(
  'gnav' => 'グローバルナビ',
  'sidenav' => 'サイドナビ',
  'footernav' => 'フッターナビ'
));
/*


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

/*

/*
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
削除するもの
remove_action( 'wp_head', 'feed_links_extra', 3 );
//link rel=”alternate” サイト全体とコメントのRSSフィードを削除する場合
remove_action( 'wp_head', 'feed_links', 2 );
//feed_links    サイト全体へのfeedを出力する。

remove_action( 'wp_head', 'wlwmanifest_link' );
//link rel="wlwmanifest" type="application/wlwmanifest+xml"  これもリモート投稿用
remove_action( 'wp_head', 'index_rel_link' );
//linkタグを出力。出力されたリンク先が、現在の文書に対する「索引（インデックス）」であることを示す。
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
//・parent_post_rel_link、start_post_rel_link、adjacent_posts_rel_link  ブラウザが先読みするためlink rel="next"などのタグを吐き出す。FireFoxなどではサーバーかける負荷があがるとも。
削除すると、FireFoxプラグインのAutoPagenizeは動作しなくなる（ここから出力される情報を元にリンク先を取りに行くので）
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
//link rel=’prev’ と link rel=’next’  前の文書と次の文書へのリンクを表示するもの
remove_action('wp_head', 'wp_shortlink_wp_head');
//link rel=’shortlink’    WordPressの投稿IDを使った短いURL（デフォルトのURL）を表示
remove_filter( 'the_content', 'wptexturize' );
//記事本文中にHTMLコメントタグを書けるための設定

//※必要あれば
function remove_default_post_screen_metaboxes() {
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');
/*


/*
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
特定の親カテゴリとその子カテゴリのみに反映させたいとき
<?php if ( in_category('wordpress') ||
post_is_in_descendant_category( get_term_by( 'slug', 'wordpress', 'category' ) )) {

//ここに表示したいソースを書く

} ?>
*/
function post_is_in_descendant_category( $cats, $_post = null ){
   foreach ( (array) $cats as $cat ) {
         $descendants = get_term_children( (int) $cat, 'category');
          if ( $descendants && in_category( $descendants, $_post ) )
              return true;
   }
   return false;
}

/*
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//親カテゴリーのテンプレートを子カテゴリーに適用
//http://studio-freetown.com/post-783/
*/

add_filter( 'category_template', 'my_category_template' );

function my_category_template( $template ) {
	$category = get_queried_object();
	if ( $category->parent != 0 &&
		( $template == "" || strpos( $template, "category.php" ) !== false ) ) {
		$templates = array();
		while ( $category->parent ) {
			$category = get_category( $category->parent );
			if ( !isset( $category->slug ) ) break;
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";
		}
		$templates[] = "category.php";
		$template = locate_template( $templates );
	}
	return $template;
}

//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//アイキャッチ
add_theme_support('post-thumbnails');
//アイキャッチを有効にする
/*

add_theme_support('post-thumbnails');
//アイキャッチを有効にする
set_post_thumbnail_size(500,500);
//アイキャッチの基本サイズ設定
add_image_size('size1',128,700);
add_image_size('size2',100,100);
//size1とsize2のサイズを作る設定

<?php echo get_the_post_thumbnail($post->ID, 'size1'); ?>
//サイズ1を表示
<?php echo get_the_post_thumbnail($post->ID, 'size2'); ?>
//サイズ2を表示

//画像サイズの設定
add_image_size( 'featured-slide', '980', '340', true );
add_image_size( 'featured-slide-thumb', '250', '9999', false );
add_image_size( 'store-main-l', '368', '244', true );
add_image_size( 'store-main-s', '89', '59', true );
add_image_size( 'store-point', '200', '200', true );
add_image_size( 'store-gallery', '215', '215', true );
add_image_size( 'store-comment-ico', '50', '50', true );

アイキャッチ画像が登録されていない記事
<?php
if ( has_post_thumbnail()) {
the_post_thumbnail('thumbnail');
} else {
echo '<img src="' . get_bloginfo('template_url') .'/img/no_image.gif" alt="" title="" />';
};
?>

*/
add_theme_support( 'post-thumbnails' );
/*
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
子ページ判別（is_subpage）を使うための記述
*/
function is_subpage() {
    global $post; // $post には現在の固定ページの情報があります
	if ( is_page() && $post->post_parent ){ // 現在の固定ページが親ページを持つかどうかをチェックします
		$parentID = $post->post_parent; // 親ページの ID を取得します
		return $parentID; // 親ページの ID を返します
	} else { // 親ページを持っていない場合
		return false; // false を返します
	};
};

//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//投稿ページでget_bloginfo('template_url')を使用 <a href="[mainurl]/
function shortcode_mainurl() {
    return get_bloginfo('url');
}
add_shortcode('mainurl', 'shortcode_mainurl');
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//投稿ページでget_bloginfo('template_url')を使用 [template_url]/images/
function shortcode_templateurl() {
    return get_bloginfo('template_url');
}
add_shortcode('template_url', 'shortcode_templateurl');

//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//投稿ページでget_bloginfo('template_url')を使用した場合、投稿画面のエディタの不具合を回避/js/editor_plugin.jsが必要
/*class EditorPlugin {
    function EditorPlugin() {
        add_action('init', array(&$this, 'addplugin'));
    }
    function sink_hooks(){
        add_filter('mce_plugins', array(&$this, 'mce_plugins'));
    }
    function addplugin() {
       if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
         return;
       //リッチエディタの時だけ追加
       if ( get_user_option('rich_editing') == 'true') {
         add_filter("mce_external_plugins", array(&$this, 'mce_external_plugins'));
       }
    }
    // TinyMCE プラグインファイルを読み込む: editor_plugin.js
    function mce_external_plugins($plugin_array) {
       //プラグイン関数名＝ファイルの位置
       $plugin_array['ShortcodeConv'] = get_bloginfo('template_directory').'/js/editor_plugin.js';
       return $plugin_array;
    }
}
$myeditorplugin = new EditorPlugin();
add_action('init',array(&$myeditorplugin, 'EditorPlugin'));


*/

//----------------------------------------------------
//  パンくずリスト取得
//----------------------------------------------------
/*<?php echo get_breadcrumb_list(); ?>*/
function get_breadcrumb_list($include_category = 1, $include_tag = 1, $include_taxonomy = 1)
{
  // ベースパンくず(サイト名など)
  $base_breadcrumb = '<li><a href="'.get_home_url().'">サイト名など</a></li>';
  $top_url = get_home_url(null,'/');

  // ループ外対応
  global $query_string;
  global $post;
  query_posts($query_string);
  if (have_posts()) : while(have_posts()) : the_post();
  endwhile; endif;
  // クエリリセットする
  wp_reset_query();

  // ページ数を取得(ページ数(0の場合は1ページ目なので1に変更する))
  if(get_query_var('paged') == 0): $page = 1; else: $page = get_query_var('paged') ; endif;

  // 投稿・固定ページかつアタッチメントページ以外の場合
  if(is_singular() && !is_attachment())
  {
    // 記事についているカテゴリを全て取得する
    $categories = get_the_category();
    // カテゴリがある場合に実行する
    if(!empty($categories))
    {
      $category_count = count($categories);
      $loop = 1;
      $category_list = '';
      foreach($categories as $category)
      {
        // 値が1だったら、URLにカテゴリーのタクソノミーを含めて変数に格納する。
        if($include_category === 1)
        {
          $category_list .= '<a href="'.$top_url.esc_html($category->taxonomy).'/'.esc_html($category->slug).'/">'.esc_html($category->name).'</a>';
        }
        // 値が指定されていないか1以外だったら、URLにカテゴリーのタクソノミーを含めないで変数に格納する。
        else
        {
          $category_list .= '<a href="'.$top_url.esc_html($category->slug).'/">'.esc_html($category->name).'</a>';
        }
        // ループの最後でない場合のみスラッシュ追加（複数カテゴリ対応）
        if($loop != $category_count)
        {
          $category_list .= ' / ';
        }
        ++$loop;
      }
    }
    // カテゴリがない場合はNULLを格納する
    else
    {
      $category_list = null;
    }

    // 記事についているタグを全て取得する
    $tags = get_the_tags();
    // タグがあれば実行する
    if(!empty($tags))
    {
      $tags_count = count($tags);
      $loop=1;
      $tag_list = '';
      foreach($tags as $tag)
      {
        // 値が1だったら、URLにタグのタクソノミーを含めて変数に格納する。
        if($include_tag === 1)
        {
          $tag_list .= '<a href="'.$top_url.esc_html($tag->taxonomy).'/'.esc_html($tag->slug).'/">'.esc_html($tag->name).'</a>';
        }
        // 値が指定されていないか1以外だったら、URLにタグのタクソノミーを含めないで変数に格納する。
        else
        {
          $tag_list .= '<a href="'.$top_url.esc_html($tag->slug).'/">'.esc_html($tag->name).'</a>';
        }
        // ループの最後でない場合のみスラッシュ追加（複数タグ対応）
        if($loop !== $tags_count)
        {
          $tag_list .= ' / ';
        }
        ++$loop;
      }
    }
    // タグがない場合はNULLを格納する
    else
    {
      $tag_list = null;
    }

    // タクソノミーを全て取得する
    $taxonomies = get_the_taxonomies();
    // タクソノミーがある場合に実行する
    if(!empty($taxonomies))
    {
      $term_list = '';
      $taxonomies_count = count($taxonomies);
      $taxonomies_loop = 1;
      foreach(array_keys($taxonomies) as $key)
      {
        // タームを取得
        $terms = get_the_terms($post->ID, $key);
        $terms_count = count($terms);
        $loop = 1;
        foreach($terms as $term)
        {
          // 値が1だったら、URLにタクソノミーを含めて変数に格納する。
          if($include_taxonomy === 1)
          {
            $term_list .= '<a href="'.$top_url.esc_html($term->taxonomy).'/'.esc_html($term->slug).'/">'.esc_html($term->name).'</a>';
          }
          // 値が指定されていないか1以外だったらURLにタクソノミーを含めないで変数に格納する。
          else
          {
            $term_list .= '<a href="'.$top_url.esc_html($term->slug).'/">'.esc_html($term->name).'</a>';
          }
          // ループの最後でない場合のみスラッシュ追加（複数ターム対応）
          if($loop != $terms_count)
          {
            $term_list .= ' / ';
          }
          ++$loop;
        }
        // ループの最後でない場合のみスラッシュ追加（複数タクソノミー対応）
        if($taxonomies_loop != $taxonomies_count)
        {
          $term_list .= ' / ';
        }
        ++$taxonomies_loop;
      }
    }
    // タクソノミーがない場合はNULLを格納する
    else
    {
      $term_list = null;
    }
  }

  // 基本パンくずリストを変数に格納する。
  $breadcrumb_lists = $base_breadcrumb;

  // ホームの場合
  if(is_home())
  {
    // 基本パンくずリストを上書きする
    $breadcrumb_lists = '<li>サイト名など</li>';
  }
  // カスタム投稿タイプアーカイブの場合
  elseif(is_post_type_archive())
  {
    // ページ数が1より大きい場合(○ページ目)を追加して格納する
    if($page > 1)
    {
      $breadcrumb_lists .= '<li>'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧('.$page.'ページ目)</li>';
    }
    // ページ数が1の場合は(○ページ目)はなしで格納する
    else
    {
      $breadcrumb_lists .= '<li>'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧</li>';
    }
  }
  // カスタム投稿タイプ以外のアーカイブの場合
  elseif(is_archive())
  {
    // 年アーカイブの場合
    if(is_year())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年")).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年")).'の記事一覧</li>';
      }
    }
    // 月アーカイブの場合
    elseif(is_month())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月")).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月")).'の記事一覧</li>';
      }
    }
    // 日アーカイブの場合
    elseif(is_day())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月d日")).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月d日")).'の記事一覧</li>';
      }
    }
    // カテゴリの場合
    elseif(is_category())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_cat_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_cat_title('',false)).'の記事一覧</li>';
      }
    }
    // タグの場合
    elseif(is_tag())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_tag_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_tag_title('',false)).'の記事一覧</li>';
      }
    }
    // タクソノミー(カスタム分類)の場合
    elseif(is_tax())
    {
      // ページ数が1より大きい場合(○ページ目)を追加して格納する
      if($page > 1)
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_term_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
      }
      // ページ数が1の場合は(○ページ目)はなしで格納する
      else
      {
        $breadcrumb_lists .= '<li>'.esc_html(single_term_title('',false)).'の記事一覧</li>';
      }
    }
  }
  // 投稿ページ
  elseif(is_single())
  {
    // ページ数を取得(ページ数(0の場合は1ページ目なので1に変更する))
    if(get_query_var('page') == 0): $page = 1; else: $page = get_query_var('page') ; endif;
    // 通常投稿の場合
    if(get_post_type() === 'post')
    {
      // カスタムフィールドの値を取得
      $seo_title = esc_html(get_post_meta($post->ID, 'seo_title', true));

      // カテゴリがある場合のみ追加
      if(!empty($category_list))
      {
        $breadcrumb_lists .= '<li>'.$category_list.'</li>';
      }
      // タグがある場合のみ追加
      if(!empty($tag_list))
      {
        $breadcrumb_lists .= '<li>'.$tag_list.'</li>';
      }

      // 2ページ目以降の場合
      if($page > 1)
      {
        // カスタムフィールドに値があったらその値を格納する
        if(!empty($seo_title))
        {
          $breadcrumb_lists .= '<li>'.$seo_title.'</li>';
        }
        // カスタムフィールドに値がなかった場合
        else
        {
          // ページが分割されている場合のタイトル取得
          if(function_exists('get_current_split_string'))
          {
            $split_title = esc_html(get_current_split_string($page));
          }
          else
          {
            $split_title = null;
          }

          // ページが分割されている場合のタイトルがあった場合はそれを加える
          if(!empty($split_title))
          {
            $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'【'.$split_title.'】</li>';
          }
          // それ以外は(○ページ目)を加える
          else
          {
            $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'('.$page.'ページ目)</li>';
          }
        }
      }
      // 1ページ目の場合
      else
      {
        // カスタムフィールドに値があったらその値を格納する
        if(!empty($seo_title))
        {
          $breadcrumb_lists .= '<li>'.$seo_title.'</li>';
        }
        // カスタムフィールドに値がなかった場合
        else
        {
          $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
        }
      }
    }
    // カスタム投稿の場合
    else
    {
      // タームがある場合のみ追加
      if(!empty($term_list))
      {
        $breadcrumb_lists .= '<li>'.$term_list.'</li>';
      }
      $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
    }
  }
  // 固定ページ
  elseif(is_page())
  {
    $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
  }
  // 検索結果
  elseif(is_search())
  {
    // ページ数が1より大きい場合(○ページ目)を追加して格納する
    if($page > 1)
    {
      $breadcrumb_lists .= '<li>「'.esc_html(get_search_query()).'」で検索した結果('.$page.'ページ目)</li>';
    }
    // ページ数が1の場合は(○ページ目)はなしで格納する
    else
    {
      $breadcrumb_lists .= '<li>「'.esc_html(get_search_query()).'」で検索した結果</li>';
    }
  }
  // 404ページの場合
  elseif(is_404())
  {
    $breadcrumb_lists .= '<li>お探しのページは見つかりませんでした</li>';
  }
  else
  {
    $breadcrumb_lists = $base_breadcrumb;
  }

  // パンくずリスト成形
  if(!empty($breadcrumb_lists))
  {
    $breadcrumb_lists = '<ul id="breadcrumb_list">'.$breadcrumb_lists.'</ul>';
  }

  return $breadcrumb_lists;
}





    /*固定ページの現在いる階層別の分岐
    <?php if ( is_nobugot_special_subpage_checke() ): ?>
        子ページ及び孫ページ
    <?php else: ?>
        その他
    <?php endif ?>
    */
function is_nobugot_special_subpage_checke() {
  global $post;
  // 親ページをもっているかチェック
  if ( !is_page() || !$post->post_parent )
    return false;

  // 親ページが親ページをもっているかチェック
  $parent = get_post( $parent_id = $post->post_parent );
  if ( $parent->post_parent )
    return 3; // 持っている（第3階層：孫ページ）
  else
    return 2; // 持っていない（第2階層：子ページ）
};

 /*
 投稿番号を表示
 投稿番号を記事が古いのを1として増やして表示できるコード
投稿No.<a href="<?php the_permalink(); ?>">
<?php echo ps_number( $post->post_type ); ?>
 /<?php echo wp_count_posts()->publish ?></a></p>

function ps_number( $post_type = 'post', $op = '<=' ) {
  global $wpdb, $post;
  $post_type = is_array($post_type) ? implode("','", $post_type) : $post_type;
  $number = $wpdb->get_var("
    SELECT COUNT( * )
    FROM $wpdb->posts
    WHERE post_date {$op} '{$post->post_date}'
    AND post_status = 'publish'
    AND post_type = ('{$post_type}')
  ");
  return $number;
}
*/

//絵文字に画像を適用されないように
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

//ターム一覧をID順に出力する関数
function cmp_parent( $a, $b ) {
  if ( $a->parent == $b->parent ) {
    return 0;
  }
  return ( $a->parent > $b->parent ) ? 1 : -1;
}




// JSON-LD
//詳細説明 http://ad-library.jp/wp-json-ld/
/*
「@type」には今回は記事全般である「Article」を宣言しています。
authorは記事の著者情報です。さっそく前回説明したEmbedding（エンベッディング）での記述が出てきましたね。
今回はauthorの@typeは「Person」にしていますが、企業として記事を書く場合は「Organization」での宣言も可能です。
コラムページの内容によって使い分けてください。
\"image\" : \"{$imageurl}\",これは記事の画像ですね。普通はアイキャッチを設定していると思うので、今回のコードではアイキャッチ画像のURLを書いています。
 \"publisher\" : {
                   \"@type\" : \"{$publisherType}\",
                   \"name\" : \"{$publisherName}\"
                   }
最後に、どこの団体がこの記事を発行しているかですね。ここは「Organization」で宣言することができます。
今回はブログの名前を取ってきています。会社概要などをここで宣言してもいいですね。
プロパティなどは「Organization」 のページで確認してください。
コードテスト
    ・メールマークアップテスター
    ・Corporate Contacts Markup Tester
    ・Events Markup Tester
*/
add_action('wp_head','insert_json_ld');
function insert_json_ld (){
    if (is_single()) {
        if (have_posts()) : while (have_posts()) : the_post();
              $context = 'http://schema.org';
              $type = 'Article';
              $name = get_the_title();
              $authorType = 'Person';
              $authorName = get_the_author();
              $dataPublished = get_the_date('Y-n-j');
              $thumbnail_id = get_post_thumbnail_id($post->ID);
              $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
              $imageurl = $image[0];
              $category_info = get_the_category();
              $articleSection = $category_info[0]->name;
              $articleBody = get_the_content();
              $url = get_permalink();
              $publisherType = 'Organization';
              $publisherName = get_bloginfo('name');

              $json= "
              \"@context\" : \"{$context}\",
              \"@type\" : \"{$type}\",
              \"name\" : \"{$name}\",
              \"author\" : {
                   \"@type\" : \"{$authorType}\",
                   \"name\" : \"{$authorName}\"
                   },
              \"datePublished\" : \"{$dataPublished}\",
              \"image\" : \"{$imageurl}\",
              \"articleSection\" : \"{$articleSection}\",
              \"url\" : \"{$url}\",
              \"publisher\" : {
                   \"@type\" : \"{$publisherType}\",
                   \"name\" : \"{$publisherName}\"
                   }
              ";
            echo '<script type="application/ld+json">{'.$json.'}</script>';
        endwhile; endif;
        rewind_posts();
    }
}

//画像に指定されているscrset属性を削除
//http://www.nxworld.net/wordpress/wp-disable-responsive-images.html
add_filter( 'wp_calculate_image_srcset', '__return_false' );

/*
//リダイレクトループが頻繁に起こるとき
remove_filter('template_redirect', 'redirect_canonical');
*/

//URIの末尾にスラッシュ”/”を追加する方法
//
function add_slash_uri_end($uri, $type) {
  if ($type != 'single') {
    $uri = trailingslashit($uri);
  }
  return $uri;
}
add_filter('user_trailingslashit', 'add_slash_uri_end', 10, 2);

//プラグインのwp_pagenaviの出力を変更
/*
<div class="pagination">
  <ul>
    <li><span class="current">1</span></li>
    <li><a class="page larger" href="http://www.programming-school.com/yoshikawa/wordpress/member-blog/page/2/">2</a></li>
    <li><a class="nextpostslink" rel="next" href="">
    <img alt="次のページ" src="http://www.programming-school.com/yoshikawa/wordpress/wp-content/themes/lb201610/images/right_arrow_black.gif"></a></li>
  </ul>
</div>
となる
*/


add_filter( 'wp_pagenavi', 'custom_wp_pagenavi' );
function custom_wp_pagenavi($html) {
  $out = '';
  $out = str_replace("<div", "", $html);
  $out = str_replace("class='wp-pagenavi'>", "", $out);
  $out = str_replace("<a", "<li><a", $out);
  $out = str_replace("</a>", "</a></li>", $out);
  $out = str_replace("<span", "<li><span", $out);
  $out = str_replace("</span>", "</span></li>", $out);
  $out = str_replace("</div>", "", $out);

  return '<nav class="box-pagination-01"><ul>'.$out.'</ul></nav>';
}
?>

<?php
/*
パンくずナビゲーションを出力します。
<nav id="breadcrumb" class="breadcrumb-section">
    <ol class="breadcrumb-lists" itemprop="breadcrumb">
        <li class="breadcrumb-home" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://www.kuramu.net" itemprop="url"><span itemprop="title">ホーム</span></a></li>
        <li>&nbsp;&gt;&nbsp;</li>
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://www.kuramu.net/blog/" itemprop="url"><span itemprop="title">BLOG</span></a></li>
        <li>&nbsp;&gt;&nbsp;</li>
        <li class="current-crumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://www.kuramu.net/blog/tool/sublime-Text-theme.html" itemprop="url"><span itemprop="title"><strong>Sublime Text　2　のテーマがきかなかったり、くずれた場合の対処法</strong></span></a></li>
    </ol>
</nav>
 * 
 *
 * @param array $args {
 *      オプションです。パンくずリストの出力を配列型の引数で変更できます。
 *
 *      @type string    $container          パンくずリスト囲むタグを指定。デフォルトは'div'。
 *      @type string    $container_class    パンくずリストを囲むタグのClassを指定。デフォルトは'breadcrumb-section'。
 *      @type string    $container_id       パンくずリストを囲むタグのIDを指定。デフォルトは無し。
 *      @type string    $crumb_tag          パンくずリスト自体のタグを指定。デフォルトは'ul'で、他に指定できるのは'ol'のみ。
 *      @type string    $crumb_class        パンくずリスト自体のタグにClassを指定。デフォルトは'crumb-lists'。
 *      @type string    $crumb_id           パンくずリスト自体のタグにIDを指定。デフォルトは無し。
 *      @type bool      $echo               パンくずリストのHTMLを変数に格納する場合は'false'を指定。デフォルトは'true'なので直接出力する。
 *      @type string    $home_class         パンくずリストのホームの階層を示すタグにClassを指定。デフォルトは'crumb-home'。
 *      @type string    $home_text          パンくずリストのホームの階層を示すタグのテキストを指定。デフォルトは'ホーム'。
 *      @type string    $delimiter          パンくずリストの区切り文字を指定。デフォルトは'<li>&nbsp;&gt;&nbsp;</li>'。
 *      @type string    $crumb_microdata    パンくずリストタグ['ul' または 'ol']に指定するリッチスニペット。デフォルトは' itemprop="breadcrumb"'。
 *      @type string    $li_microdata       パンくずリストのliタグに指定するリッチスニペット。デフォルトは' itemscope itemtype="http://data-vocabulary.org/Breadcrumb"'。
 *      @type string    $url_microdata      パンくずリストのaタグに指定するリッチスニペット。デフォルトは' itemprop="url"'。
 *      @type string    $title_microdata    パンくずリストのspanタグに指定するリッチスニペット。デフォルトは' itemprop="title"'。
 * }
 *
 * @return string 各ページに合致するパンくずナビゲーションのHTMLを吐き出します。
 *
 * @version 1.5
 */
function breadcrumb( $args = array() ) {
  $defaults = array(
    'container'         => 'nav',
    'container_class'   => 'breadcrumb-section',
    'container_id'      => 'breadcrumb',
    'crumb_tag'         => 'ol',
    'crumb_class'       => 'breadcrumb-lists',
    'crumb_id'          => '',
    'echo'              => true,
    'home_class'        => 'breadcrumb-home',
    'home_text'         => 'ホーム',
    'delimiter'         => '<li>&nbsp;&gt;&nbsp;</li>',
    'crumb_microdata'   => ' itemprop="breadcrumb"',
    'li_microdata'      => ' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"',
    'url_microdata'     => ' itemprop="url"',
    'title_microdata'   => ' itemprop="title"'
  );
  
  $args = wp_parse_args( $args, $defaults );
  $args = (object) $args;
  $breadcrumb_html      = '';
  
  //region Rich Snippets (microdata) Setting
  $crumb_microdata    = $args->crumb_microdata ? $args->crumb_microdata : '';
  $li_microdata       = $args->li_microdata ? $args->li_microdata : '';
  $url_microdata      = $args->url_microdata ? $args->url_microdata : '';
  $title_microdata    = $args->title_microdata ? $args->title_microdata : '';
  //endregion
  
  //region Nested Function
  /**
   * 現在のページのパンくずリスト用タグを作成します。
   *
   * @param $current_permalink : current crumb permalink
   * @param string $current_text : current crumb text
   * @param string $current_class : class name
   * @param array $args : microdata settings
   *
   * @return string
   */
  /*
   * Nest Function [current_crumb_tag()] Argument
   */
  $current_microdata = array(
    'li_microdata'      => $li_microdata,
    'url_microdata'     => $url_microdata,
    'title_microdata'   => $title_microdata
  );
  function current_crumb_tag( $current_permalink, $current_text = '', $args = array(), $current_class = 'current-crumb' ) {
    $defaults = array(
      'li_microdata'      => ' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"',
      'url_microdata'     => ' itemprop="url"',
      'title_microdata'   => ' itemprop="title"'
    );
    $args = wp_parse_args( $args, $defaults );
    $args = (object) $args;
    $current_class      = $current_class ? ' class="' . esc_attr( $current_class ) . '"' : '';
    $start_anchor_tag   = $current_permalink ? '<a href="' . $current_permalink . '"' . $args->url_microdata . '>' : '<span class="crumb-no-link">';
    $end_anchor_tag     = $current_permalink ? '</a>' : '</span>';
    $current_before     = '<li' . $current_class . $args->li_microdata . '>' . $start_anchor_tag . '<span' . $args->title_microdata . '><strong>';
    $current_crumb_tag  = $current_text;
    $current_after      = '</strong></span>' . $end_anchor_tag . '</li>';
    if ( get_query_var( 'paged' ) ) {
      if ( is_paged() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
        $current_after = ' (ページ' . get_query_var( 'paged' ) . ')' . $current_after;
      }
      
    } elseif ( ( is_page() || is_single() ) && get_query_var( 'page' ) ) {
      $current_after = ' (ページ' . get_query_var( 'page' ) . ')' . $current_after;
    }
    
    return $current_before . $current_crumb_tag . $current_after;
  }
  //endregion
  
  if (
    ( ! is_home() && ! is_front_page() )
    || ( is_home() && ! is_front_page() )
    || is_paged()
  ) {
    // Breadcrumb Container Start Tag
    if ( $args->container ) {
      $class = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="' . $defaults['container_class'] . '"';
      $id = $args->container_id ? ' id="' . esc_attr( $args->container_id ) . '"' : '';
      $breadcrumb_html .= '<'. $args->container . $id . $class . '>';
    }
    
    // Breadcrumb Start Tag
    if ( $args->crumb_tag ) {
      $crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );
      if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
        $id = $args->crumb_id ? ' id="' . esc_attr( $args->crumb_id ) . '"' : '';
        $class = $args->crumb_class ? ' class="' . esc_attr( $args->crumb_class ) . '"' : '';
        $breadcrumb_html .= '<' . $args->crumb_tag . $id . $class . $crumb_microdata . '>';
      }
      
    } else {
      $breadcrumb_html .= '<' . $defaults['crumb_tag'] .  $crumb_microdata . '>';
    }
    
    global $post;
    
    // Home Crumb Item
    $home_class = $args->home_class ? ' class="'. esc_attr( $args->home_class ) . '"' : '';
    $breadcrumb_html .= '<li'. $home_class . $li_microdata . '><a href="' . home_url() . '"' . $url_microdata . '><span ' . $title_microdata . '>' . $args->home_text . '</span></a></li>' . $args->delimiter;
    if ( is_home() && ! is_front_page() ) {
      $home_ID = get_option('page_for_posts');
      $breadcrumb_html .= current_crumb_tag( get_the_permalink( $home_ID ), get_the_title( $home_ID ), $current_microdata );
      
    } else if ( is_paged() ) {
      if ( 'post' == get_post_type() ) {
        $breadcrumb_html .= current_crumb_tag( get_pagenum_link( get_query_var( 'paged' ) ), '投稿一覧', $current_microdata );
        
      } elseif ( 'page' == get_post_type() ) {
        $breadcrumb_html .= current_crumb_tag( get_pagenum_link( get_query_var( 'paged' ) ), get_the_title(), $current_microdata );
      }
      
    } elseif ( is_category() ) {
      $cat = get_queried_object();
      
      if ( $cat->parent != 0 ) {
        $ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
        foreach ( $ancestors as $ancestor ) {
          $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $ancestor ) . '</span></a></li>' . $args->delimiter;
        }
      }
      
      $breadcrumb_html .= current_crumb_tag( get_category_link( $cat->term_id ), single_cat_title( '', false ), $current_microdata );
    
    } elseif ( is_day() ) {
      $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'Y' ) . '年</span></a></li>' . $args->delimiter;
      $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'F' ) . '</span></a></li>' . $args->delimiter;
      $breadcrumb_html .= current_crumb_tag( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ), get_the_time( 'd' ) . '日', $current_microdata );
      
    } elseif ( is_month() ) {
      $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'Y' ) . '年</span></a></li>' . $args->delimiter;
      $breadcrumb_html .= current_crumb_tag( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ), $current_microdata );
      
    } elseif ( is_year() ) {
      $breadcrumb_html .= current_crumb_tag( get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) . '年', $current_microdata );
      
    } elseif ( is_single() && ! is_attachment() ) {
      $single = get_queried_object();
      
      if ( get_post_type() == 'post' ) {
        if ( get_option( 'page_for_posts' ) ) {
          $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_page_link( get_option( 'page_for_posts' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( get_option( 'page_for_posts' ) ) . '</span></a></li>' . $args->delimiter;
        }
        
        $categories = get_the_category( $post->ID );
        $cat        = $categories[0];
        
        if ( $cat->parent != 0 ) {
          $ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
          foreach ( $ancestors as $ancestor ) {
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $ancestor ) . '</span></a></li>' . $args->delimiter;
          }
        }
        
        $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $cat->cat_ID ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $cat->cat_ID ) . '</span></a></li>' . $args->delimiter;
        $breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ), $current_microdata );
        
      } else {
        $post_type_object = get_post_type_object( get_post_type() );
        $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_post_type_archive_link( get_post_type() ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . $post_type_object->label . '</span></a></li>' . $args->delimiter;
        $taxonomies =  get_object_taxonomies( get_post_type() );
        $category_term = '';
        
        foreach ( $taxonomies as $taxonomy ) {
          $taxonomy_obj = get_taxonomy( $taxonomy );
          if ( true == $taxonomy_obj->hierarchical ) {
            $category_term = $taxonomy_obj;
            break;
          }
        }
        
        if ( $category_term ) {
          $terms = get_the_terms( $post->ID, $category_term->name );
          
          if ( $terms ) {
            if ( ! $terms || is_wp_error( $terms ) )
              $terms = array();
            
            $terms = array_values( $terms );
            $term = $terms[0];
            
            if ( $term->parent != 0 ) {
              $ancestors = array_reverse( get_ancestors( $term->term_id, $term->taxonomy ) );
              foreach ( $ancestors as $ancestor ) {
                $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $ancestor, $term->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_term( $ancestor, $term->taxonomy )->name . '</span></a></li>' . $args->delimiter;
              }
            }
            
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $term, $term->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . $term->name . '</span></a></li>' . $args->delimiter;
          }
        }
        
        $breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ), $current_microdata );
      }
      
    } elseif ( is_attachment() ) {
      $attachment = get_queried_object();
      
      if ( ! empty( $post->post_parent ) ) {
        $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_permalink( $post->post_parent ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( $post->post_parent ) . '</span></a></li>' . $args->delimiter;
      }
      
      $breadcrumb_html .= current_crumb_tag( get_the_permalink( $attachment->ID ), get_the_title( $attachment->ID ), $current_microdata );
      
    } elseif ( is_page() ) {
      $page = get_queried_object();
      
      if ( $post->post_parent ) {
        $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
        foreach ( $ancestors as $ancestor ) {
          $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_permalink( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( $ancestor ) . '</span></a></li>' . $args->delimiter;
        }
      }
      
      $breadcrumb_html .= current_crumb_tag( get_the_permalink( $page->ID ), get_the_title( $page->ID ), $current_microdata );
      
    } elseif ( is_search() ) {
      $breadcrumb_html .= current_crumb_tag( get_search_link(), get_search_query() . '" の検索結果', $current_microdata );
      
    } elseif ( is_tag() ) {
      $tag = get_queried_object();
      $breadcrumb_html .= current_crumb_tag( get_term_link( $tag->term_id, $tag->taxonomy ), single_tag_title( '', false ), $current_microdata );
      
    } elseif ( is_tax() ) {
      $taxonomy_name  = get_query_var( 'taxonomy' );
      $post_types = get_taxonomy( $taxonomy_name )->object_type;
      $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_post_type_archive_link( $post_types[0] ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_post_type_object( $post_types[0] )->label . '</span></a></li>' . $args->delimiter;
      $tax = get_queried_object();
      
      if ( $tax->parent != 0 ) {
        $ancestors = array_reverse( get_ancestors( $tax->term_id, $tax->taxonomy ) );
        foreach ( $ancestors as $ancestor ) {
          $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $ancestor, $tax->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_term( $ancestor, $tax->taxonomy )->name . '</span></a></li>' . $args->delimiter;
        }
      }
      
      $breadcrumb_html .= current_crumb_tag( get_term_link( $tax->term_id, $tax->taxonomy ), single_tag_title( '', false ), $current_microdata );
      
    } elseif ( is_author() ) {
      $author = get_queried_object();
      $breadcrumb_html .= current_crumb_tag( get_author_posts_url( $author->ID ), get_the_author_meta( 'display_name' ), $current_microdata );
      
    } elseif ( is_404() ) {
      $breadcrumb_html .= current_crumb_tag( null, '404 Not found' );
      
    } elseif ( is_post_type_archive( get_post_type() ) ) {
      if ( false == get_post_type() ) {
        $post_type_obj = get_queried_object();
        $breadcrumb_html .= current_crumb_tag( $post_type_obj->name, $post_type_obj->label, $current_microdata );
        
      } else {
        $post_type_obj = get_post_type_object( get_post_type() );
        $breadcrumb_html .= current_crumb_tag( get_post_type_archive_link( get_post_type() ), $post_type_obj->label, $current_microdata );
      }
      
    } else {
      $breadcrumb_html .= current_crumb_tag( site_url(), wp_title( '', true ), $current_microdata );
    }

    // Breadcrumb End Tag
    if ( $args->crumb_tag ) {
      $crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );
      
      if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
        $breadcrumb_html .= '</' . $args->crumb_tag . '>';
      }
      
    } else {
      $breadcrumb_html .= '</' . $defaults['crumb_tag'] . '>';
    }
    
    // Breadcrumb Container End Tag
    if ( $args->container ) {
      $breadcrumb_html .= '</' . $args->container . '>';
    }
    
    if ( $args->echo ) {
      echo $breadcrumb_html;
      
    } else {
      return $breadcrumb_html;
    }
  }
}