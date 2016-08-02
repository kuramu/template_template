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