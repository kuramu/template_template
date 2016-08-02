<?php



/**

 * 機能面はここに書く

 *

 */

class Contact {







	public function index(){

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







	public function confirm(){

		/**

		 *　確認画面用

		 *

		 */



		//バリデーションエラー

		include_once('Validate.php');

		$validate = New Validate();

		//まずは、POSTされたデータを取得

		$requestData = $_POST;

		// 電話番号の形式を変換する(全角→半角、ハイフン削除)
		if(!empty($requestData['tel'])){
			$conversion = mb_convert_kana($requestData['tel'],"n");
			$replace = array("－","ー","-");
			$requestData['tel'] = str_replace($replace, "", $conversion);
		}
		// 郵便番号の形式を変換する(全角→半角、ハイフン削除)
		if(!empty($requestData['post'])){
			$conversion = mb_convert_kana($requestData['post'],"n");
			$replace = array("－","ー","-");
			$requestData['post'] = str_replace($replace, "", $conversion);
		}
		// 売却物件所在地の郵便番号の形式を変換する(全角→半角、ハイフン削除)
		if(!empty($requestData['sale_property_post'])){
			$conversion = mb_convert_kana($requestData['sale_property_post'],"n");
			$replace = array("－","ー","-");
			$requestData['sale_property_post'] = str_replace($replace, "", $conversion);
		}
		
		unset($requestData['ContactForm']);





		//変数へセットする

		$this->set('requestData', $requestData);





	}











	public function complate(){

		/**

		 * 完了画面用

		 *

		 */





		//メール送信処理

		include_once('SendMail.php');

		$mail = New SendMail();

		$mail->mailto = $mail->data['email']['content'];

		$mail->mailadmin = 'otoiawase@ninibaikyaku.org';

		$mail->subject = '【ニンセン】お問い合わせ受付のお知らせ';

		$mail->subadmin = '【ニンセン お問い合わせ】フォームメール投稿内容';

		$mail->mailfrom = 'otoiawase@ninibaikyaku.org';

			$mail->content = dirname(__FILE__).'/Email/text/contact.txt';
			$mail->content_admin = dirname(__FILE__).'/Email/text/contact-admin.txt';


		$mail->Send();

	}







	public function set($name, $data){

		$_SESSION['data'][$name] = $data;

	}





}