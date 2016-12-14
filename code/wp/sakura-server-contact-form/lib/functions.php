<?php





/**

 * 関数をここに記述していく

 *

 */



/**

 * フォームの開始タグ設定

 *

 *

 */

function createFromInsert($options = array()){

    if(!empty($options)){

        if(in_array('file', $options)){

            $out['file'] = 'enctype="multipart/form-data"';

        }
		if (wp_is_mobile()){
			$form = '<form id="form" class="container" method="post" '.$out['file'].'>';
		}else{
			$form = '<form class="form" method="post" '.$out['file'].'>';
		}

        return $form;

    }

    return '<form class="form" method="post">';



}



/**

 * 入力フォーム終了

 *

 *

 */

function endFormInsert(){

	return '<input type="hidden" name="ContactForm" value="confirm">'."\n".'</form>';

}

/**

 * 確認画面用フォーム終了

 *

 *

 */



function createFormConfirm(){
	
	if (wp_is_mobile()){
		$form = '<form id="form" class="container" method="post">';
	}else{
		$form = '<form class="form" method="post">';
	}

	return $form;

}



/**

 * 確認画面用フォーム終了

 *

 *

 */

function endFormConfirm(){

	return '<input type="hidden" name="ContactForm" value="complate">'."\n".'</form>';

}





/**

 *

 * 確認画面でhiddenタグを生成

 *

 */

function hiddenVars(){

        // 電話番号の形式を変換する(全角→半角、ハイフン削除)
        if(!empty($_POST['tel'])){
            $conversion = mb_convert_kana($_POST['tel'],"n");
            $replace = array("－","ー","-");
            $_POST['tel'] = str_replace($replace, "", $conversion);
        }
        // 郵便番号の形式を変換する(全角→半角、ハイフン削除)
        if(!empty($_POST['post'])){
            $conversion = mb_convert_kana($_POST['post'],"n");
            $replace = array("－","ー","-");
            $_POST['post'] = str_replace($replace, "", $conversion);
        }
		// 年齢の形式を変換する(全角→半角)
		if(!empty($requestData['age'])){
			$requestData['age'] = mb_convert_kana($requestData['age'],"n");
		}




	//POST情報をhidden化

	foreach($_POST as $key => $val){

        if(is_array($val)){

            foreach($val as $key2 => $val2){

                echo "<input type=\"hidden\" name=\"".$key."[".$key2."]\" value=\"$val2\">\n";

            }

        }else{

            if($key!="btnExec" and $key!="submit_x" and $key!="submit_y"){

                echo "<input type=\"hidden\" name=\"$key\" value=\"".htmlspecialchars($val, ENT_QUOTES)."\">\n";

            }

        }

    }

}



/**

 * 都道府県のリスト

 *

 *

 */

function prefectures(){

    return array(

        '北海道',

        '青森県',

        '岩手県',

        '宮城県',

        '秋田県',

        '山形県',

        '福島県',

        '茨城県',

        '栃木県',

        '群馬県',

        '埼玉県',

        '千葉県',

        '東京都',

        '神奈川県',

        '新潟県',

        '富山県',

        '石川県',

        '福井県',

        '山梨県',

        '長野県',

        '岐阜県',

        '静岡県',

        '愛知県',

        '三重県',

        '滋賀県',

        '京都府',

        '大阪府',

        '兵庫県',

        '奈良県',

        '和歌山県',

        '鳥取県',

        '島根県',

        '岡山県',

        '広島県',

        '山口県',

        '徳島県',

        '香川県',

        '愛媛県',

        '高知県',

        '福岡県',

        '佐賀県',

        '長崎県',

        '熊本県',

        '大分県',

        '宮崎県',

        '鹿児島県',

        '沖縄県'

    );

}



/**

 *

 * コントローラーで定義した変数を使えるようにする

 *

 */

function getData(){

    if(!empty($_SESSION['data'])){

        foreach($_SESSION['data'] as $key => $value){

            $data[$key] = $value;

        }

        unset($_SESSION['data']);

		return $data;
    }

}



function is_image($image_dir = null){

    if(!empty($image_dir)){

        if(parse_url($image_dir, PHP_URL_HOST)){

            return '<img src="'.$image_dir.'" width="200" height="200">';

        }else{

            return $image_dir;

        }

    }

}

function index(){

        /**

         * 入力画面用

         *

         */

        //バリデーションをエラーを取得

        if(!empty($_SESSION['validationError'])){

            $error = $_SESSION['validationError'];

            unset($_SESSION['validationError']);



            $requestData = $_SESSION['requestData'];

            unset($_SESSION['requestData']);

        }elseif(!empty($_SESSION['requestData']['submit']) && $_SESSION['requestData']['submit'] == 'back'){

            //戻るボタンが押された場合

            $requestData = $_SESSION['requestData'];

            unset($_SESSION['requestData']);

        }

}

function confirm(){

        /**

         *　確認画面用

         *

         */


        //まずは、POSTされたデータを取得

        $requestData = $_POST;

        unset($requestData['ContactForm']);

        //変数へセットする

        set('requestData', $requestData);
}

function complate(){

        /**

         * 完了画面用

         *

         */

        //メール送信処理

        $arr_mail_info = array();
        
        $arr_mail_info['data'] = GetInfo();
                
        $arr_mail_info['mailto']  = $arr_mail_info['data']['mailaddress']['content']; // 宛先
        //
//        $mail->mailadmin = 'contact@pop-asahi.com'; // 管理者宛先
        $arr_mail_info['mailadmin'] = 'ktm@pop-asahi.com'; // 管理者宛先
        
        $arr_mail_info['subject'] = '【アサヒ・ドリーム・クリエイト】お問い合わせ受付のお知らせ'; // ユーザー宛てタイトル
        
        $arr_mail_info['subadmin'] = '【アサヒ・ドリーム・クリエイト お問い合わせ】フォームメール投稿内容'; // 管理者宛てタイトル
        
        $arr_mail_info['mailfrom'] = 'ktm@pop-asahi.com'; // 送信元
        
        $arr_mail_info['infoAddress'] = 'ktm@pop-asahi.com'; // infoメールアドレス
        
        $arr_mail_info['project'] = 'アサヒ・ドリーム・クリエイト'; // 運営元
        
        $arr_mail_info['items'] = array('会社名:','お名前:','ふりがな:','郵便番号:','住所:','電話番号:','メールアドレス:','お問い合わせ内容:'); // 入力項目を順番に配列に格納する。こちらの文言が直接、メールに反映されます。
        
        $arr_mail_info['content'] = dirname(__FILE__).'/Email/text/contact.txt';
        $arr_mail_info['content_admin'] = dirname(__FILE__).'/Email/text/contact-admin.txt';

        pre_process_sendmail($arr_mail_info);

}

function pre_process_sendmail ($arr_mail_info) {

    // メールテンプレートを読み込む
    if(!empty($arr_mail_info['content'])){

            $arr_mail_info['content'] = mb_convert_encoding(file_get_contents($arr_mail_info['content'],true), 'UTF-8', 'auto');

    }else{

            $arr_mail_info['content'] = mb_convert_encoding(file_get_contents("default.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

    }

    if(!empty($arr_mail_info['content_admin'])){

            $arr_mail_info['content_admin'] = mb_convert_encoding(file_get_contents($arr_mail_info['content_admin'],true), 'UTF-8', 'auto');

    }else{

            $arr_mail_info['content_admin'] = mb_convert_encoding(file_get_contents("default_admin.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

    }

    // メール内容を生成する
    $arr_mail_info['content'] = get_filter_para_name($arr_mail_info['content'], $arr_mail_info['data']);
    $arr_mail_info['content_admin'] = get_filter_para_name($arr_mail_info['content_admin'], $arr_mail_info['data']);

    $send_user = send_mail_form($arr_mail_info['mailto'], $arr_mail_info['subject'], $arr_mail_info['content'], $arr_mail_info['mailadmin'], $arr_mail_info['mailfrom']);
    $send_admin = send_mail_form( $arr_mail_info['mailadmin'], $arr_mail_info['subadmin'], $arr_mail_info['content_admin'], $arr_mail_info['mailadmin'], $arr_mail_info['mailfrom']);

    if (!$send_user || !$send_admin) {
        wp_die('システムはエラーが発生しますので、もう一度記入お願いします。');
    }
    
}

function get_filter_para_name ($content, $data){
    $content = str_replace("%%KAISAIBI%%", $data['kaisaibi']['content'], $content);
    $content = str_replace("%%JIKAN%%", $data['jikan']['content'], $content);
    $content = str_replace("%%NINZUU%%", $data['ninzuu']['content'], $content);
    $content = str_replace("%%JUSHO%%", $data['jusho']['content'], $content);
    $content = str_replace("%%GYOUSHU%%", $data['gyoushu']['content'], $content);
    $content = str_replace("%%DENWA%%", $data['denwa']['content'], $content);
    $content = str_replace("%%NAMAE%%", $data['namae']['content'], $content);
    $content = str_replace("%%NAMAEKANA%%", $data['namaekana']['content'], $content);
    $content = str_replace("%%MAILADDRESS%%", $data['mailaddress']['content'], $content);
    $content = str_replace("%%TANOSANKA%%", $data['tanosanka']['content'], $content);
    $content = str_replace("%%HITOKOTO%%", $data['hitokoto']['content'], $content);
    $content = str_replace("%%MAILMAGAZINE%%", $data['mailmagazine']['content'], $content);
    $content = str_replace("%%SHIHARAI%%", $data['shiharai']['content'], $content);
    $content = str_replace("%%RYOUSHUUSHO%%", $data['ryoushuusho']['content'], $content);
    $content = str_replace("%%COMPANY%%", $data['company']['content'], $content);
    return $content;
}

function GetInfo() {

    $pos = $_POST;
    $data = array();
    foreach($pos as $key => $value) {

        $data[$key]['key'] = $key;

        $data[$key]['content'] = $_POST[$key];

    }

    return $data;

}

function set($name, $data){

        $_SESSION['data'][$name] = $data;

}