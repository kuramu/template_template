
//■■■■■■■■ドロップダウンメニュー■■■■■■■■
//
/*

<ul id="jMenu" role="navigation" class="cf">



#jMenu{
  float: right;
  .jmenu-level-0{
    text-align: center;
    width: 168px;
    float: right;
    font-size: 14px;
    color: #181818;
    .fNiv{
         font-weight: bold;
        border-left: 3px solid #e5e5e5;
        display: block;
        padding: 14px 0 18px;
      border-left: 3px solid #e5e5e5;
      &:hover{
        background: url(images/common/news_13.gif) 0 0 repeat;
        color: #DD2424;
      }
    }
    span{
      display: block;
      font-size: 11px;
      color: #969696;
          line-height: 1;
    }
  }


.jMenu li a{
  display:block;
  background-color:transparent;
   color: #000;
  text-transform:uppercase;
  cursor:pointer;
}


.jMenu li:hover>a{
  background-color:#757575;
}

.jMenu li ul{
  display: none;

  list-style: outside none none;
       margin: 22px 0 0;
    padding: 10px 0 0;
    position: absolute;
    z-index: 999999999999999;
    width: 339px !important;
  border-bottom: 3px solid #e5e5e5;
    }

.jMenu li ul li{
  background-color:#fff;
  display:block;
  text-align: left;
  border-bottom:none;
  padding:0;
  list-style:none;
  position:relative;
  float: none;
  height: auto;
  margin: 0;
}
.jMenu li ul li:hover{
  background-color:#fff;
}
.jMenu li ul li a{
  background-color:#fff;
  text-transform:none;
  display:block;
  padding:13px 10px;
  border-top: 3px solid #e5e5e5;
  border-left: 3px solid #e5e5e5;
  border-right: 3px solid #e5e5e5;
}
.jMenu li ul li:first-child a{
  border-top: 0;
}
.jMenu li ul li a.isParent{
}

.jMenu li ul li a:hover{
  color: #DD2424;
  background-color:#fff;
}


.jMenu > li > a{
  background-color: transparent !important;
}


<script>
$(document).ready(function() {
    $("#jMenu").jMenu({
        openClick : false,
        ulWidth :'230',
         TimeBeforeOpening : 100,
        TimeBeforeClosing : 11,
        animatedText : false,
        paddingLeft: 1,
        effects : {
            effectSpeedOpen : 0,
            effectSpeedClose : 0,
            effectTypeOpen : 'hide',
            effectTypeClose : 'hide',
            effectOpen : 'swing',
            effectClose : 'swing'
        }

    });
});
</script>
*/

//■■■■■■■■らくちんモーダルレスポンシブ対応■■■■■■■■
//
/*

.modal-content {
width: 80%;
margin: 0;
padding: 10px;
border: 2px solid #aaa;
background: #fff;
position: fixed;
display: none;
z-index: 2;
}

.modal-close {
position: absolute;
top: -16px;
right: -16px;
width: 32px;
}


#modal-overlay {
z-index: 1;
display: none;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 120%;
background-color: rgba(0, 0, 0, 0.75);
}

<div class="bg-grd area-box">
  <p class="m-bottom text-c"><button class="modal-open">開く</button></p>

  <section class="modal-content">
    <button class="modal-close">閉じる</button>
    <p>大阪での古本出張買取の思い出は、池田市で数年前に亡くなったお父様が集められていたと言う、大量の落語・演芸関係の古書を買取させていただいた時のことです。<br>
すべてがきれいに分類されており、大切にされていたのがわかるご蔵書でした。<br>
お父様が亡くなられた後も、ご家族がきれいにされていたので、状態もよく大切に扱わせていただきました。<br>
池田市をはじめ箕面市・豊中市・吹田市・茨木市・高槻市などの北摂方面は、大阪では数多く出張買取に行かせていただいております。</p>
  </section>
</div>


$(function(){

  $(document).on('click','.modal-open', function(){
      $("body").append('<div id="modal-overlay"></div>');
      $("#modal-overlay").fadeIn("slow");
      centeringModalSyncer();
      下記をHTMLの内容によって変更する必要があるかも
      $(this).parent().next().fadeIn("slow");

      $("#modal-overlay,.modal-close").unbind().click(function(){
        $(".modal-content,#modal-overlay").fadeOut("slow",function(){
          $('#modal-overlay').remove();
        });
      });
    });

  $(window).resize(centeringModalSyncer);

  function centeringModalSyncer(){
    $(function(){
      var w = $(window).width();
      var h = $(window).height();
      var cw = $(".modal-content").outerWidth(true);
      var ch = $(".modal-content").outerHeight(true);

      $(".modal-content").css({"left": ((w - cw)/2) + "px","top": ((h - ch)/2+32) + "px"});
    });
  }

});
*/



//■■■■■■■■ページスクロールでカレント表示の場所がロカールナビに反映される方法■■■■■■■■
//
/*

$(function(){
var set = 300;//ウインドウ上部からどれぐらいの位置で変化させるか
var boxTop = new Array;
var current = -1;
//各要素の位置
$('.box').each(function(i) {
boxTop[i] = $(this).offset().top;
});
//最初の要素にclass="on"をつける
changeBox(0);
//スクロールした時の処理
$(window).scroll(function(){
scrollPosition = $(window).scrollTop();
for (var i = boxTop.length - 1 ; i >= 0; i--) {
if ($(window).scrollTop() > boxTop[i] - set) {
changeBox(i);
break;
}
};
});
//ナビの処理
function changeBox(secNum) {
if (secNum != current) {
current = secNum;
secNum2 = secNum + 1;//HTML順序用
$('#nav li').removeClass('on');
$('#nav li:nth-child(' + secNum2 +')').addClass('on');

if (current == 0) {
$('#onescroll #nav').css("display","none")
} else if (current == 1) {
$('#onescroll #nav').css("display","block")
} else if (current == 2) {
$('#onescroll #nav').css("display","block")
} else if (current == 3) {
$('#onescroll #nav').css("display","block")
} else if (current == 4) {
$('#onescroll #nav').css("display","block")
}

}
};
});



//ローカルナビにホバーすると隠れていたテキストが表示される/////////////
$(function(){
$('#onescroll #nav li').hover(function(){
    $(this).find("span").css("display","block");
}, function() {
    $(this).find("span").css("display","none");
});
});
//////////////////////////////////////////////////////////////



      <div id="onescroll">
        <ul id="nav">
        <li id="mamm1"><a href="#section01"></a><span>くらしに「うるおい」を</span></li>
        <li id="mamm2"><a href="#section02"></a><span>PROMISE</span></li>
        <li id="mamm3"><a href="#section03"></a><span>BRAND LINE</span></li>
        <li id="mamm4"><a href="#section04"></a><span>PREMIUM LINE</span></li>
        <li id="mamm5"><a href="#section05"></a><span>SIMPLE LINE</span></li>
        <li id="mamm6"><a href="#section06"></a><span>PARTNER BRAND</span></li>
        </ul>
      </div>

      セクション毎に下記を挿入
        <div class="box" id="section01"></div>


#mamm1{
  display: none;
}
#onescroll #nav{
  position:fixed;
  z-index: 1000;
  right: 15px;
  top: 40%;
  display: none;
}



#onescroll #nav li{
border-radius:50%;
margin: 20px 0  ;
-moz-border-radius:50%;
-webkit-border-radius:50%;
-ms-border-radius:50%;
-o-border-radius:50%;
      background-color: #524606;
      width: 15px;
      height: 15px;
       text-align: right;
   position: relative;
}

#onescroll #nav a{
    width: 11px;
    height: 11px;
    display: block;

}
#onescroll #nav .on a{
border-radius:50%;
-moz-border-radius:50%;
-webkit-border-radius:50%;
-ms-border-radius:50%;
-o-border-radius:50%;
    background-color: #97883b;
    display: block;
    height: 11px;
    margin: 0 auto;
    position: relative;
    top: 2px;
    width: 11px;
}

#onescroll #nav .on a:hover,#onescroll #nav .on a{
    -webkit-transition: none;
    -moz-transition: none;
    -o-transition: none;
    -ms-transition: none;
    transition: none;
      }
#onescroll #nav li span{
    display:none;
    height: 5px;
    position: absolute;
    right: 20px;
    top: -2px;
    width: 200px;
    z-index: 10000;
}

*/




//■■■■■■■■ページreturnの表示非表示■■■■■■■■
//初期は非表示
/*
$(".tophe").hide();

$(function () {
    $(window).scroll(function () {
        //100pxスクロールしたら
        if ($(this).scrollTop() > 100) {
            //フェードインで表示
            $('.tophe').fadeIn();
        } else {
            $('.tophe').fadeOut();
        }
    });
});
*/

//■■■■■■■■メニューホバー追尾■■■■■■■■
/*
nav a{
    text-decoration:none;
    color:#333;
}
nav li{
    display:inline-block;
    margin-left:2px;
    padding:3px;
    background:#eee;
}
nav span{
    background:#666;
    height:2px;
    display:block;
    position:relative;
    width:50px;
    left:0;
}
$('a','nav').mouseover(function(){
    $('span','nav').animate({
        'width': $(this).width(),
         'left': $(this).position().left}
    ,'fast');
});



$( function (){
    $('#jMenu > li > a', '#gm').mouseover(function (){
        $('#span-line', '#gm').animate({
            'width' : $(this).width(), 'left' : $(this).position().left
        },
        'fast');
    });
});

$( function() {
$('a','#gm').mouseover(function(){
    $('span','#gm').animate({
        'width': $(this).width(),
         'left': $(this).position().left}
    ,'fast');
});
});
*/

//■■■■■■■■jQueryで使用ブラウザを判定し、ブラウザ別にclassを指定するト■■■■■■■■
/*
 * jquery.tgAddBrowserClass
 *
 * 【概要】
 * jqueryでブラウザを判定し、<html> タグへ判定結果のclass名を付与します。
 * IEの場合はバージョンを判定して付与します。
 * ＜付与class例＞
 *     IE5.5   : <html class="ie5_5" lang="ja">
 *     IE9     : <html class="ie9_0" lang="ja">
 *     IE10    : <html class="ie10_0" lang="ja">
 *     IE11    : <html class="ie11_0" lang="ja">
 *     Chrome  : <html class="chrome" lang="ja">
 *     Firefox : <html class="firefox" lang="ja">
 *     Opera   : <html class="opera" lang="ja">
 *     Safari  : <html class="safari" lang="ja">
 *
 * ＜ユーザーエージェント例＞
 *     IE9     : Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E)
 *     IE10    : Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E)
 *     IE11    : Mozilla/5.0 (Windows NT 6.1; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; .NET4.0E; rv:11.0) like Gecko
 *     Chrome  : Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36
 *     Firefox : Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0
 *     Safari  : Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.57.2 (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2
 *
 * ＜参考＞
 *     Internet Explorer 11 のユーザーエージェント文字列が以前のバージョンとは以下の３点が変更になっています。
 *       ●互換性 ("compatible") トークンとブラウザー ("MSIE") トークンが削除
 *       ●"like Gecko" トークンが追加 (他のブラウザーとの一貫性のため)
 *       ●ブラウザーのバージョンが、新しいリビジョン ("rv") トークンによって報告される
 *
 * @Copyright : 2014 toogie | http://wataame.sumomo.ne.jp/archives/5378
 * @Version   : 1.0
 * @Modified  : 2014-07-24
 *

$(function(){
    var ua, verArr, version, ieVer, ie, chrome, firefox, opera, safari;
    ua = navigator.userAgent;

    // IEかそれ以外かどうかを判定
    if (ua.match(/msie/i) || ua.match(/trident/i)) {
        // IEの場合はバージョンを判定
        verArr = /(msie|rv:?)\s?([\d\.]+)/i.exec(ua);
        version = (verArr) ? verArr[2] : '';
        version = version.replace('.', '_');
        ieVer = "ie"+version;

        // "ie11_0"等を付与
        $("html").addClass(ieVer);
    } else {
        if (ua.match(/chrome/i)) {
            // chrome
            $("html").addClass('chrome');
        } else if(ua.match(/firefox/i)) {
            // firefox
            $("html").addClass('firefox');
        } else if(ua.match(/opera/i)) {
            // opera
            $("html").addClass('opera');
        } else if(ua.match(/safari/i)) {
            // safari
            $("html").addClass('safari');
        }
    }
});
 */



//■■■■■■■■新商品・おすすめ商品エリアのレイアウト維持のために商品名を一定の長さでカット■■■■■■■■
/*
$(window).on('load', function(){
  if($('.productList table tbody tr td table tbody tr td a').length > 0){
    var count = 40; // デフォルトで表示する文字数
    $('.productList table tbody tr td table tbody tr td a').each(function(){
      var target = $(this),
          fullTxt = target.text();
      if(fullTxt.length > count){
        target.text(fullTxt.substr(0,count) + '...');
      }
    });
  }
});
*/

//■■■■■■■■サムネイル画像をクリックして拡大画像を切り替え表示■■■■■■■■
/*

// JavaScript Document
$(function(){
var click_flg = false;
$("#navi a").click(function(){
 if(click_flg == false) {
    click_flg = true;
    $("#photo img").before("<img src='"+$(this).attr("href")+"' alt=''>");
    $("#photo img:last").stop(true, false).fadeOut("fast",function(){
     $(this).remove();click_flg = false;});
      return false;
  }else{
    return false;
  }
});
});


//1ページに複数の場合
$(function(){
var click_flg = false;

$(".mod_gallery_navi a").click(function(){
 if(click_flg == false) {
    click_flg = true;
    var classname = $(this).attr("class");
    $("div."+classname+" img").before("<img src='"+$(this).attr("href")+"' alt=''>");
    $("div."+classname+" img:last").stop(true, false).fadeOut("fast",function(){
     $(this).remove();click_flg = false;});
       return false;
  }else{
    return false;
  }
});
});


<div id="navi">
<ul class="ex_clearfix">
<li><a href="img/image01.jpg"><img src="img/thumbnail01.jpg" width="60" height="60"></a></li>
<li><a href="img/image02.jpg"><img src="img/thumbnail02.jpg" width="60" height="60"></a></li>
<li><a href="img/image03.jpg"><img src="img/thumbnail03.jpg" width="60" height="60"></a></li>
<li><a href="img/image04.jpg"><img src="img/thumbnail04.jpg" width="60" height="60"></a></li>
</ul>
<!-- navi_end --></div>

<div id="photo">
<img src="img/image01.jpg" alt="orange" width="700" height="350">
<!-- photo_end --></div>

<!-- 1ページに複数の場合はコチラ↓class指定 -->
<div class="mod_gallery">
<div class="mod_gallery_navi">
<ul class="ex_clearfix">
<li><a class="gallery01" href="img/image01.jpg"><img src="img/thumbnail01.jpg" width="60" height="60"></a></li>
<li><a class="gallery01" href="img/image02.jpg"><img src="img/thumbnail02.jpg" width="60" height="60"></a></li>
<li><a class="gallery01" href="img/image03.jpg"><img src="img/thumbnail03.jpg" width="60" height="60"></a></li>
<li><a class="gallery01" href="img/image04.jpg"><img src="img/thumbnail04.jpg" width="60" height="60"></a></li>
</ul>
<!-- mod_gallery_navi_end --></div>
<div class="mod_gallery_photo gallery01">
<img src="img/image01.jpg" alt="orange" width="700" height="350">
<!-- mod_gallery_photo_end --></div>
<!--mod_gallery_end--></div>


#navi li{
  width:60px;
  height:60px;
  float:left;
  background:none;
  padding:0 10px 0px 0;
  margin:0 0 10px 0;
}
#navi li a{
  display:block;
}
#navi li a:link    {}
#navi li a:visited {}
#navi li a:hover   {opacity:0.8;}
#navi li a:active  {opacity:0.8;}

#navi li a:hover img {filter:alpha(opacity=80);}

#photo{
  width:700px;
  height:350px;
  margin:20px 0 0 0;
}
#photo img{
  position:absolute;
}


.mod_gallery{
 margin:20px 0 20px 0;
}

.mod_gallery_navi li{
  width:60px;
  height:60px;
  float:left;
  background:none;
  padding:0 10px 0px 0;
  margin:0 0 10px 0;
}
.mod_gallery_navi li a{
  display:block;
}
.mod_gallery_navi li a:link    {}
.mod_gallery_navi li a:visited {}
.mod_gallery_navi li a:hover   {opacity:0.8;}
.mod_gallery_navili a:active  {opacity:0.8;}

.mod_gallery_navi li a:hover img {filter:alpha(opacity=80);}


.mod_gallery_photo{
  width:700px;
  height:350px;
  margin:20px 0 0 0;
}
.mod_gallery_photo img{
  position:absolute;
}



*/







//■■■■■■■■スクロール時のcontentのアクション■■■■■■■■
/*
$(function(){
  var setElm = $('.scrEvent'),
  delayHeight = 100;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({opacity:'1'},500); // 【上】からスクロールしてきた時のイベント
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({opacity:'0'},500); // 【下】からスクロールしてきた時のイベント
      }
    });
  });
});
*/


//■■■スクリール時にcontentの長さによってメニューにカレントを追加■■■■■■■■
/*

<ul id="nav">
<li id="mamm1"><a href="#section01"></a></li>
<li id="mamm2"><a href="#section02"></a><span>住み心地への想いを提案に</span></li>
<li id="mamm3"><a href="#section03"></a><span>京都の風土を知りつくす</span></li>
<li id="mamm4"><a href="#section04"></a><span>建てておわりではありません</span></li>
<li id="mamm5"><a href="#section05"></a><span>良い家を造り続けるために</span></li>
</ul>

$(function(){
var set = 300;//ウインドウ上部からどれぐらいの位置で変化させるか
var boxTop = new Array;
var current = -1;
//各要素の位置
$('.box').each(function(i) {
boxTop[i] = $(this).offset().top;
});
//最初の要素にclass="on"をつける
changeBox(0);
//スクロールした時の処理
$(window).scroll(function(){
scrollPosition = $(window).scrollTop();
for (var i = boxTop.length - 1 ; i >= 0; i--) {
if ($(window).scrollTop() > boxTop[i] - set) {
changeBox(i);
break;
}
};
});
//ナビの処理
function changeBox(secNum) {
if (secNum != current) {
current = secNum;
secNum2 = secNum + 1;//HTML順序用
$('#nav li').removeClass('on');
$('#nav li:nth-child(' + secNum2 +')').addClass('on');

if (current == 0) {
$('#onescroll #nav').css("display","none")
} else if (current == 1) {
$('#onescroll #nav').css("display","block")
} else if (current == 2) {
$('#onescroll #nav').css("display","block")
} else if (current == 3) {
$('#onescroll #nav').css("display","block")
} else if (current == 4) {
$('#onescroll #nav').css("display","block")
}

}
};
});
*/

  //■■■■■■■■スキルstyleのようなアコーディオン　主にメニュー■■■■■■■■
/*
$(function(){


  $('.money-list').hide();

  $('.money-list1').slideDown();


  //click-action
  $('#genre-list li a').on('click', function() {


    //active切り替え
    $(this).toggleClass('active');

//DL要素オブジェクトを代入
    if($(this).parent().attr("class") == "genre-c1"){
      var hitItem = $('.money-list1');
    }else if($(this).parent().attr("class") == "genre-c2"){
      var hitItem = $('.money-list2');
    }else if($(this).parent().attr("class") == "genre-c3"){
      var hitItem = $('.money-list3');
    }else if($(this).parent().attr("class") == "genre-c4"){
      var hitItem = $('.money-list4');
    }else if($(this).parent().attr("class") == "genre-c5"){
      var hitItem = $('.money-list5');
    }

    //開いている要素
    var openItem = hitItem.siblings('.money-list:visible');

    //開いている要素があれば最初に閉じる
    if (openItem.length) {
      openItem.slideUp(function() {
        //其の後開く
        hitItem.slideToggle();
      });
    } else {
      //開いている要素が無ければ
      hitItem.slideToggle();
    }

      return false;
  });

});
*/


//■■■■■■■■コンテンツスクロールアクション■■■■■■■■

/*scrImgのクラスが表示されたらフェードインしながら横スクロールされるscrImgにあらかじめポジションの指定とleftの指定が必要
<section class="scrImg">
</section>
$(function(){
  var setElm = $('.scrImg'),
  delayHeight = 200;

  setElm.css({display:'block',opacity:'0'});
  $('html,body').animate({scrollTop:0},1);

  $(window).on('load scroll resize',function(){
    setElm.each(function(){
      var setThis = $(this),
      elmTop = setThis.offset().top,
      elmHeight = setThis.height(),
      scrTop = $(window).scrollTop(),
      winHeight = $(window).height();
      if (scrTop > elmTop - winHeight + delayHeight && scrTop < elmTop + elmHeight){
        setThis.stop().animate({left:'0',opacity:'1'},500);
      } else if (scrTop < elmTop - winHeight + delayHeight && scrTop < elmTop + delayHeight){
        setThis.stop().animate({left:'-100px',opacity:'0'},500);
      }
    });
  });
});
*/
//■■■■■■■■■サイドバースクロールするが最後の部分でポジションぽレックスになり固定される■■■■■■■■
/*画面横幅いっぱいのスライダー（画像余白なし）や、レスポンシブスライダーを実装する
$(window).load(function () {

  var mainArea = $("#container");
  var sideWrap = $("#h-l");
  var sideArea = $("#h-l-in");

  var wd = $(window);

  var mainH = mainArea.height();
  var sideH = sideWrap.height();


  if(sideH < mainH) {
    sideWrap.css({"height": mainH,"position": "relative"});
    var sideOver = wd.height()-sideArea.height();
    var starPoint = sideArea.offset().top + (-sideOver);
    var breakPoint = sideArea.offset().top + mainH;

    wd.scroll(function() {

      if(wd.height() < sideArea.height()){
        if(starPoint < wd.scrollTop() && wd.scrollTop() + wd.height() < breakPoint){
          sideArea.css({"position": "fixed", "bottom": "0px"});

        }else if(wd.scrollTop() + wd.height() >= breakPoint){
          sideArea.css({"position": "absolute", "bottom": "0"});

        } else {
          sideArea.css("position", "static");

        }

      }else{

        var sideBtm = wd.scrollTop() + sideArea.height();

        if(mainArea.offset().top < wd.scrollTop() && sideBtm < breakPoint){
          sideArea.css({"position": "fixed", "top": "0px"});

        }else if(sideBtm >= breakPoint){

          var fixedSide = mainH - sideH;

          sideArea.css({"position": "absolute", "top": fixedSide});

        } else {
          sideArea.css("position", "static");
        }
      }


    });

  }

});
*/

//■■■■■■■■■スマホでhoverを表現する■■■■■■■■
/*画面横幅いっぱいのスライダー（画像余白なし）や、レスポンシブスライダーを実装する

http://gimmicklog.main.jp/jquery/106/
*/

//■■■■■■■■■スマホでhoverを表現する■■■■■■■■
/*$(event.target)でクリックした箇所のオブジェクト要素を取得出来るようなので、
$(".sp-touchbtn").on('touchstart', function() {
  // タッチしたとき
    // .sp-touchbtn を付与
    $(this).addClass('sp-touchbtn');
  })
  .on('touchend', function() {
  // 指を離したとき
    // .sp-touchbtn を削除
    $(this).removeClass('sp-touchbtn');
  });

*/


//■■■■■■■■■jQuery スクロールによる画像の遅延読み込み■■■■■■■■
/*$(event.target)でクリックした箇所のオブジェクト要素を取得出来るようなので、
$(function () {
// 初回時
delayImage();
// スクロール時
$(window).scroll(function() { delayImage(); });
function delayImage() {
$('img').each(function(){ var img_src = $(this).attr('data-src');
// 表示されていない画像が対象
if ($(this).attr('src') != img_src) {
// 画像位置よりウィンドウ最下部が超えた場合
if ($(window).scrollTop() + $(window).height() > $(this).offset().top) { $(this).fadeOut('fast', function() {
// 画像を表示
$(this).attr('src', img_src).fadeIn();
});
}
}
});
}
});

<img src="/img/loading.png" data-src="/img/xxxxx.jpg">

*/

//■■■■■■■■■ページ内のクリックした箇所の文字色を変更できます。■■■■■■■■
/*$(event.target)でクリックした箇所のオブジェクト要素を取得出来るようなので、
そこから起こしたいアクションを設定するといいみたいですね。
$(document).click(function(event){
    var target = $(event.target);
    target.css("color","#ff6300");
});
クリックした箇所がulの中にあるコンテンツだったら」の場合、
$(document).click(function(event){
    var target = $(event.target);
    if(target.parents("ul").length){
        alert("ulの中の要素です！");
    }

});
*/

//■■■■■■■■■jqueryで同じようなイベント処理のまとめ方■■■■■■■■
/*
要素自身に（data）属性を持たせる
<a href="/aaa" class="event" data-hoge="A">aaa</a><a href="/bbb" class="event" data-hoge="B">bbb</a>
$('.event').on('click', function(){
  console.log($(this).data('hoge') + 'が押された');});
  仮に/cccが増えてもjs側の修正が不要
*/


//■■■■■■■■■scroll, resizeイベントの負荷を抑制する■■■■■■■■
/*
$(function(){
var timer = null;
$(window).on('scroll',function() {
clearTimeout( timer );
timer = setTimeout(function() {
//処理内容
}, 300 );
});
})
なお、リサイズの場合は、タブレットやスマートフォンは縦・横の向きを変更したときぐらいしか発生し得ないのでそれほど気にする必要はありませんが、レスポンシブWebデザインを採用されている場合に、デスクトップにおいてはリサイズが断続的に行われる可能性が考えられるので、scrollの部分をresizeに、onscrollの部分をonresizeに変更することで、リサイズ時における断続的なイベントに対しても同様に負荷を抑制することができます。
*/

//■■■■■■■■■fadeToggleを使ってタブメニュー■■■■■■■■
/*
<div id="carouselwrap">
<div id="prev" class="hide"></div><div id="next" class="show"></div>
<div id="carousel">
<ul>
  <li><a href="#"><img src="img/1.gif"></a></li>
  <li><a href="#"><img src="img/2.gif"></a></li>
  <li><a href="#"><img src="img/3.gif"></a></li>
  .......
</ul>
</div>
</div>
<style>

#carouselwrap {
  position:relative;
  margin:40px auto;
  width:900px;
  height:155px;
  background: #efefef;
}
#carouselwrap #carousel {
  position:relative;
  width:100%;
  height:100%;
  overflow: hidden; //はみでた部分を隠す
}
#carouselwrap ul{
  list-style-type:none;
}
#carouselwrap ul li {
  float:left; // liを横並びにする
  width: 270px;
  height:100%;
  padding-left: 23px;
  display:inline;
}
#carouselwrap ul li img {
  border:none;
}
#carouselwrap #prev,
#carouselwrap #next {
  position: absolute;
  top: 0;
  width: 20px;
  height:100%;
}
#carouselwrap #prev {
  left: -20px; //戻るボタンを左端に配置
  background-image: url(./img/prev.png);
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
#carouselwrap #next {
  right: -20px; //進むボタンを右端に配置
  background-image: url(./img/next.png);
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
// ボタンがアクティブなときは「show」、使えないときは「hide」
#carouselwrap .show {
  cursor: pointer;
  background: #FF3399;
}
#carouselwrap .hide {
  background: #ccc;
}
</style>
<script>
$(function(){
  // prev,nextをクリックしたときに動かすliの数
  var li_move = 3;
  // prev,nextを追加
  $("#carouselwrap").append('<div id="prev" class="hide"></div><div id="next" class="show"></div>');
  // カルーセルパネルの幅を取得
  var carousel_wid = $("#carouselwrap").width();
  // liのpaddingを含む幅を取得
  var li_wid = $("#carousel li").outerWidth();
  // liの数を取得
  var li_num = $("#carousel li").size();
  // ulの幅を計算(liを全部横に並べた幅)
  var ul_wid = li_wid*li_num;
  // ulにスタイルを追加
  $('#carousel ul').css({
    position: 'absolute',
    top: '0',
    left: '0',
    width: ul_wid+'px'
  });
  $('#prev').click(function(){
    // prevをクリックしたときにclass=hideが指定されていなければ、以下を実行
    if($(this).attr("class") != "hide") {
      // ulのpositionを左に動かすアニメーション(:not(:animated)は動いている最中のクリック防止用)
      $('#carousel ul:not(:animated)').animate(
        {left:'+='+li_wid*li_move},
        600,
        function(){
          // アニメーションが完了したらulのposition-leftの位置を取得
          var ul_pos = boxPosition("#carousel ul","left");
          // nextのclassを「show」に書き換え
          $('#next').attr("class","show");
          // ulのposition-leftが0の場合、prevのclassを「hide」に書き換え
          if(ul_pos === 0) {
            $('#prev').attr("class","hide");
          }
        }
      );
    }
  });
  $('#next').click(function(){
    // nextをクリックしたときにclass=hideが指定されていなければ、以下を実行（以下略）
    if($(this).attr("class") != "hide") {
      $('#carousel ul:not(:animated)').animate(
        {left:'-='+li_wid*li_move},
        600,
        function(){
          var ul_pos = boxPosition("#carousel ul","left");
          $('#prev').attr("class","show");
          if(carousel_wid > (ul_wid+ul_pos)) {
            $('#next').attr("class","hide");
          }
        }
      );
    }
  });
  function boxPosition(ele,pos) {
    // 指定されたエレメントのpositionの各値を取得
    var position = $(ele).position();
    // 指定された位置の値をリターン
    return position[pos];
  }
});
</script>


*/

//■■■■■■■■■fadeToggleを使ってタブメニュー■■■■■■■■
/*
<script>
    $(function(){
        $("#tabMenu li a").on("click", function() {
            $("#tabBoxes div").hide();
            $($(this).attr("href")).fadeToggle();
            $("#tabMenu li a").removeClass("active");//追加部分
            $(this).toggleClass("active");//追加部分
        });
        return false;
    });
</script>
<ul id="tabMenu" class="clearfix">
    <li><a href="#tabBox1">タブメニュー1</a></li>
    <li><a href="#tabBox2">タブメニュー2</a></li>
    <li><a href="#tabBox3">タブメニュー3</a></li>
</ul>
<div id="tabBoxes">
    <div id="tabBox1">タブボックス1</div>
    <div id="tabBox2">タブボックス2</div>
    <div id="tabBox3">タブボックス3</div>
</div>
#tabMenu ul{
    width:600px;
    }
#tabMenu li{
    float:left;
    }
#tabMenu li a{
    display:block;
    width:198px;
    height:48px;
    line-height:50px;
    text-align:center;
    border:#ccc 1px solid;
    }
#tabBox1,#tabBox2,#tabBox3{
    width:598px;
    height:300px;
    border:#ccc 1px solid;
    }
#tabBox1{
    background:#FCF;
    }
#tabBox2{
    background:#FFC;
    display:none;
    }
#tabBox3{
    background:#ccc;
    display:none;
    }


#acMenu dt{
    display:block;
    width:185px;
    height:50px;
    line-height:50px;
    text-align:center;
    border:#666 1px solid;
    cursor:pointer;
    background:url(images/i_swich.png) 177px -69px no-repeat;
    padding-right:15px;
    }
#acMenu dd{
    background:#f2f2f2;
    width:200px;
    height:50px;
    line-height:50px;
    text-align:center;
    border:#666 1px solid;
    display:none;
    }
#acMenu dt.active{
    background:url(images/i_swich.png) 177px 18px no-repeat;
    }
*/

//■■■■■■■■■fadeToggleを使ってタブメニューアイコン画像切り替えも■■■■■■■■
/*
<script>
    $(function(){
        $("#acMenu dt").on("click", function() {
            $(this).next().slideToggle();
            $(this).toggleClass("active");//追加部分
        });
    });
</script>
<ul id="tabMenu" class="clearfix">
    <li><a href="#tabBox1">タブメニュー1</a></li>
    <li><a href="#tabBox2">タブメニュー2</a></li>
    <li><a href="#tabBox3">タブメニュー3</a></li>
</ul>
<div id="tabBoxes">
    <div id="tabBox1">タブボックス1</div>
    <div id="tabBox2">タブボックス2</div>
    <div id="tabBox3">タブボックス3</div>
</div>
#acMenu dt{
    display:block;
    width:185px;
    height:50px;
    line-height:50px;
    text-align:center;
    border:#666 1px solid;
    cursor:pointer;
    background:url(images/i_swich.png) 177px -69px no-repeat;
    padding-right:15px;
    }
#acMenu dd{
    background:#f2f2f2;
    width:200px;
    height:50px;
    line-height:50px;
    text-align:center;
    border:#666 1px solid;
    display:none;
    }
#acMenu dt.active{
    background:url(images/i_swich.png) 177px 18px no-repeat;
    }
*/
//■■■■■■■■■パララックス■■■■■■■■
/*スクロール量を取得する
    $(function(){
    $(window).scroll(function(){
    var y = $(this).scrollTop();
    $("#num").text("スクロール量：" + y);//表示用
    });
    });
positionで動かす
    $(function(){
    var liPos = ($("li").offset());//最初の位置
    $(window).scroll(function(){
    var y = $(this).scrollTop();
    $("#icon01").css("top",liPos.top + y / 2);
    $("#icon02").css("top",liPos.top + y / 4);
    $("#icon03").css("top",liPos.top + y / 6);
    $("#icon04").css("top",liPos.top + y / 8);
    });
    });
大きさや角度を変えてみる
(function(){
$(window).scroll(function(){
var y = $(this).scrollTop();
var hoge1 = y * 0.001 + 0.5;
if(hoge1 > 0.5){
$("#box1").css('-moz-transform','scale(' + hoge1 + ')');
}
var hoge2 = y * 0.0009 + 0.1;
if(hoge1 > 0.1){
$("#box2").css('-moz-transform','scale(' + hoge2 + ')');
}
var hoge3 = y * (-0.001) + 2;
if(hoge3 < 2){
$("#box3").css('-moz-transform','scale(' + hoge3 + ')');
}
var hoge5 = y * 0.0009 + 0.5;
$("#box5").css('-moz-transform','rotate(' + y + 'deg) scale(' + hoge5 + ')');
});
});


*/




//■■■■■■■■■bodyも振ったURLのclassでjQueryでカレント表示■■■■■■■■
/*.match(/^mypage-scout/)この正規表現でもじれる以降のものがマッチする
$(function(){
      var urla = $('body').attr("class");
if(urla.match(/^mypage-scout/)){
        $('.tab-out #c3 a').css({'backgroundColor' : '#DD811F', 'color' : '#fff'});
}
if(urla.match(/^mypage-favorite/)){
        $('.tab-out #c2 a').css({'backgroundColor' : '#DD811F', 'color' : '#fff'});
}
if(urla.match(/^mypage-contact/)){
        $('.tab-out #c1 a').css({'backgroundColor' : '#DD811F', 'color' : '#fff'});
}
});
*/

//■■■■■■■■■チェックボックス全選択■■■■■■■■
/*<p><input type="checkbox" name="" class="check-all oll-c mr5" value="">全エリア</p>

$(function(){
$('.check-all').click(function(){ //全選択・全解除をクリックしたとき
    var items = $(this).parents("td").find('.checkbox').find('input');
    if($(this).is(':checked')) { //全選択・全解除がcheckedだったら
        $(items).prop('checked', true); //アイテムを全部checkedにする
    } else { //全選択・全解除がcheckedじゃなかったら
        $(items).prop('checked', false); //アイテムを全部checkedはずす
    }
});
});

*/

//■■■■■■■■■レスポンシブのサイトでスマホの時だけtelリンクを有効にする■■■■■■■■
/*まず電話番号を設定したい画像またはpタグ、spanタグにクラスをつける。


お問い合わせ：<span class="tel-link">00-0000-0000</span>
$(function(){
    var ua = navigator.userAgent;
    if(ua.indexOf('iPhone') > 0 && ua.indexOf('iPod') == -1 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0 ){
        $('.tel-link').each(function(){
            var str = $(this).text();
            $(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
        });
    }
});
ユーザーエージェントで判別して、
そこからtelクラスを設定しているところにリンクを追加するという単純な処理。

■電話番号が画像になっている場合
お問い合わせ：<span class="tel-link"><img src="[表示する画像のパス]" alt="00-0000-0000"></span>
$(function(){
    var ua = navigator.userAgent;
    if(ua.indexOf('iPhone') > 0 && ua.indexOf('iPod') == -1 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0 && ua.indexOf('SC-01C') == -1 && ua.indexOf('A1_07') == -1 ){
        $('.tel-link img').each(function(){
            var alt = $(this).attr('alt');
            $(this).wrap($('<a>').attr('href', 'tel:' + alt.replace(/-/g, '')));
        });
    }
});
*/
//■■■■■■■■■パララックス横移動■■■■■■■■
/*
    yoko1 = $('#para1');

    //スクロール値を取得して分岐
    if(yoko1.hasClass('idononmain1')) {
    } else {
        //スクロール量によって動き出す数値　10以降の位置に来たら動き出す
        if(y > 0){
            //この式で、ボックスの「left」の値を算出します。 「-1837」はボックスの初期位置、つまり計算の基準になる位置です。 次に、「scrollTop - 10」の「10」は、ボックスの移動を開始するscrollTopの位置です。この式により、ボックス移動判定開始位置からどのくらい動いたかを算出できます。
            var float1Left = -1837 + (y - 0);
            //レフトの数値がスライドしてきて最終的に止まる位置
            if(float1Left < -857)
            {
                yoko1.fadeIn(10).css("left" , float1Left + "px");
            }
            else{
                //横レフト止まる位置
                yoko1.css("left" , "-857px").addClass("idononmain1");

            }
        }
        else
        {   //初期値（読み込み時なので隠しておくレフトの位置）
            yoko1.css("left" , "-1837px");
        }
    }

*/


//■■■■■■■■■サムネイルホバー、メイン画像切り替え■■■■■■■■
/*
$(document).ready(function(){
         srca = $("#shobo-wapsing-l li").eq(0).find("img").attr("src");
            $("#target").attr("src",srca);

    //画像切り替え、#targetの内容を変更する。
    $('#shobo-wapsing-l li').on('click mouseover', function() {
        var src = $(this).find("img").attr("alt");
        $("#target").fadeOut("slow",function() {
            $(this).attr("src",src);
            $(this).fadeIn();
            $('#shobo-wapsing-l li').on('mouseout', function() {
            $("#target").attr("src",src);

        });
        });
            return false;
    });


});
*/

//■■■■■■■■■100%スライダー①（画像の左右余白、対応してる。消える場合がある。Sevenまでいくと画像の移動の際に右端にある画像が消えない。最低browserの幅分の枚数は必要）■■■■■■■■
//up/jsにあるtopslider.jsを読み込む
/*
<div id="slide_wrap">
  <div class="slide">One</div>
  <div class="slide">Two</div>
  <div class="slide">Three</div>
  <div class="slide">Four</div>
  <div class="slide">Five</div>
  <div class="slide">Six</div>
  <div class="slide">Seven</div>
</div>

html,body{
  height: 100%;
  overflow-x: hidden;
}
#slide_wrap{
  width: 3500px;
  height: 300px;
  position: relative;
  top: 30px;
  left: 50%;
  margin-left: -1750px;
  background: #ccc;
}
.slide{
  width: 500px;
  height: 300px;
  margin: 0 10px;
  background: #666;
  float: left;
  line-height: 300px;
  font-size: 2rem;
  text-align: center;
}
<script type="text/javascript">
var timer;
$(function(){
  slideLoop();

  return false;
});

function slideLoop(){
  timer = setInterval(function (){
    slideMain();
  },3000);

  return false;
}

function slideMain(){
  var clone = $('.slide:first').clone(false);
  $('.slide:first').animate({'width':'0'},500);
  setTimeout(function(){
    $('#slide_wrap').append(clone);
    $('.slide:first').remove();
  }, 500);

  return false;
}

</script>
*/

//■■■■■■■■■ビックコンテンツスライダー①（画像の左右余白、対応してる。消える場合がある。最低4枚は必要）■■■■■■■■
//up/jsにあるtopslider.jsを読み込む
/*
//////下記画像二枚の場合///////////////////////////////
<script src="js/topslider.js" type="text/javascript"></script>
<div id="slider">
<ul class="cf">
<li><a href="/html/page7.html" title="全品20％ポイント還元キャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b1.gif" alt="全品20％ポイント還元キャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page8.html" title="iPhone Lifeスタートキットキャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b2.jpg" alt="iPhone Lifeスタートキットキャンペーン" width="944" height="352" /></a></li>

<li><a href="/html/page7.html" title="全品20％ポイント還元キャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b1.gif" alt="全品20％ポイント還元キャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page8.html" title="iPhone Lifeスタートキットキャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b2.jpg" alt="iPhone Lifeスタートキットキャンペーン" width="944" height="352" /></a></li>

<li><a href="/html/page8.html" title="iPhone Lifeスタートキットキャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b2.jpg" alt="iPhone Lifeスタートキットキャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page7.html" title="全品20％ポイント還元キャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b1.gif" alt="全品20％ポイント還元キャンペーン" width="944" height="352" /></a></li>

</ul>
<div id="yajicen">
<p id="prev"><img src="<?php echo get_template_directory_uri(); ?>/images/h-yaji-l.png" alt="" width="64" height="72" class="rollover" /></p>
<p id="next"><img src="<?php echo get_template_directory_uri(); ?>/images/h-yaji-r.png" alt="" width="64" height="72" class="rollover" /></p>
</div>
</div>


//////三枚の場合///////////////////////////////
<li><a href="/html/page7.html" title="全品20％ポイント還元キャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b1.gif" alt="全品20％ポイント還元キャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page8.html" title="iPhone Lifeスタートキットキャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b2.jpg" alt="iPhone Lifeスタートキットキャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page12.html" title="ベイビーデコルのページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b3.jpg" alt="BABY DECOLは女の子のためのおしゃれなiPhoneステッカーとして誕生しました。iPhoneを自分のなりたいイメージにファッションチェンジ！" width="944" height="352" /></a></li>

<li><a href="/html/page7.html" title="全品20％ポイント還元キャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b1.gif" alt="全品20％ポイント還元キャンペーン" width="944" height="352" /></a></li>
<li><a href="/html/page12.html" title="ベイビーデコルのページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b3.jpg" alt="BABY DECOLは女の子のためのおしゃれなiPhoneステッカーとして誕生しました。iPhoneを自分のなりたいイメージにファッションチェンジ！" width="944" height="352" /></a></li>
<li><a href="/html/page8.html" title="iPhone Lifeスタートキットキャンペーンページへ"><img src="http://happy-camper.jp/design/dpops123/images/s-b2.jpg" alt="iPhone Lifeスタートキットキャンペーン" width="944" height="352" /></a></li>

//////四枚の場合////////////////////////////////
<li><a href="<?php bloginfo('url'); ?>/characteristic/special/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b2.png" alt="都心（23区）の相続税申告・生前対策専門" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/characteristic/special/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b3.png" alt="初めての方へ 多くの人が渋谷駅前相続税相談室を訪れる理由とは？" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/characteristic/specialty/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b4.png" alt="都心（23区）の相続税申告・生前対策専門" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/publishlist/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b1.png" alt="書籍紹介「生きてるうちに相続税をゼロにする方法」「ビルオーナーの相続対策」" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/characteristic/special/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b2.png" alt="都心（23区）の相続税申告・生前対策専門" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/characteristic/special/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b3.png" alt="初めての方へ 多くの人が渋谷駅前相続税相談室を訪れる理由とは？" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/publishlist/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b1.png" alt="書籍紹介「生きてるうちに相続税をゼロにする方法」「ビルオーナーの相続対策」" width="736" height="352" /></a></li>

<li><a href="<?php bloginfo('url'); ?>/characteristic/specialty/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-b4.png" alt="都心（23区）の相続税申告・生前対策専門" width="736" height="352" /></a></li>




#slider{
position: relative;
width:100%;
height:377px;
overflow-x: hidden;
background:center center;
margin: 0 0 0 0;
padding: 0;
}
#slider ul{
position: relative;
top: 0;
left: 0;
}
#slider li{
float: left;
width:765px; //ここの幅の調節で画像の間隔を出す
text-align:center;
}

#slider li a img{
display:block;
box-shadow:1px 1px 3px #8B8B8B;
-webkit-box-shadow:1px 1px 3px #8B8B8B;
-moz-box-shadow:1px 1px 3px #8B8B8B;
-ms-box-shadow:31px 1px 3px #8B8B8B;

}
#slider #prev,
#slider #next{
position: absolute;
top:-215px;
cursor: pointer;
}
#slider #prev{    left: -395px;}
#slider #next{    right: -340px;}

#slider ul,
#slider #next,
#slider #prev{
visibility: hidden;
}
#slider .layer{
width:765px;
height: 360px;
position: absolute;
top: 0;
left: 0;
z-index: -10;
}

#yajicen{
width: 100px;
margin:0 auto;

position:relative;
}
*/

//■■■■■■■■■ビックコンテンツスライダー②（画像の左右余白、対応してない。最低4枚は必要）■■■■■■■■
//up/jsにあるslide.jsを読み込む
/*
<script src="js/slide.js" type="text/javascript"></script>
<!-- #maincontent start -->


<div id="maincontent">


  <div class="element pict"><a href="http://www.vogue.co.jp/fashion/fashionstories/theme/115"><img src="aaa/well-3.jpg" alt="" height="480" width="854"></a></div>
  <div class="element pict"><a href="http://www.vogue.co.jp/fashion/fashionstories/theme/114"><img src="aaa/well-4.jpg" alt="THE MORNING AFTER" height="480" width="854"></a></div>
  <div class="element pict"><a href="http://www.vogue.co.jp/fashion/fashionstories/theme/116"><img src="aaa/well1.jpg" alt="THE LIGHT BREEZE OF SPRING" height="480" width="854"></a></div>
  <div class="element pict"><a href="http://www.vogue.co.jp/special/page/xmas2013/"><img src="aaa/xmas_vogue_premium.jpg" alt="A Wonder X’mas リュクスという名の魔法にかかる、スペシャル・クリスマスがここに。" height="480" width="854"></a></div>
  <div class="element pict"><a href="http://www.vogue.co.jp/beautyaward/2013/winners"><img src="aaa/banner_W854H480.jpg" alt="VOGUE BEAUTY AWARD 2013 発表編" height="480" width="854"></a></div>

  <div class="element navi left"><img src="aaa/left.gif" alt="left" height="160" width="80"></div>
  <div class="element navi right"><img src="aaa/right.gif" alt="right" height="160" width="80"></div>
</div>
<!-- #maincontent end -->
 maincontent
#maincontent {
    height: 480px;
    overflow: hidden;
    position: relative;
}
#maincontent div.pict {
    cursor: default !important;
    padding:0 0px;
}
#maincontent div.main {
    position: static;
    text-align: center;
    display: block;
    cursor: pointer !important
}
#maincontent .element {
    display: none;
    position: absolute !important;
    background: #000;
}
#maincontent .left {
    top :160px;
    left: 0;
    cursor: pointer;
}
#maincontent .right {
    top: 160px;
    right: 0;
    cursor: pointer;
}

*/

//■■■■■■■■■カレンダー■■■■■■■■
/*
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://alphasis.info/library/javascript/jquery/ui/i18n/jquery.ui.datepicker-ja.js" type="text/javascript"></script>
<input id="jquery-ui-datepicker" type="text" placeholder="クリックして下さい" readonly="" name="" value="">
        $(function(){
             $("#jquery-ui-datepicker").datepicker();
             $("#jquery-ui-datepicker").datepicker("option", "dateFormat", 'yy/mm/dd');
        });
*/


//■■■■■■■■■モーダルウィンドウデーターIDで複数対応バージョン■■■■■■■■
/*
.modal{display:none;}
.modalBody{position: fixed; z-index:1000; background: #fff; padding:29px 15px; left:50%; top:50%;
    border-radius:5px;
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
      width: 690px;
        height: 427px;
        overflow-y: scroll;
        }

.modalBK{    opacity:0;
    filter: alpha(opacity=0);
    position: fixed;
    top:0;
    left:0;
    z-index:900;
    width:100%;
    height:100%;
    background:#000;}
.btns{font-size: 80px; width:150px; background:#111; height: 150px; line-height:150px; text-align:center; font-family: arial; color: #fff; float: left; margin:10px; cursor: pointer}
.close{cursor: pointer;}
.modal{width:690px; color: #eee;}
.modal p{font-size:12px; text-align:justify;}
.modal h1{font-weight:bold; font-size: 30px;}
.modalBody{padding: 10px;}

<div class="modal wd1">
  <div class="modalBody">
    <p class="close">×close</p>
    <p>…..</p>
  </div>
  <div class="modalBK"></div>
</div>


<div class="modal wd2"> <div class="modalBody"> <p class="close">×close</p> <p>…..</p> </div> <div class="modalBK"></div> </div>

$(function(){
  $('.btns').click(function(){
    wn = '.' + $(this).data('tgt');
    var mW = $(wn).find('.modalBody').innerWidth() / 2;
    var mH = $(wn).find('.modalBody').innerHeight() / 2;
    $(wn).find('.modalBody').css({'margin-left':-mW,'margin-top':-mH});
    $(wn).fadeIn(500);
  });
  $('.close,.modalBK').click(function(){
    $(wn).fadeOut(500);
  });
});
*/

//■■■■■■■■■モーダルウィンドウサイズ変化対応バージョン■■■■■■■■
/*

$( function() {
$(".showoverlay").click(function() {
    $("body").append("<div id='overlay'></div>");
    $("#overlay").fadeTo(500, 0.7);
    $("#modalbox").fadeIn(500,function(){


    });
});
$(".close").click(function() {
    $("#modalbox, #overlay").fadeOut(500, function() {
        $("#overlay").remove();
    });
    return false;

});

$(window).resize(function() {
    $("#modalbox").css({
        top: ($(window).height() - $("#modalbox").outerHeight()) / 2,
        left: ($(window).width() - $("#modalbox").outerWidth()) / 2
    });
});

$(window).resize();

});

#modalbox {
    display:none;
    position: fixed;
    z-index:1000;
    width:354px;
    padding:29px 15px;
    background:#fff;
    border-radius:5px;
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
}

#overlay {
    opacity:0;
    filter: alpha(opacity=0);
    position: fixed;
    top:0;
    left:0;
    z-index:900;
    width:100%;
    height:100%;
    background:#000;
}

#close {
    line-height:1;
    font-size:14px;
    position: absolute;
    top:10px;
    right:10px;
    color:red;
    text-decoration:none;
}



<div id="modalbox">
    <a href="#" id="close">x</a>
    <p>
        text text text text text text text
        text text text text text text
        text text text text text text
        text text text text text text
    </p>
</div>

<a href="#" id="showoverlay">Show</a>

*/




//■■■■■■■■■スクロールバーカスタム■■■■■■■■
/*
最低限必要なのは
・jQuery本体
・jquery.jscrollpane.min.js
http://jscrollpane.kelvinluck.com/script/jquery.jscrollpane.min.js
・jquery.jscrollpane.css
http://jscrollpane.kelvinluck.com/style/jquery.jscrollpane.css
の3つです。
$(function(){
    $('.scroll_area').jScrollPane();
});

//全体
.jspContainer { overflow:hidden; position:relative; }

//スクロールバーを除いたエリア
.jspPane { position:absolute; }

//縦スクロールバー
.jspVerticalBar { position:absolute; top:0; right:0; width:10px; height:100%; }

//横スクロールバー
.jspHorizontalBar { position:absolute; bottom:0; left:0; width:100%; height:10px; }

//背景
.jspTrack { background:#111; position:relative; }

//ノブ
.jspDrag { background:#333; position:relative; top:0; left:0; cursor:pointer; }
.jspHorizontalBar .jspTrack, .jspHorizontalBar .jspDrag { float:left; height:100%; }
※スクロールさせる要素はブロック要素で囲む
*/


//■■■■■■■■■クッキー関連（クリックしたら配列に入れて、比較してないものなら配列に追加する）■■■■■■■■
/*
$(function(){

//クッキーの配列変数
var items = [];

$('.cart-tuika span,.c-click-ti').click(function() {
    if(items.length < 20){
        //上部のカート数　itemsの配列数
        $("#navigation-r5 input").val(items.length +"/20");
    }
    if($.inArray($(this).prev().val(),items) > -1){
        //クッキー変数のデータとクリックしたデータの比較して重複してたら何もしない
    }else{
        //重複してなかったらitemsにデータを追加していき、文言も変化、items変数をクッキーと関連付ける
        items.push(
        $(this).prev().val());

        $(this).text("カートに追加しました。").css("background","#009DEF").addClass("c-selected");
        //joinで文字列
        //配列インデックスを指定した区切り文字で結合し、結果の文字列を返します。区切り文字を省略した場合は、カンマ「 , 」で結合します。
        //配列名.join(区切り文字)
        $.cookie('sticky', items.join(','), {path: '/',expires: 7}).replace("%2C", ",");
$.post("../templates/ajax/cart_cookie.php", {
items:items
}, function (returnValue) {
    //コールバック
    //バン！っと、できたら一括で請求画面に表示できるようにＰＨＰで組んでもらいたい
$("#sel2").append(returnValue.items);
    //コールバック終わり
}, "json");
//講座一覧
$(".cart-tuika span").each(function(){
    if($.inArray($(this).prev().val(),items) > -1){
        $(this).text("カートに追加しました。").css("background","#009DEF").addClass("c-selected");
    }else{
        $(this).text("資料請求カートに追加").css("background","#F85636").addClass("c-selected-none");
    }
});
        $("#navigation-r5 input").val(items.length +"/20");
    }
        return false;
});



    //if (!$.cookie('sticky')) return;
    //var items = $.cookie('sticky').split(',');

//講座一覧
$(".cart-tuika span").each(function(){
    if($.inArray($(this).prev().val(),items) > -1){
        $(this).text("カートに追加しました。").css("background","#009DEF").addClass("c-selected");
    }else{
        $(this).text("資料請求カートに追加").css("background","#F85636").addClass("c-selected-none");
    }
});

//スクール講座情報一覧
$(".shikaku-wap-box .s-t-rr a").each(function(){
    if($.inArray($(this).prev().val(),items) > -1){
        $(this).text("カートに追加しました。").css("background","#009DEF").addClass("c-selected");
    }else{
        $(this).text("資料請求カートに追加").css("background","#F85636").addClass("c-selected-none");
    }
});

if(items.length < 20){
$("#navigation-r5 input").val(items.length +"/20");
}

$.post("../templates/ajax/cart_cookie.php", {
items:items
}, function (returnValue) {
    //コールバック
    //バン！っと、できたら一括で請求画面に表示できるようにＰＨＰで組んでもらいたい
$("#sel2").append(returnValue.items);
    //コールバック終わり
}, "json");



$(".cart-table-tori-b-spa").click(function() {
    if($.inArray($(this).prev().val(),items) > -1){
        //クッキー変数のデータとクリックしたデータの比較して重複してたらitemsから重複してるのを消して、表示自体も消す
        for(i = 0; i < items.length; i++){
            if(items[i] == $(this).prev().val()){
                items.splice(i,1);

                $(this).parents(".ck-t-dle").fadeOut(700,function(){
                    //fadeOutのコールバック内
                    $(this).remove();
                    if($(".cart-table-tori-b-spa").length == 0){
                            $(".cart-table").fadeOut(700, function(){
                                $(this).remove()
                                });
                                $(".cart-titleimg-b").text("全て取り消しました。");
                                $(".cart-none").fadeOut(700, function(){
                                $(this).remove();
                                $("#s-conout").css("padding","0 0 10px");
                                });
                                }});

            }
                    $.cookie('sticky', items.join(','), {path: '/',expires: 7}).replace("%2C", ",");
        $.post("../templates/ajax/cart_cookie.php", {
items:items
}, function (returnValue) {
    //コールバック
$("#sel2").append(returnValue.items);
    //コールバック終わり
}, "json");
        }
    }else{

    }

});

$(".cart-cr").click(function() {
    $.cookie("sticky","",{path:"/",expires:-1});
});








$(function(){
    var COOKIE_NAME = 'test_cookie_name';
    var COOKIE_PATH = '/';

    var page_array = [];
    if($.cookie(COOKIE_NAME)){
        page_array = $.cookie(COOKIE_NAME).split("-");
    }

    // 現在開いているページのファイル名を取得
    var file_url = location.href;
    file_url = file_url.substring(file_url.lastIndexOf("/")+1,file_url.length);
    file_url = file_url.substring(0,file_url.indexOf("."));

    if( $.inArray(file_url, page_array) == -1) {
        // cookieから取得した配列内に存在しない場合は追加
        page_array.push(file_url);
    }

    // パス(/)や有効期限(3日)を指定する
    var date = new Date();
    date.setTime(date.getTime() + ( 1000 * 60 * 60 * 24 * 3 ));

    // とりあえず"-"区切りで連結してcookieに格納
    $.cookie(COOKIE_NAME, page_array.join("-"), { path: COOKIE_PATH, expires: date });
})
});


//クッキー削除　$.cookie("hoge", null);
//クッキー設定　$.cookie(Cookie名, 値);
//クッキー内容吐き出し　$.cookie(Cookie名);

//$.cookie(Cookie名, 値, {
//  expires: 有効期限（日数）,
//  path: パス,
//  domain: ドメイン,
//  secure: HTTPS接続の場合のみにCookieを送信
//});

//$.cookie('the_cookie', 'the_value', {expires: 7, path: '/', domain: 'jquery.com', secure: true});
//クッキー関連終わり

*/
//■■■■■■■ajaxひな形？■■■■■■■■■■
/*
  $("#kyoumi a").click(function(){
    uid1 = $(this).data('uid1');

  if(uid1 == 0){
  $("#BlackWindow, #lightbox-panel").fadeIn(300);
}else if($(this).hasClass(kyomote-nane)){
    $(this).off();
}else{


    clickhit_lice_ki = $(this).data('id1');
    clickhitwap_lice_ki = $(this);

    //ajax
                        $.post(
                            '/templates/ajax/status_button.php',
                            {
                                'user_id1': uid1,
                                'license_id1': clickhit_lice_ki,
                                'status1': 2
                            },
                            function(){
                                clickhitwap_lice_ki.off().parent().addClass("kyomote-nane");
    　                           return false;
                            }
                        );
    //ajax終わり

    }
  });



        //ajaxでヴァリューを送る用の変数
        var license_id4 = $(this).data('id');
        //ajax
        $.post( "/templates/ajax/all-pull-ajax.php",{
        license_id4:license_id4
        },function(returnValue){

        var ret3 = "";
        for( var i=0 ; i<returnValue.license_id4.length ; i++ ) {
        ret3 += returnValue.license_id4[i] + "\n";
        }
        document.getElementById("chuu-box-inh3").innerHTML = ret3;

*/
//■■■■■■■■■アコーディオン　ｄｌ用のテンプレ■■■■■■■■
/*
//ログイン会員ボタンのツールチップ
(function(){$.fn.popbox=function(a){var b=$.extend({selector:this.selector,open:".open",box:".box",arrow:".arrow",arrow_border:".arrow-border",close:".close"},a),c={open:function(a){a.preventDefault();var d=$(this),e=$(this).parent().find(b.box);e.find(b.arrow).css({left:e.width()}),e.find(b.arrow_border).css({left:e.width()}),e.css("display")=="block"?c.close():e.css({display:"block",top:35,left:d.parent().width()/2-e.width()})},close:function(){$(b.box).fadeOut("fast")}};return $(document).bind("keyup",function(a){a.keyCode==27&&c.close()}),$(document).bind("click",function(a){$(a.target).closest(b.selector).length||c.close()}),this.each(function(){$(b.open,this).bind("click",c.open),$(b.open,this).parent().find(b.close).bind("click",function(a){a.preventDefault(),c.close()})})}}).call(this);


$(function(){

    $('.popbox').popbox({
  'open'          : '.open',
  'box'           : '.box',
  'arrow'         : '.arrow',
  'arrow-border'  : '.arrow-border',
  'close'         : '.close'
});

});

//ログインポップアップのCSS
.popbox{
margin:0px auto;
text-align: right;
position:relative;
float: right;
margin:18px 2.46429% 0 0;
padding:25px 0 0;
display:block;
padding:7px 0 0 5.95238%;
}

.collapse{ position:relative; }

.box{
display:block;
display:none;
background:#FFF;
border:solid 1px #dcdcdc;
border-radius:5px;
box-shadow:1px 1px 2px #666666;
position:absolute;
padding:17px 20px;
z-index:100;
}

.arrow{
width:0;
height:0;
border-left:11px solid transparent;
border-right:11px solid transparent;
border-bottom:11px solid #FFF;
position:absolute;
left:1px;
top:-10px;
z-index:1001;
}

.arrow-border{
width:0;
height:0;
border-left:11px solid transparent;
border-right:11px solid transparent;
border-bottom:11px solid #BBBBBB;
position:absolute;
top:-12px;
z-index:1000;
}

.popbox #pop-c{
color:#c7c7c7;
}
<div id="h-rbox" class="cf">
          <div class='popbox'>

            <a class="open" href='mypage/login.html' title="ログインのページへ">ログイン</a>
            <!--
            <span class="s-login"><a href='<?php echo getPathinfo();?>/mypage/login.html' title="ログインのページへ">ログイン</a></span>
            -->

            <div class='collapse'>
              <div class='box'>
                <div class='arrow'> </div>
                <div class='arrow-border'></div>
                <div id="popbox-in">
                  <form action="" method="post">

                    <p id="popbox-close">
                    <a href="#" id="pop-c" class="close">close</a>
                    </p>

                    <dl class="login-fpop">
                    <dt>ユーザー名またはメールアドレス</dt>
                    <dd>
                    <input type="text" name="user_login_id_login" value="<?php echo $_SESSION['user_login_id_login'];?>">
                    </dd>
                    </dl>

                    <dl class="login-fpop">
                    <dt>パスワード</dt>
                    <dd>
                    <input type="password" name="user_login_password_login" value="<?php echo $_SESSION['user_login_password_login'];?>">
                    </dd>
                    </dl>

                    <dl class="login-fpop-bottom cf">
                    <dt>
                    <input name="login_cookie" value="1" type="checkbox" id="login-data-saveb">
                    <label for="login-data-saveb">保存する</label>
                    </dt>
                    <dd>
                    <button type="submit">ログイン</button>
                    </dd>
                    </dl>

                    <p id="pass-none">
                    <a href="">パスワードを忘れた場合はコチラ</a>
                    </p>

                  </form>
                </div><!--popbox-in-->
              </div><!--box-->
            </div><!--collapse-->

          </div>
        <?php if ($_SESSION['user_name'] != "") {?><!--ログイン処理-->
        <!--
        <p id="h-reg-b"><a href="<?php //echo getPathinfo();?>/mypage/">マイページはコチラ</a></p>
        -->
        <?php } else {?><!--未ログイン処理-->

        <?php } ?>
        </div>
*/



//■■■■■■■■■アコーディオン　ｄｌ用のテンプレ■■■■■■■■
/*

$(function(){
    $(".qabox-w-a").hide();

    $("#Detail4 dd").hide();
    $("#Detail4 dl").eq(0).find("dd").slideDown();
    $("#Detail4 dl").find("img").eq(0).attr("src","/design/saburaimu/images/sho-aco-c.gif");

    $(".qabox-w-ll a").click(function(){
        if($(this).parents(".qabox-w").next().css('display') == 'none'){
            $(this).find("img").attr("src","/wp-content/themes/tokyoshobo/images/aco-toji.gif");
            $(this).find(".tojiru").text("閉じる");
            $(this).parents(".qabox-w").next().slideDown();
        }else if($(this).parents(".qabox-w").next().css('display') == 'block'){
            $(this).find("img").attr("src","/wp-content/themes/tokyoshobo/images/aco-hira.gif");
            $(this).find(".tojiru").text("開く");
            $(this).parents(".qabox-w").next().slideUp();
        }
        return false;
    });

});
*/



//■■■■■■■■数字の上下加減   ■■■■■■■■
/*
http://jqueryui.com/spinner/

*/

//■■■■■■■■ページ遷移しないタブメニュー    ■■■■■■■■
/*
//TOPタブメニュー
$( function() {
    $( '#jquery-sample-tabs > ul > li' ).bind('click', function() {
        var str = $( 'input', this ).val();
        $('#jquery-sample-tabs > div > div' ).not(str).css('display','none');
        $(str ).css('display', 'block');
        $(this ).css({'backgroundColor':'#ffffff', 'color':'#cf3131'} );
        $('#jquery-sample-tabs > ul > li').not(this).css( {'backgroundColor': '#ebebeb','color': '#aeaeae' } );
    } ).first().click();
});

#jquery-sample-tabs > ul li{
float:left;
height:28px;
line-height:28px;
overflow:hidden;
text-align:center;

タブが三つのとき
width:26.567%;

width:41.567%;

display:block;
text-decoration:none;
color:#333;
background:#ffffff;
margin:0 0 0 5.128205128205128%;
border-radius:5px 5px 0 0;
-ms-border-radius:5px 5px 0 0;
-o-border-radius:5px 5px 0 0;
-moz-border-top-left-radius:5px;
-moz-border-top-right-radius:5px;
-webkit-border-top-left-radius:5px;
-webkit-border-top-right-radius:5px;
}

#jquery-sample-tabs > ul li a:hover{
background:#000;
color:#fff;
}
#jquery-sample-tabs{
padding:33px 0 0;
}

#jquery-sample-tabs > ul li{
display: block;
font-size:12px;
letter-spacing:0.1px;
border:1px solid #FFFFFF;
cursor:pointer;
}
#jquery-sample-tabs > div{
padding:31px 4.91803%;
background-color:#FFFFFF;
}

<div id="jquery-sample-tabs">

            <ul class="cr">
              <li>
                <input id="#jquery-sample-tab-1" type="hidden" value="#jquery-sample-tab-1-contents" />
               RANKING 人気ランキング
              </li>
              <li>
                <input id="#jquery-sample-tab-2" type="hidden" value="#jquery-sample-tab-2-contents" />
               CHECK 履歴
              </li>
            </ul>

            <div id="tab_contents">

              <div id="jquery-sample-tab-1-contents">
                <div id="tab1" name="tab1">


                </div>
              </div><!--jquery-sample-tab-1-contents -->

              <div id="jquery-sample-tab-2-contents" style="display:none;">
                <div id="tab2" name="tab2">


                </div>
              </div><!-- jquery-sample-tab-2-contents-->

            </div><!-- tab_contents-->

          </div>


*/


//■■■■■■■■ただのアコーディオン■■■■■■■■
/*
$(function(){
$('.subMenu').hide();

$('.archive').click(function(){
$('+ul.subMenu',this).slideToggle();
});

});
</script>

<div class="section ke" id="k-kishu">

<h4 class="archive" id="b">docomo</h4>

<ul class="subMenu">
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
</ul>

</div>
*/





//■■■■■■■■郵便番号検索■■■■■■■■
/*
http://code.google.com/p/ajaxzip3/
ajaxzip2を使う場合順番に気をつける
ajaxzip2を読み込んでからバリテーションのjsファイル
*/


//■■■■■■■■閉じてから開くアコーディオン■■■■■■■■
//■■■■■■■■//※離れてる場所に開くコンテンツがある場合■■■■■■■■
/*


        $('#top-sa > div').hide();
        //click-action
        $('#search-in .accordion1').click(function () {

            //active切り替え
            $(this).toggleClass('active');

            //DL要素オブジェクトを代入
            var hitItem = $('#sa1');
            //開いている要素
            var openItem = hitItem.siblings('#top-sa > div:visible');

            //開いている要素があれば最初に閉じる
            if (openItem.length) {
                openItem.slideUp('fast',function() {
                    //其の後開く
                    hitItem.slideToggle('normal');
                });
            } else {
                //開いている要素が無ければ
                hitItem.slideToggle('normal');
            }

        });



        //click-action
        $('#search-in .accordion2').click(function () {

            //active切り替え
            $(this).toggleClass('active');

            //DL要素オブジェクトを代入
            var hitItem = $('#sa2');
            //開いている要素
            var openItem = hitItem.siblings('#top-sa > div:visible');

            //開いている要素があれば最初に閉じる
            if (openItem.length) {
                openItem.slideUp('fast',function() {
                    //其の後開く
                    hitItem.slideToggle('normal');
                });
            } else {
                //開いている要素が無ければ
                hitItem.slideToggle('normal');
            }

        });
*/


//■■■■■■■■モーダルウィンドウ■■■■■■■■
//■■■■■■■■html内に中身を書き込むタイプ＆複製が容易■■■■■■■■
/*
表示するコンテンツを増やす場合にはコピー&ペーストでwd2,wd3…と任意の数にしてください。

$(function(){
    $('.btns').click(function(){
        wn = '.' + $(this).attr('data-tgt');
        var mW = $(wn).find('.modalBody').innerWidth() / 2;
        var mH = $(wn).find('.modalBody').innerHeight() / 2;
        $(wn).find('.modalBody').css({'margin-left':-mW,'margin-top':-mH});
        $(wn).fadeIn(500);
    });
    $('.close,.modalBK').click(function(){
        $(wn).fadeOut(500);
    });
});
<div class="modal wd1">
    <div class="modalBody">
        <p class="close">×close</p>
        <p>…..</p>
    </div>
    <div class="modalBK"></div>
</div>


<div class="modal wd2"> <div class="modalBody"> <p class="close">×close</p> <p>…..</p> </div> <div class="modalBK"></div> </div>

<div class="modal wd3"> <div class="modalBody"> <p class="close">×close</p> <p>…..</p> </div> <div class="modalBK"></div> </div>

<p data-tgt="wd1" class="btns">1</p> <p data-tgt="wd2" class="btns">2</p> <p data-tgt="wd3" class="btns">3</p>

.modal{display:none;}
.modalBody{position: fixed; z-index:1000; background: #000; width:690px; left:50%; top:50%; height: 400px}
.modalBK{position: fixed; z-index:999; height:100%; width:100%;background:#000; opacity: 0.9;filter: alpha(opacity=90);-moz-opacity:0.90;}

装飾CSS　　※割愛していただいてかまいません。
.btns{font-size: 80px; width:150px; background:#111; height: 150px; line-height:150px; text-align:center; font-family: arial; color: #fff; float: left; margin:10px; cursor: pointer}
.close{cursor: pointer;}
.modal{width:690px; color: #eee;}
.modal p{font-size:12px; text-align:justify;}
.modal h1{font-weight:bold; font-size: 30px;}
.modalBody{padding: 10px;}
*/


//■■■■■■■■モーダルウィンドウ■■■■■■■■
//■■■■■■■■html内に中身を書き込むタイプ■■■■■■■■
/*
    $(document).ready(function(){
    //show-panelボタンをクリックしたらLightBoxを表示する
    $("a#show-panel").click(function(){
    $("#BlackWindow, #lightbox-panel").fadeIn(300);　//表示速度は数値を調整
    })
    //CloseボタンをクリックしたらLightBoxを閉じる
    $("a#close-panel").click(function(){
    $("#BlackWindow, #lightbox-panel").fadeOut(300);//フォードアウトの速度は数値を調整
    })
    //背景の黒地をクリックしたらLightBoxを閉じる
    $("#BlackWindow").click(function(){
    $("#BlackWindow, #lightbox-panel").fadeOut(300);//フォードアウトの速度は数値を調整
    })
    })

        <a id="show-panel" href="#">Show</a>
    <div id="lightbox-panel">
        <h1>Lightbox Sample</h1>
        <p>jQueryプラグイン不要でたった数行でLightBoxを実装</p>
        <p align="center">
            <a id="close-panel" href="#">Close</a>
        </p>
    </div>
    <div id="BlackWindow"></div>


    //Lightbox で表示させるDIV要素のCSS
    #lightbox-panel {
    -moz-border-radius: 6px;
    background: #eef2f7;
    -webkit-border-radius: 6px;
    border: 1px solid #536376;
    -webkit-box-shadow: rgba(0,0,0,.6) 0px 2px 12px;
    -moz-box-shadow: rgba(0,0,0,.6) 0px 2px 12px;
    padding: 14px 22px;
    width: 400px;
    position:fixed;
    top:100px;
    left:50%;
    display:none;
    z-index:10;
    border:2px solid #CCCCCC;
    padding:10px 15px 10px 15px;
    margin-left:-200px;
    }
    //Lightbox表示時に背景を黒に
    #BlackWindow{
    display:none;
    background:#000000;
    opacity:0.7;//黒地の背景の調整はこの数値で調整
    filter:alpha(opacity=70);//黒地の背景の調整はこの数値で調整
    position:absolute;
    top:0px;
    left:0px;
    min-width:100%;
    min-height:100%;
    z-index:1;
    }
*/
//■■■■■■■■モーダルウィンドウ■■■■■■■■
//■■■■■■■■html()に中身を直接書き込むタイプ■■■■■■■■

/*



        $(function(){
            $(".kakusi").hide()
            $("body").append("<div id='glayLayer'></div><div id='overLayer' class='cf'></div>")

            $("#glayLayer").click(function(){
                $(this).hide()
                $("#overLayer").hide()
            })

            $(".kakusi-a,#musi a").click(function(){
                $("#glayLayer").show()
                $("#overLayer").show().html("<div class='cf modaruwap'><p class='batutu close'><img width='64' src='/quiz/pc/images/batu.gif'></p><p class='ovimg-l'><img src='http://nex.wpmg.jp/quiz/pc/images/map-b.png' />"+"<div class='ovimg-r'><p class='mongon-dai'>"+$("#map-r").text()+"</p><dl class='cf'><dt>A</dt><dd><?php echo $aA;?></dd></dl class='cf'><dl class='cf'><dt>B</dt><dd><?php echo $aB;?></dd></dl><dl class='cf'><dt>C</dt><dd><?php echo $aC;?></dd></dl><dl class='cf'><dt>D</dt><dd><?php echo $aD;?></dd></dl></div></div>").css({
                    marginTop:"-"+$("#overLayer").height()/2+"px" ,
                    marginLeft:"-"+$("#overLayer").width()/2+"px"
                })

                $("#overLayer .close").click(function(){
                    $("#glayLayer").hide()
                    $("#overLayer").hide()
                return false;
                })
                return false;
            })
        })


html,body{
    margin:0;
    padding:0;
    height:100%;
}

div#glayLayer{
    display:none;
    position:fixed;
    left:0;
    top:0;
    height:100%;
    width:100%;
    background:#fff;
    filter:alpha(opacity=90);
    opacity: 0.9;
        z-index: 100;
}

#overLayer{
    display:none;
    width:896px;
    position: fixed;
    top:50%;
    left:50%;
    height: 480px;
        z-index: 1000;
}
#overLayer .close{

    position: fixed;
    right: 0;
    top: 0;
    cursor:pointer;
}
*/

/*
//■■■■■■■■マウスホバーで画像切り替え■■■■■■■■
//メイン画像名をimg1.jpg　サムネイルをimg1_thumb.jpg　に
$(function() {
    $('img.thumb').mouseover(function(){
        // "_thumb"を削った画像ファイル名を取得
        var selectedSrc = $(this).attr('src').replace(/^(.+)_thumb(\.gif|\.jpg|\.png+)$/, "$1"+"$2");

        // 画像入れ替え
        $('img.mainImage').stop().fadeOut(200,
            function(){
                $('img.mainImage').attr('src', selectedSrc);
                $('img.mainImage').stop().fadeIn(200);
            }
        );
    });

    // マウスアウトでサムネイル枠もとに戻す
    $('img.thumb').mouseout(function(){

    });
});
*/

/*
■■■■■■■■とんだ先でアンカーが'#aa'の場合の処理を記述する■■■■■■■■
window.onload=function(){//ページロードの際
if ( location.hash == '#aa' ) {
        $('#pne1').slideDown()
        }else if(location.hash == '#bb'){

        $('#pne2').slideDown()
        }else if(location.hash == '#cc'){
        $('#pne3').slideDown()

        }else if(location.hash == '#dd'){
        $('#pne4').slideDown()

        }

}
*/


//■■■■■■■■文字色などがアニメーションする■■■■■■■■
/*
$(document).ready(function(){
    $("#h-in a,#content-wap a,#footer-out a").hover(function() {
    $(this).stop().animate({color: "#ff7f00"}, 400);//ONマウス時のカラーと速度
    },function() {
    $(this).stop().animate({color: "#525252" }, 800);//OFFマウス時のカラーと速度
    });
    $("#gm li a").hover(function() {
    $(this).stop().animate({borderBottomColor: "#ff7f00",color: "#ff7f00"}, 400);//ONマウス時のカラーと速度
    },function() {
    $(this).stop().animate({borderBottomColor: "#463419",color: "#463419" }, 800);//OFFマウス時のカラーと速度
    });
    $(".dropdown a,#footer-f a").hover(function() {
    $(this).stop().animate({color: "#ff7f00"}, 400);//ONマウス時のカラーと速度
    },function() {
    $(this).stop().animate({color: "#ffffff" }, 800);//OFFマウス時のカラーと速度
    });
    $(".l-list li a").hover(function() {
    $(this).stop().animate({color: "#ffffff"}, 400);//ONマウス時のカラーと速度
    },function() {
    $(this).stop().animate({color: "#463419" }, 800);//OFFマウス時のカラーと速度
    });
    $("#slider img,.img-han img,.bx-prev,.bx-next,#entrybutton .img-han,#l-bana a,.otenaga-but a,#f-t a").hover(function() {
    $(this).stop().animate({opacity: "0.5"}, 300);//ONマウス時のカラーと速度
    },function() {
    $(this).stop().animate({opacity: "1.0" }, 300);//OFFマウス時のカラーと速度
    });


});
*/

//■■■■■■■■グローバルナビゲーションがスクロール一定すると上部に固定表示される■■■■■■■■
/*
.follow {
width:100%;
position: fixed;
z-index:100000;
top: 0;
left: 0;
width: 100%;
box-shadow:0px 2px 2px #b5b5b5;
-webkit-box-shadow:0px 2px 2px #b5b5b5;
-moz-box-shadow:0px 2px 2px #b5b5b5;
-ms-box-shadow:0px 2px 2px #b5b5b5;
}
$(function(){
var bt = $("#gm").offset().top;
var ds = 0;
var gm = $("#gm");
var navHeight = gm.height()+10;
$(document).scroll(function(){
ds = $(this).scrollTop();

if (bt <= ds) {
gm.addClass('follow').stop().animate({'top' : '0px'}, 200);
} else if (bt >= ds) {
gm.stop().animate({'top' : -navHeight+'px'}, 200).removeClass('follow');

}

});
});
*/



//■■■■■■■■ページ上部へ戻る■■■■■■■■
/*
$( function() {
    $("#ptop,.tophe a").click(function () {
        $('html,body').animate({ scrollTop: 0 }, 'fast');
        return false;
    });
});
*/

//■■■■■■■■inputタグのプレースホルダーをie9以前も表示させるコード■■■■■■■■
//<input placeholder="姓" class="validate required1"  type="text" id="onamae1" name="onamae1" />
/*
$(function () {
  var supportsInputAttribute = function (attr) {
    var input = document.createElement('input');
    return attr in input;
  };
  if (!supportsInputAttribute('placeholder')) {
    $('[placeholder]').each(function () {
      var
        input = $(this),
        placeholderText = input.attr('placeholder'),
        placeholderColor = 'GrayText',
        defaultColor = input.css('color');
      input.
        focus(function () {
          if (input.val() === placeholderText) {
            input.val('').css('color', defaultColor);
          }
        }).
        blur(function () {
          if (input.val() === '') {
            input.val(placeholderText).css('color', placeholderColor);
          } else if (input.val() === placeholderText) {
            input.css('color', placeholderColor);
          }
        }).
        blur().
        parents('form').
          submit(function () {
            if (input.val() === placeholderText) {
              input.val('');
            }
          });
    });
  }
});
*/

//■■■■■■■■ページ内スムーズリンク■■■■■■■■
//リンク元
//<a href="#1">section1</a>
//リンク先
//<div id="1">section1の内容</div>
/*
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top + -80;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
*/

//■■■■■■■■メガドロップダウンメニュー■■■■■■■■
/* style for horizontal nav
naviDropDown.js
hoverIntent.minified.js
*/
/*
#navigation_horiz {
width: auto;
clear:both;
padding:0 0 0 0;
margin:0 auto;
position:relative;
}
#navigation_horiz  ul {
height: auto;
display:block;
}
#navigation_horiz  ul li {
position:relative;
}
#navigation_horiz  ul li a.navlink {
display:block;
width:200px;
height:30px;
padding: 20px 0 0 0;
text-align:center;
color:#fff;
text-decoration:none;
}
#navigation_horiz .dropdown {
background:url(images/menu-dback.png) left bottom repeat;
position:absolute;
padding:30px 38px 25px 38px;
text-align: left;
z-index: 10000;
}



#navigation_horiz .dropdown h2{
margin:0 0 15px 0;

}
#navigation_horiz .dropdown ul{
margin:0px 0 0 0;
width:auto;
background: none;
padding: 0;
}

#navigation_horiz .dropdown li{
background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
display: block;
float: none;
height: auto;
margin: 0 0 13px 0;
padding: 0;
text-align: left;
width: auto;
}

#navigation_horiz .dropdown li a{
background:url(images/menu-dback-yaji.png) left center no-repeat;
padding:0 0 0 20px;

}

#navigation_horiz ul li #dropdown_one {color:#fff; width:473px;}
#navigation_horiz ul li #dropdown_one a {color:red;}
#navigation_horiz ul li #dropdown_two {color:#fff;}
#navigation_horiz ul li #dropdown_two a {color:black;}
#navigation_horiz ul li #dropdown_three {color:#fff;}
#navigation_horiz ul li #dropdown_three a {color:gray;}
*/

/*
<div id="navigation_horiz">
    <nav id="gm">
        <ul role="navigation" class="cf">

            <li id="gm3">
                <a href="<?php bloginfo('url'); ?>/company/" title="事務所概要のページへ">事務所概要<span>FIRM OVERVIEW</span></a>

                <div style="display:none;" class="dropdown" id="dropdown2">
                    <section class="cf">
                    <ul class="linelist1">
                        <li><a href="<?php bloginfo('url'); ?>/company/info/">事務所情報</a></li>
                        <li><a href="<?php bloginfo('url'); ?>/company/greeting/">代表挨拶</a></li>
                        <li><a href="<?php bloginfo('url'); ?>/company/specialist/">専門家紹介</a></li>
                    </ul>
                    </section>
                </div><!-- .dropdown_menu -->
            </li>

        </ul>
    </nav><!-- gm -->
</div><!-- navigation_horiz -->
$(function(){
    $('#navigation_horiz').naviDropDown({
        dropDownClass: 'dropdown', //the class name for your drop down
        slideDownEasing: 'easeOutCubic', //easing method for slideDown
        slideUpEasing: 'easeOutCubic', //easing method for slideUp
        slideDownDuration: 0, //easing duration for slideDown
        slideUpDuration: 0, //easing duration for slideUp
        orientation: 'horizontal' //orientation - either 'horizontal' or 'vertical'
    });
//ドロップダウンメニューからはずれたらしっかり消えるように
$("#dropdown_one,#dropdown2,#dropdown3,#dropdown4").hover(
  function () {
  },
  function () {
    $(this).css("display","none");
  }
);

});
*/



//■■■■■■■■ログインボタンのツールチップ■■■■■■■■
/*

<div class="popbox open-in ">
        <a title="ログインのページへ" href="login.html" class="open">ログインはコチラ▼</a>


      <div class="collapse">
        <div class="box">
        <div class="arrow">
        </div>
        <div class="arrow-border">
        </div>
          <div id="popbox-in">
          <form method="post" action="">
            <p id="popbox-close">
              <a class="close" id="pop-c" href="#">close</a>
            </p>
            <dl class="login-fpop">
              <dt>ユーザー名またはメールアドレス</dt>
              <dd>
                <input type="text" value="" name="user_login_id_login">
              </dd>
            </dl>
            <dl class="login-fpop">
              <dt>パスワード</dt>
              <dd>
                <input type="password" value="" name="user_login_password_login">
              </dd>
            </dl>
            <dl class="login-fpop-bottom cf">
              <dt>
                <input type="checkbox" id="login-data-saveb" value="1" name="login_cookie">
                <label for="login-data-saveb">保存する</label>
              </dt>
              <dd>
                <button type="submit">ログイン</button>
              </dd>
            </dl>
            <p id="pass-none">
              <a href="http://skill-style.com/reminder.html">パスワードを忘れた場合はコチラ</a>
            </p>
          </form>
          </div>

        </div>

      </div>
            </div>



(function(){$.fn.popbox=function(a){var b=$.extend({selector:this.selector,open:".open",box:".box",arrow:".arrow",arrow_border:".arrow-border",close:".close"},a),c={open:function(a){a.preventDefault();var d=$(this),e=$(this).parent().find(b.box);e.find(b.arrow).css({left:e.width()/2-10}),e.find(b.arrow_border).css({left:e.width()/2-10}),e.css("display")=="block"?c.close():e.css({display:"block",top:29,left:d.parent().width()/2-e.width()/2})},close:function(){$(b.box).fadeOut("fast")}};return $(document).bind("keyup",function(a){a.keyCode==27&&c.close()}),$(document).bind("click",function(a){$(a.target).closest(b.selector).length||c.close()}),this.each(function(){$(b.open,this).bind("click",c.open),$(b.open,this).parent().find(b.close).bind("click",function(a){a.preventDefault(),c.close()})})}}).call(this);


$(function(){

$('.popbox').popbox({
open'          : '.open',
box'           : '.box',
arrow'         : '.arrow',
arrow-border'  : '.arrow-border',
close'         : '.close'
});

});



.popbox{
margin:0px auto;
text-align: right;
position:relative;
float: right;
margin:18px 2.46429% 0 0;
padding:25px 0 0;
display:block;
padding:7px 0 0 5.95238%;
}

.collapse{ position:relative; }

.box{
display:block;
display:none;
background:#FFF;
border:solid 1px #dcdcdc;
border-radius:5px;
box-shadow:1px 1px 2px #666666;
position:absolute;
padding:17px 20px;
z-index:100;
}

.arrow{
width:0;
height:0;
border-left:11px solid transparent;
border-right:11px solid transparent;
border-bottom:11px solid #FFF;
position:absolute;
left:1px;
top:-10px;
z-index:1001;
}

.arrow-border{
width:0;
height:0;
border-left:11px solid transparent;
border-right:11px solid transparent;
border-bottom:11px solid #BBBBBB;
position:absolute;
top:-12px;
z-index:1000;
}

.popbox #pop-c{
color:#c7c7c7;
}

#popbox-in .login-fpop input{
-webkit-border-radius:3px;
-moz-border-radius:3px;
border-radius:3px;
background-color:rgba(210,210,210,.9);
-webkit-box-shadow:0 0 3px rgba(252,252,252,.4), 1px 1px rgba(255,255,255,.27), inset 1px 2px 6px rgba(0,0,0,.4), inset 0 0 2px rgba(0,0,0,.24);
-moz-box-shadow:0 0 3px rgba(252,252,252,.4), 1px 1px rgba(255,255,255,.27), inset 1px 2px 6px rgba(0,0,0,.4), inset 0 0 2px rgba(0,0,0,.24);
box-shadow:0 0 3px #fcfcfc, inset 1px 2px 6px #f2f2f2;
border:solid 1px #d8d8d8;
background:#fbfbfb;
height:26px
}

#popbox-in .login-fpop{
margin:0 0 15px 0;
text-align: left;
}

#popbox-in .login-fpop-bottom dt{
float:left;
padding:8px 0 0;
}


#popbox-in .login-fpop-bottom dd{
float:right;
}

#popbox-in .login-fpop-bottom dt input{
border:1px solid #898989;
background-color:#ffffff;
margin:0 5px 0 0;
}

.login-fpop-bottom{
margin:0 0 20px 0;
}

#popbox-in{
position:relative;
}

#popbox-close{
left:227px;
position:absolute;
top:-8px;
}


#popbox-in .login-fpop-bottom dd button{
float:right;
color:#636363;
width:111px;
border-radius:2px;
-moz-border-radius:2px;
-webkit-border-radius:2px;
-ms-border-radius:2px;
-o-border-radius:2px;
height:30px;
border:solid 1px rgba(0,0,0,.35);
background-color:#d2d2d2;
-webkit-box-shadow:1px 1px 1px rgba(255,255,255,.1) inset ;
-moz-box-shadow:1px 1px 1px rgba(255,255,255,.1) inset ;
-ms-box-shadow:1px 1px 1px rgba(255,255,255,.1) inset ;
box-shadow:1px 1px 1px rgba(255,255,255,.1) inset ;
-webkit-box-shadow:2px 3px 4px rgba(0,0,0,.11);
-moz-box-shadow:2px 3px 4px rgba(0,0,0,.11);
-ms-box-shadow:2px 3px 4px rgba(0,0,0,.11);
box-shadow:2px 3px 4px rgba(0,0,0,.11);
background-image:-webkit-linear-gradient(bottom, #ddd, #fcfcfc);
background-image:-webkit-gradient(bottom, #ddd, #fcfcfc);　
background-image:-moz-linear-gradient(bottom, #ddd, #fcfcfc);
background-image:-o-linear-gradient(bottom, #ddd, #fcfcfc);
background-image:-ms-linear-gradient(bottom, #ddd, #fcfcfc);
background-image:linear-gradient(to top, #ddd, #fcfcfc);
}

*/



//■■■■■■■■カールセル　※3つのul.columnが必要。じゃないと白紙の状態で横移動してしまう■■■■■■■■
/*
$(function(){
    //初期設定
    $("#carouselInner").css("width",702*$("#carouselInner ul.column").size()+"px");
    $("#carouselInner ul.column:last").prependTo("#carouselInner");
    $("#carouselInner").css("margin-left","-702px")
    //戻るボタン
    $("#carouselPrev").click(function(){
        $("#carouselInner").animate({
            marginLeft : parseInt($("#carouselInner").css("margin-left"))+702+"px"
        },"slow","swing" ,
        function(){
            $("#carouselInner").css("margin-left","-702px")
            $("#carouselInner ul.column:last").prependTo("#carouselInner");
        })
    })
    //進むボタン
    $("#carouselNext").click(function(){
        $("#carouselInner").animate({
            marginLeft : parseInt($("#carouselInner").css("margin-left"))-702+"px"
        },"slow","swing" ,
        function(){
            $("#carouselInner").css("margin-left","-702px")
            $("#carouselInner ul.column:first").appendTo("#carouselInner");
        })
    })

})

#carouselWrap #carouselPrev{
    cursor: pointer;
    left: 657px;
    position: absolute;
    top: 106px;
    z-index: 100;
    }

#carouselWrap #carouselNext{
    cursor: pointer;
    left: 11px;
    position: absolute;
    top: 106px;
    z-index: 100;
    }


#carouse{
   width: 100%;
    height:100%;
    margin:0 auto;
    overflow:hidden;
}
#carouselInner ul.column{
    width:687px;
     height:235px;
    padding:15px 0 15px 15px;
    list-style-type:none;
    float:left;
      backface-visibility: hidden;
}
#carouselInner ul.column li{
    float:left;
    background-color: #FFFFFF;
    border: 1px solid #E0E0E0;
    height: 188px;
    margin:0 26px 0 0;
    padding: 0 0 44px;
    text-align: center;
    vertical-align: middle;
    width: 190px;
}
#carouselInner ul.column li img{
    border:none;
}


#carouselInner ul.column li a {
    display: table-cell;
    height: 234px;
    position: relative;
    text-align: center;
    vertical-align: middle;
    width: 190px;
}



<div id="carouselWrap" class="owl-wrapper">
    <p id="carouselPrev"><img src="<?php echo get_template_directory_uri(); ?>/images/sl-br.png" alt="前へ" /></p>
    <p id="carouselNext"><img src="<?php echo get_template_directory_uri(); ?>/images/sl-bl.png" alt="次へ" /></p>
    <div id="carouse">
        <div id="carouselInner">

<?php $post_count = 1; // カウンターの初期化 ?>

<?php
// 投稿の取得条件を設定
$args = array(
    // 'product' 投稿タイプから取得
    'post_type' => 'product',
    // 最新の投稿を5件取得
    'posts_per_page' => -1,
    // カスタムフィールドで絞込み
    'meta_query' => array(
        // 全ての条件を満たす
        'relation' => 'AND',
        // 'is_featured' が '1' のとき
        array(
            'key' => 'pickup',
            'value' => true,
        )
    ),
);
// 条件を満たす投稿を取得
$myposts = get_posts($args);
// ループ
foreach ( $myposts as $post ) :
    // テンプレートタグをセットアップ
    setup_postdata( $post );
    ?>
<?php
$term = array_pop(get_the_terms($post->ID, 'type'));
$term_p = $term->parent;
if ( ! $term_p == 0 ){
$term = array_shift(get_the_terms($post->ID, 'type'));
}
?>
            <?php
    $attachment_id = get_field('productimg');
    $size = "large"; // (thumbnail, medium, large, full or custom size)
    $image = wp_get_attachment_image_src( $attachment_id, $size );
    $attachment = get_post( get_field('productimg') );
    $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
    $image_title = $attachment->post_title;
?>
<?php if ( $post_count  == 1 ) { echo "\n" . '
<ul class="column">' . "\n"; } //まず最初の囲みを出力
?>
<?php if ( $post_count % 3 == 1 && $post_count != 1 ) { echo '</ul>
' . "\n" . '
<ul class="column">' . "\n"; } // 3で割った余りが１で、なおかつカウンターが１（最初）でなければ閉じdivと囲みの開始タグを出力
?>
                <li class="item effect3"><a href="<?php echo get_permalink(); ?>"><p class="ribo-c"></p><img src="<?php echo $image[0]; ?>" width="176" itemprop="image" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" /><p class="tm-font ribo-cyo"><?php echo $term->name; ?></p>
  <div class="caption" style="filter: alpha(opacity=50);">
  <h3><?php echo $text = get_field('productname',$post->ID);?></h3>
  <p><?php echo mb_substr(get_field('productdetailstext',$post->ID),0,50).'...'; ?></p>
  </div>
  </a></li>
<?php $post_count++; // カウンターを１増やす ?>


    <?php
endforeach;
// テンプレートタグをリセット
wp_reset_postdata();
?><?php echo '</ul>
' . "\n"; // 最後にdivを閉じる ?>



        </div>
    </div>
</div>


*/



