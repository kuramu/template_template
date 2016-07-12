<?php



/**

 *	参考サイト：http://web.creator-world.net/2008/08/php-mail.html

 *			http://blog.livedoor.jp/k_shin_pro/archives/19300857.html

 *

 */





class SendMail {



	public $data = array();

	public $mailto = "ichishima@lifestyle-design.jp";//宛先ユーザー用

	public $mailadmin = "ichishima@lifestyle-design.jp";//宛先管理者用

	public $subject="";//件名ユーザー用

	public $subadmin ="";	//件名管理者用

	public $mailfrom = "ichishima@lifestyle-design.jp"; //送信元

	public $content = "";

	public $content_admin = "";

	public $attachments = array();





	public function GetInfo() {

		if (empty($this->data)) {

			$pos = $_POST;

			foreach($pos as $key => $value) {

				$this->data[$key]['key'] = $key;

				$this->data[$key]['content'] = $_POST[$key];

			}

		}

	return $this->data;

	}



	public function __construct() {

		$this->GetInfo();

	}





	public function Send() {



		//メール送信

		mb_language("Ja");

		mb_internal_encoding("UTF-8") ;



		$header  = "From: " . $this->mailfrom. "\r\n";



	    // temp

	    $header .= "MIME-Version: 1.0\r\n";

	    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";

	    $header .= "\r\n";



	    $content_start  = "--__PHPRECIPE__\r\n";

	    $content_start .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";

	    $content_start .= "\r\n";





		if(!empty($this->content)){

			$this->content = mb_convert_encoding(file_get_contents($this->content,true), 'UTF-8', 'auto');

		}else{

			$this->content = mb_convert_encoding(file_get_contents("touser.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

		}



		if(!empty($this->content_admin)){

			$this->content_admin = mb_convert_encoding(file_get_contents($this->content_admin,true), 'UTF-8', 'auto');

		}else{

			$this->content_admin = mb_convert_encoding(file_get_contents("touser_admin.txt",true), 'UTF-8', 'auto');//メールテンプレート  メールテンプレートファイルへのパス

		}















		foreach($this->data as $key => $value) {

			$this->content = str_replace("%%".strtoupper($value['key'])."%%",$value['content'],$this->content);//置き換え単語

			$this->content_admin = str_replace("%%".strtoupper($value['key'])."%%",$value['content'],$this->content_admin);//置き換え単語

		}



		$this->content = $content_start.$this->content;

		$this->content_admin = $content_start.$this->content_admin;

		$this->content .= "\r\n--__PHPRECIPE__\r\n";

		$this->content_admin .= "\r\n--__PHPRECIPE__\r\n";





		$this->content = str_replace(array("\r\n","\n\r"), "\n", $this->content);

		$this->content_admin = str_replace(array("\r\n","\n\r"), "\n", $this->content_admin);



		/**

		 *	画像用の関数

		 *

		 */

		if(!empty($this->attachments)){

			foreach($this->attachments as $key => $value){



				$text_attachment .= $this->for_mail($value);

			}

			//$this->content .= $text_attachment;

			$this->content_admin .= $text_attachment;

		}





		mb_send_mail(trim($this->mailadmin),$this->subadmin,$this->content_admin,trim($header), "-f ".$this->mailfrom);//管理者向け送信処理 (宛先,件名,本文,送信元)

		mb_send_mail(trim($this->mailto),$this->subject,$this->content,trim($header),"-f ".$this->mailfrom);	//ユーザー向け送信処理 (宛先,件名,本文,送信元)



	}



	/**

	 *	添付ファイル機能

	 *

	 */

	public function for_mail($data = array()){

		if(is_array($data)){



	        // Mimeの取得は色々試したけど以下が動作した。

	        $info = getImageSize($data['path']);

	        $mimeType =  $info['mime'];



	        $name = $data['name'];



	       	$content .= "Content-Type: $mimeType; name=\"$name\r\n";

	        $content .= "Content-Transfer-Encoding: base64\r\n";

	        $content .= "Content-Disposition: attachment; filename=\"$name\"\r\n";

	        $content .= "\r\n";



	        $handle = fopen($data['path'], 'r');

	        $attachFile = fread($handle, filesize($data['path']));

	        fclose($handle);

	        $attachEncode = base64_encode($attachFile);



	        $content .= chunk_split($attachEncode) . "\r\n";

	        $content .= "--__PHPRECIPE__\r\n";



	        return $content;

	    }



	}





}



