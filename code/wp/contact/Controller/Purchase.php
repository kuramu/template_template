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



		//画像用のプラグイン発動

		include_once('Image.php');

		$file = New Image();





		//まずは、POSTされたデータを取得

		$requestData = $_POST;

		/**

		 *	画像ファイルの加工

		 *

		 */

		$requestData['file1'] = $file->set_url('file1');

		$requestData['file2'] = $file->set_url('file2');

		$requestData['file3'] = $file->set_url('file3');



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

		//画像用のプラグイン発動

		include_once('Image.php');

		$file = New Image();

		$mail->mailto = $mail->data['email']['content'];

		$mail->mailadmin = 'ichishima@lifestyle-design.jp';

		$mail->subject = '【杉本梁江堂】お問い合わせ受付のお知らせ';

		$mail->subadmin = '【杉本梁江堂 お問い合わせ】フォームメール投稿内容';

		$mail->mailfrom = 'ichishima@lifestyle-design.jp';

		$mail->content = dirname(__FILE__).'/Email/text/purchase.txt';

		$mail->attachments = array(

			'file1' => $_POST['file1'],

			'file2' => $_POST['file2'],

			'file3' => $_POST['file3']

		);

		$mail->content_admin = dirname(__FILE__).'/Email/text/purchase-admin.txt';



		$mail->Send();



	}







	public function set($name, $data){

		$_SESSION['data'][$name] = $data;

	}





}